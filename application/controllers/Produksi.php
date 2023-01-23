<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
{
    private $_client;
    function __construct()
    {

        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://103.31.39.238/',
            'headers' => [
                'X-Authorization' => 'eIvUfN3HdGvjwYR415UaAiFM13mIuvXvaPCaS3cWW4HjIDQjdPrETOCka8EZfcbj',
            ]
        ]);

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $response = $this->_client->request('GET', 'produksi');

        $data = [
            'barangjadi' => json_decode($response->getBody()->getContents()),
        ];

        $this->load->view('layout/header');
        $this->load->view('produksi/index', $data);
        $this->load->view('layout/footer');
    }

    function masukProduksi($id)
    {

        $response = $this->_client->request('GET', 'produksi/addproduksi/' . $id, [
            // Params

        ]);
        $data = [
            'barangjadi' => json_decode($response->getBody()->getContents(), true),
        ];

        $this->load->view('layout/header');
        $this->load->view('produksi/create', $data);
        $this->load->view('layout/footer');
    }

    function do_create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'request_barang_jadi_id' => $this->input->post('request_barang_jadi_id'),
                'barang_mentah_id' => $this->input->post('barang_mentah_id'),
                'quantitas' => $this->input->post('quantitas'),
                'tanggal_produksi' => $this->input->post('tanggal_produksi'),
            );

            $response = $this->_client->request('POST', 'produksi', [
                'form_params' => $data
            ]);
            $insert = json_decode($response->getBody()->getContents());



            if ($insert == false) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Barang Mentah Berhasil ditambahkan Ke Produksi
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Barang Mentah Gagal ditambahkan Ke Produksi
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        if (isset($_POST['done'])) {
            $data = array(
                'request_barang_jadi_id' => $this->input->post('request_barang_jadi_id'),
            );

            $response = $this->_client->request('PUT', 'produksi/updatestatusproduksi/' . $data['request_barang_jadi_id'], [
                'form_params' => $data
            ]);

            $updatestatus = json_decode($response->getBody()->getContents(), true);

            if ($updatestatus) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Produksi Selesai
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Produksi Gagal
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function sudahproduksi()
    {

        $response = $this->_client->request('GET', 'produksi/sudahproduksi');

        $data = [
            'barangjadi' => json_decode($response->getBody()->getContents()),
        ];


        $this->load->view('layout/header');
        $this->load->view('produksi/sudahproduksi', $data);
        $this->load->view('layout/footer');
    }
}

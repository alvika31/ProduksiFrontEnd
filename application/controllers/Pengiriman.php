<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
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

    function index()
    {

        $response = $this->_client->request('GET', 'pengiriman');

        $data = [
            'barangjadi' => json_decode($response->getBody()->getContents()),
        ];

        $this->load->view('layout/header');
        $this->load->view('pengiriman/index', $data);
        $this->load->view('layout/footer');
    }

    function kirimbarang($id)
    {

        $response = $this->_client->request('GET', 'produksi/addproduksi/' . $id, [
            // Params

        ]);
        $data = [
            'barangjadi' => json_decode($response->getBody()->getContents(), true),
        ];

        $this->load->view('layout/header');
        $this->load->view('pengiriman/create', $data);
        $this->load->view('layout/footer');
    }

    function do_kirim()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'request_barang_jadi_id' => $this->input->post('request_barang_jadi_id'),
                'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),
            );

            $response = $this->_client->request('POST', 'pengiriman', [
                'form_params' => $data
            ]);
            $insert = json_decode($response->getBody()->getContents());


            if ($insert == false) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Berhasil Dikirim
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Gagal Dikirim
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function sudahkirim()
    {
        $response = $this->_client->request('GET', 'pengiriman/sudahkirim');

        $data = [
            'barangjadi' => json_decode($response->getBody()->getContents()),
        ];
        $this->load->view('layout/header');
        $this->load->view('pengiriman/sudahkirim', $data);
        $this->load->view('layout/footer');
    }
}

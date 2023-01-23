<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');


class RequestBarangJadi extends CI_Controller
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
        $response = $this->_client->request('GET', 'requestbarangjadi');

        $data = [
            'request_barang_jadi' => json_decode($response->getBody()->getContents()),
        ];
        $this->load->view('layout/header');
        $this->load->view('requestbarangjadi/index', $data);
        $this->load->view('layout/footer');
    }

    function create()
    {
        $response = $this->_client->request('GET', 'requestbarangjadi/create/');

        $data = [
            'dataapi' => json_decode($response->getBody()->getContents()),
        ];

        // var_dump($data['dataapi']);

        $this->load->view('layout/header');
        $this->load->view('requestbarangjadi/tambah', $data);
        $this->load->view('layout/footer');
    }


    function doCreate()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'jenis_barang_jadi_id' => $this->input->post('jenis_barang_jadi_id'),
                'warna_barang_jadi_id' => $this->input->post('warna_barang_jadi_id'),
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'quantitas' => $this->input->post('quantitas'),
                'tanggal_permintaan' => date('Y-m-d'),
                'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),
                'status' => 0,
            );

            $response = $this->_client->request('POST', 'requestbarangjadi', [
                'form_params' => $data
            ]);
            $insert = json_decode($response->getBody()->getContents());


            if ($insert == false) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Request Barang Jadi berhasil ditambahkan!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Request Barang Jadi Gagal ditambahkan!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            }
            redirect('RequestBarangJadi');
        }
    }

    function edit($id)
    {

        $response = $this->_client->request('GET', 'requestbarangjadi/' . $id . '/edit', [
            // Params

        ]);
        $data = [
            'requestbarangjadi' => json_decode($response->getBody()->getContents(), true),
        ];

        $this->load->view('layout/header');
        $this->load->view('requestbarangjadi/edit', $data);
        $this->load->view('layout/footer');
    }

    function doEdit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'jenis_barang_jadi_id' => $this->input->post('jenis_barang_jadi_id'),
                'warna_barang_jadi_id' => $this->input->post('warna_barang_jadi_id'),
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'quantitas' => $this->input->post('quantitas'),
                'tanggal_permintaan' => $this->input->post('tanggal_permintaan'),
                'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),
            );

            $response = $this->_client->request('PUT', 'requestbarangjadi/' . $data['id'], [
                'form_params' => $data
            ]);

            $update = json_decode($response->getBody()->getContents(), true);


            if ($update) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Request Barang Jadi Berhasil Diubah!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Update Request Barang Jadi Gagal diubah!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            }
            redirect('RequestBarangJadi');
        }
    }

    function delete($id)
    {
        if (empty($id)) {
            redirect('RequestBarangJadi');
        } else {

            $delete = $this->_client->request('DELETE', 'requestbarangjadi/' . $id, []);


            if ($delete) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Delete Request Barang Jadi Berhasil dihapus!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Delete Request Barang Jadi Gagal dihapus!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                 </button>
               </div>');
            }
            redirect('RequestBarangJadi');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RequestBarangJadi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->API = "http://127.0.0.1:8000/";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index()
    {
        $data = [
            'request_barang_jadi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/requestbarangjadi/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('requestbarangjadi/index', $data);
        $this->load->view('layout/footer');
    }

    function create()
    {
        $data = [
            'dataapi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/requestbarangjadi/create/')),
        ];

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

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/requestbarangjadi/', $data, array(CURLOPT_BUFFERSIZE => 10));


            if ($insert) {
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
        $data['requestbarangjadi'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/requestbarangjadi/' . $id . '/edit'));
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

            $update =  $this->curl->simple_put('http://127.0.0.1:8000/requestbarangjadi/' . $data['id'], $data, array(CURLOPT_BUFFERSIZE => 10));


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
            $delete = $this->curl->simple_delete('http://127.0.0.1:8000/requestbarangjadi/' . $id, array(CURLOPT_BUFFERSIZE => 10));
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

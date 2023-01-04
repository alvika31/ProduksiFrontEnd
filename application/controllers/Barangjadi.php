<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangjadi extends CI_Controller
{
    var $API = "";

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
            'barangjadi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/barangjadi/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('barangjadi/index', $data);
        $this->load->view('layout/footer');
    }

    function create()
    {
        $data = [
            'dataapi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/barangjadi/create/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('barangjadi/tambah', $data);
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
                'stock' => $this->input->post('stock'),
                'tanggal_produksi' => $this->input->post('tanggal_produksi'),
            );

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/barangjadi/', $data, array(CURLOPT_BUFFERSIZE => 10));
            var_dump($insert);

            if ($insert) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Barang Jadi berhasil ditambahkan!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Barang Jadi Gagal ditambahkan!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            }
            redirect('barangjadi');
        }
    }

    function edit($id)
    {
        $data['databarangjadi'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/barangjadi/' . $id . '/edit'));
        $this->load->view('layout/header');
        $this->load->view('barangjadi/edit', $data);
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
                'stock' => $this->input->post('stock'),
                'tanggal_produksi' => $this->input->post('tanggal_produksi'),
            );
            var_dump($data);
            $update =  $this->curl->simple_put('http://127.0.0.1:8000/barangjadi/' . $data['id'], $data, array(CURLOPT_BUFFERSIZE => 10));
            var_dump($update);

            if ($update) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Data Barang Berhasil Diubah!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Update Data Barang Jadi Gagal diubah!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            }
            redirect('barangjadi');
        }
    }

    function delete($id)
    {
        if (empty($id)) {
            redirect('barangjadi');
        } else {
            $delete = $this->curl->simple_delete('http://127.0.0.1:8000/barangjadi/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Delete Data Barang Berhasil dihapus!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Delete Data Barang Jadi Gagal dihapus!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                 </button>
               </div>');
            }
            redirect('barangjadi');
        }
    }
}

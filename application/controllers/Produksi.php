<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
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

    public function index()
    {
        $data = [
            'barangjadi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/produksi/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('produksi/index', $data);
        $this->load->view('layout/footer');
    }

    function masukProduksi($id)
    {

        $data['barangjadi'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/produksi/addproduksi/' . $id));
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

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/produksi/', $data, array(CURLOPT_BUFFERSIZE => 512));

            if ($insert) {
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
            $updatestatus =  $this->curl->simple_put('http://127.0.0.1:8000/produksi/updatestatusproduksi/' . $data['request_barang_jadi_id'], $data, array(CURLOPT_BUFFERSIZE => 10));
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
        $data = [
            'barangjadi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/produksi/sudahproduksi/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('produksi/sudahproduksi', $data);
        $this->load->view('layout/footer');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
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
            'barangjadi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/pengiriman/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('pengiriman/index', $data);
        $this->load->view('layout/footer');
    }

    function kirimbarang($id)
    {
        $data['barangjadi'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/produksi/addproduksi/' . $id));
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
            $insert = $this->curl->simple_post('http://127.0.0.1:8000/pengiriman/', $data, array(CURLOPT_BUFFERSIZE => 512));

            if ($insert) {
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
        $data = [
            'barangjadi' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/pengiriman/sudahkirim/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('pengiriman/sudahkirim', $data);
        $this->load->view('layout/footer');
    }
}

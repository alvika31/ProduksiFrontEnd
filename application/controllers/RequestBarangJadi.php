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
        $this->load->view('requestbarangjadi/create', $data);
        $this->load->view('layout/footer');
    }

    function detailBarangJadi()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'id' => $this->input->post('barangJadiId'),
            ];
        }
        $data['detailbarangjadi'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/requestbarangjadi/detailbarangjadi/' . $data['id']));
        $this->load->view('layout/header');
        $this->load->view('requestbarangjadi/create_request', $data);
        $this->load->view('layout/footer');
    }

    function do_create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'barang_jadi_id' => $this->input->post('barang_jadi_id'),
                'quantitas' => $this->input->post('quantitas'),
                'tanggal_permintaan' => $this->input->post('tanggal_permintaan'),
                'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),
            );

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/requestbarangjadi/', $data, array(CURLOPT_BUFFERSIZE => 10));
            var_dump($insert);

            if ($insert) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Request Barang Jadi berhasil ditambahkan!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data request Barang Jadi Gagal ditambahkan!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   
                 </button>
               </div>');
            }
            redirect('RequestBarangJadi');
        }
    }

    function edit($id)
    {
        $data['detailbarangjadi'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/requestbarangjadi/' . $id . '/edit'));
        $this->load->view('layout/header');
        $this->load->view('requestbarangjadi/edit', $data);
        $this->load->view('layout/footer');
    }

    function do_edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'barang_jadi_id' => $this->input->post('barang_jadi_id'),
                'tanggal_permintaan' => $this->input->post('tanggal_permintaan'),
                'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),
            );
            $update =  $this->curl->simple_put('http://127.0.0.1:8000/requestbarangjadi/' . $data['id'], $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Data Request Barang Jadi Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Update Data Request Barang Jadi Gagal<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </button>
            </div>');
            }
            redirect('RequestBarangJadi');
        }
    }
}

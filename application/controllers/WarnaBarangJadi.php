<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WarnaBarangJadi extends CI_Controller
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

    public function index()
    {
        $data = [
            'warna' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/warnabarang/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('warnabarang/index', $data);
        $this->load->view('layout/footer');
    }

    function create()
    {
        $this->load->view('layout/header');
        $this->load->view('warnabarang/create');
        $this->load->view('layout/footer');
    }

    function doCreate()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nama_warna' => $this->input->post('nama_warna'),
                'kode_warna' => $this->input->post('kode_warna'),
            );

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/warnabarang/', $data, array(CURLOPT_BUFFERSIZE => 10));
            var_dump($insert);

            if ($insert) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Data Gagal ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            }
            redirect('WarnaBarangJadi');
        }
    }

    function edit($id)
    {
        $data['warna'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/warnabarang/' . $id . '/edit'));
        $this->load->view('layout/header');
        $this->load->view('warnabarang/edit', $data);
        $this->load->view('layout/footer');
    }

    function doEdit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama_warna' => $this->input->post('nama_warna'),
                'kode_warna' => $this->input->post('kode_warna'),
            );
            var_dump($data);
            $update =  $this->curl->simple_put('http://127.0.0.1:8000/warnabarang/' . $data['id'], $data, array(CURLOPT_BUFFERSIZE => 10));
            var_dump($update);

            if ($update) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Data Warna Barang Jadi Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Data Warna Barang Jadi Gagal<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                
              </button>
            </div>');
            }
            redirect('WarnaBarangJadi');
        }
    }

    function delete($id)
    {
        if (empty($id)) {
            redirect('WarnaBarangJadi');
        } else {
            $delete = $this->curl->simple_delete('http://127.0.0.1:8000/warnabarang/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Delete Warna Barang Jadi Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                
              </button>
            </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Delete Warna Barang Jadi Data Gagal
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </button>
            </div>');
            }
            redirect('WarnaBarangJadi');
        }
    }
}

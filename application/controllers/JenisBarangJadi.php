<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisBarangJadi extends CI_Controller
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
            'jenis_barang' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/jenisbarang/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('jenisbarang/index', $data);
        $this->load->view('layout/footer');
    }

    function create()
    {
        $this->load->view('layout/header');
        $this->load->view('jenisbarang/create');
        $this->load->view('layout/footer');
    }

    function doCreate()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nama_jenis' => $this->input->post('nama_jenis'),
                'deskripsi_jenis' => $this->input->post('deskripsi_jenis'),
            );

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/jenisbarang/', $data, array(CURLOPT_BUFFERSIZE => 512));

            if ($insert) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Jenis Barang Berhasil ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Jenis Barang Gagal ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            }
            redirect('JenisBarangJadi');
        }
    }

    function edit($id)
    {
        $data['jenis'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/jenisbarang/' . $id . '/edit'));
        $this->load->view('layout/header');
        $this->load->view('jenisbarang/edit', $data);
        $this->load->view('layout/footer');
    }

    function doEdit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama_jenis' => $this->input->post('nama_jenis'),
                'deskripsi_jenis' => $this->input->post('deskripsi_jenis'),
            );
            $update =  $this->curl->simple_put('http://127.0.0.1:8000/jenisbarang/' . $data['id'], $data, array(CURLOPT_BUFFERSIZE => 10));
            var_dump($update);

            if ($update) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Data Jenis Barang Jadi Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Data Jenis Barang Jadi Gagal<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                
              </button>
            </div>');
            }
            redirect('JenisBarangJadi');
        }
    }

    function delete($id)
    {
        if (empty($id)) {
            redirect('JenisBarangJadi');
        } else {
            $delete = $this->curl->simple_delete('http://127.0.0.1:8000/jenisbarang/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Delete Jenis Barang Jadi Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                
              </button>
            </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Delete Jenis Barang Jadi Data Gagal
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </button>
            </div>');
            }
            redirect('JenisBarangJadi');
        }
    }
}

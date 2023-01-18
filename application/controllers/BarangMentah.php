<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangMentah extends CI_Controller
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
            'barangmentah' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/barangmentah/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('barangmentah/index', $data);
        $this->load->view('layout/footer');
    }

    function create()
    {
        $this->load->view('layout/header');
        $this->load->view('barangmentah/create');
        $this->load->view('layout/footer');
    }

    function doCreate()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nama_barang_mentah' => $this->input->post('nama_barang_mentah'),
                'jenis_barang_mentah' => $this->input->post('jenis_barang_mentah'),
                'warna_barang_mentah' => $this->input->post('warna_barang_mentah'),
                'stock_mentah' => $this->input->post('stock_mentah'),
            );

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/barangmentah/', $data, array(CURLOPT_BUFFERSIZE => 512));

            if ($insert) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Barang Mentah Berhasil ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Barang Mentah Gagal ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            }
            redirect('BarangMentah');
        }
    }

    function edit($id)
    {
        $data['barangmentah'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/barangmentah/' . $id . '/edit'));
        $this->load->view('layout/header');
        $this->load->view('barangmentah/edit', $data);
        $this->load->view('layout/footer');
    }

    function doEdit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama_barang_mentah' => $this->input->post('nama_barang_mentah'),
                'jenis_barang_mentah' => $this->input->post('jenis_barang_mentah'),
                'warna_barang_mentah' => $this->input->post('warna_barang_mentah'),
                'stock_mentah' => $this->input->post('stock_mentah'),
            );
            $update =  $this->curl->simple_put('http://127.0.0.1:8000/barangmentah/' . $data['id'], $data, array(CURLOPT_BUFFERSIZE => 10));

            if ($update) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Barang Mentah Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  
                </button>
              </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update Barang Mentah Gagal<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                
              </button>
            </div>');
            }
            redirect('BarangMentah');
        }
    }

    function delete($id)
    {
        if (empty($id)) {
            redirect('BarangMentah');
        } else {
            $delete = $this->curl->simple_delete('http://127.0.0.1:8000/barangmentah/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Delete Barang Mentah Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                
              </button>
            </div>');
            } else {
                $this->session->set_flashdata('hasil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Delete Barang Mentah Gagal
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </button>
            </div>');
            }
            redirect('BarangMentah');
        }
    }
}

<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class JenisBarangJadi extends CI_Controller
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

    public function index()
    {
        $response = $this->_client->request('GET', 'jenisbarang');

        $data = [
            'jenis_barang' => json_decode($response->getBody()->getContents()),
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
            $response = $this->_client->request('POST', 'jenisbarang', [
                'form_params' => $data
            ]);
            $insert = json_decode($response->getBody()->getContents());

            if ($insert == false) {
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
        $response = $this->_client->request('GET', 'jenisbarang/' . $id . '/edit', [
            // Params

        ]);
        $data = [
            'jenis' => json_decode($response->getBody()->getContents(), true),
        ];


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
            $response = $this->_client->request('PUT', 'jenisbarang/' . $data['id'], [
                'form_params' => $data
            ]);

            $update = json_decode($response->getBody()->getContents(), true);

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
            $response = $this->_client->request('DELETE', 'jenisbarang/' . $id, []);

            if ($response) {
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

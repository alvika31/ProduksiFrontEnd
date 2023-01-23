<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class WarnaBarangJadi extends CI_Controller
{
    private $_client;
    public function __construct()
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
        $response = $this->_client->request('GET', 'warnabarang');

        $data = [
            'warna' => json_decode($response->getBody()->getContents()),
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

            $response = $this->_client->request('POST', 'warnabarang', [
                'form_params' => $data
            ]);
            $insert = json_decode($response->getBody()->getContents());

            if ($insert == false) {
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
        $response = $this->_client->request('GET', 'warnabarang/' . $id . '/edit', [
            // Params

        ]);
        $data = [
            'warna' => json_decode($response->getBody()->getContents(), true),
        ];

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
            $response = $this->_client->request('PUT', 'warnabarang/' . $data['id'], [
                'form_params' => $data
            ]);

            $update = json_decode($response->getBody()->getContents(), true);

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
            $delete = $this->_client->request('DELETE', 'warnabarang/' . $id, []);

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

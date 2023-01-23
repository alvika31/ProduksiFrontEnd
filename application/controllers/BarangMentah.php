<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class BarangMentah extends CI_Controller
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
        $response = $this->_client->request('GET', 'barangmentah');

        $data = [
            'barangmentah' => json_decode($response->getBody()->getContents()),
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
            $response = $this->_client->request('POST', 'barangmentah', [
                'form_params' => $data
            ]);
            $insert = json_decode($response->getBody()->getContents());

            if ($insert == false) {
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
        $response = $this->_client->request('GET', 'barangmentah/' . $id . '/edit/', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
            ]
        ]);
        $data = [
            'barangmentah' => json_decode($response->getBody()->getContents(), true),
        ];
        // print_r($data['barangmentah']['data']['0']['id']);
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

            $response = $this->_client->request('PUT', 'barangmentah/' . $data['id'], [
                'form_params' => $data
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
            if ($result) {
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
            $response = $this->_client->request('DELETE', 'barangmentah/' . $id, [
                'form_params' => [
                    'id' => $id,
                    'wpu-key' => 'rahasia'
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
            if ($result) {
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

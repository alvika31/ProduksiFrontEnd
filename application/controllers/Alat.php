<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat extends CI_Controller
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
            'alat' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/alat/')),
        ];
        $this->load->view('alat/index', $data);
    }

    function create(){
        $this->load->view('alat/tambah');
    }

    function do_create(){
        if(isset($_POST['submit'])){
            $data = array(
                'no_seri_alat' => $this->input->post('no_seri_alat'),
                'nama_alat' => $this->input->post('nama_alat'),
                'jenis_alat' => $this->input->post('jenis_alat'),
                'jumlah_alat' => $this->input->post('jumlah_alat'),
            );

            $insert = $this->curl->simple_post('http://127.0.0.1:8000/alat/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            var_dump($insert);

            if($insert){
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else{
                $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('alat');
        }
    }
    
    function edit($id){
        $data['alat'] = json_decode($this->curl->simple_get('http://127.0.0.1:8000/alat/'.$id.'/edit'));
        $this->load->view('alat/edit', $data);
    }
    function do_edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $this->input->post('id'),
                'no_seri_alat' => $this->input->post('no_seri_alat'),
                'nama_alat' => $this->input->post('nama_alat'),
                'jenis_alat' => $this->input->post('jenis_alat'),
                'jumlah_alat' => $this->input->post('jumlah_alat'),
            );
            var_dump($data);
            $update =  $this->curl->simple_put('http://127.0.0.1:8000/alat/'.$data['id'], $data, array(CURLOPT_BUFFERSIZE => 10)); 
            var_dump($update);

            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('alat');

        }
    }

    function delete($id){
        if(empty($id)){
            redirect('alat');
        }else{
            $delete = $this->curl->simple_delete('http://127.0.0.1:8000/alat/'.$id, array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('alat');
        }
    }

}

    ?>
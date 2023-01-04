<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
            'data' => json_decode($this->curl->simple_get('http://127.0.0.1:8000/dashboard/')),
        ];
        $this->load->view('layout/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('layout/footer');
    }
}

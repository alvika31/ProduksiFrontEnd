<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $response = $this->_client->request('GET', 'produksi/count');

        $data = [
            'count' => json_decode($response->getBody()->getContents()),
        ];


        $this->load->view('layout/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('layout/footer');
    }
}

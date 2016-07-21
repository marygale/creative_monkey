<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function index()
    {
        $arData = ['title' => 'Home | Creative Monkey'];
        $this->load->view('home', $arData);
    }

    public function log_auth()
    {
        echo 'login';
    }
}
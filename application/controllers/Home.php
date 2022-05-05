<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
    }



    public function index() {
        if ($this->session->userdata('username'))
        {
            $this->layout->view('home');
        }
        else
        {
            $this->load->view('login');
        }
    }
}
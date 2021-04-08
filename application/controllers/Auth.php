<?php 
    class Auth extends CI_Controller
    {
        public function __construct() {
            parent::__construct();
            // $this->load->model('ModelAuth');
        }
        public function index()
        {
            // Halaman Login
            $data['title']          ='SIAKAD';
            $this->load->view('login',$data);
        }
    }
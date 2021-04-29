<?php

class C_Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modeluser');
    }
    public function index($id = null)
    {
        echo "Cek";
    }
    public function profil()
    {
        # code...
    }
}

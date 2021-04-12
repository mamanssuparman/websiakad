<?php
class ModelAuth extends CI_Model
{ 
    public function Cek_login($username,$tabel)
    {
        $this->db->get_where($tabel,array('username',$username));
    }
}
<?php 

function ceklogin()
{
    $ci=& get_instance();
    $session_user=$ci->session->userdata('id_user');
    if (!$session_user) {
        redirect('Auth');
    }
}
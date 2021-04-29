<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelmenu');
        $this->load->model('Modeldata');

        ceklogin();
    }
    public function index()
    {
        $data['data_menu']          = $this->Modelmenu->get_data_user_menu()->result();
        $this->template->load('admin_template/halaman_master', 'management/Menu', $data);
    }
    public function Simpan()
    {
        // Validasi data
        $this->form_validation->set_rules('menu', ',menu', 'required');
        if ($this->form_validation->run() == TRUE) {
            // Validasi berhasil
            $this->Modelmenu->simpan_menu();
            $this->session->set_flashdata('pesan', 'Data menu berhasi di simpan.!');
            redirect('Menu');
        } else {
            // Validasi Gagal
            $data['data_menu']          = $this->Modelmenu->get_data_user_menu()->result();
            $this->template->load('admin_template/halaman_master', 'management/Menu', $data);
        }
    }
    public function Aktifkan_menu($id)
    {
        $this->db->set(array('status_active' => '1'));
        $this->db->where('id_access_menu', $id);
        $this->db->update('user_access_menu');
    }
    public function Nonaktif_menu($id)
    {
    }
    public function Submenu()
    {
        $data['data_sub_menu']              = $this->Modelmenu->get_data_vw_role_access_sub_menu()->result();
        $data['data_role']                  = $this->Modeldata->get_data_role()->result();
        $data['data_menu']                  = $this->Modelmenu->get_data_user_menu()->result();
        $data['data_sub_menu_1']            = $this->Modelmenu->get_data_sub_menu()->result();
        $this->template->load('admin_template/halaman_master', 'management/Submenu', $data);
    }
    public function Acess_submenu($md5 = null, $id)
    {
        // $id_role=$this->session->userdata('id_role');
        $konversi = md5($md5);
        if ($konversi == $id) {
            $data['data_sub_menu']          = $this->Modelmenu->get_sub_menu_by_role($md5)->result();
            $this->template->load('admin_template/halaman_master', 'management/akses_sub_menu', $data);
        } else {
            echo "Gagal";
        }
    }
}

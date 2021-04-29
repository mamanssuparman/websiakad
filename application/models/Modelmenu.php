<?php 

class Modelmenu extends CI_Model{

    public function get_data_user_menu()
    {
        return $this->db->get('user_menu');
    }
    public function simpan_menu()
    {
        $isidata=array(
            'menu'          =>$this->input->post('menu',TRUE),
            'status_active' =>'1',
        );
        $this->db->insert('user_menu',$isidata);
    }
    public function get_sub_menu_by_role($id_role)
    {   
        $this->db->where('id_role',$id_role);
        return $this->db->get('vw_role_access_sub_menu');
    }
    public function get_data_sub_menu()
    {
        return $this->db->get('user_sub_menu');
    }
    public function get_data_vw_role_access_sub_menu()
    {
        return $this->db->get('vw_role_access_sub_menu');
    }
}
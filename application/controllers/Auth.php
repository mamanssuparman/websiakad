<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAuth');
    }
    public function index()
    {
        // Halaman Login
        // $ip                     =$_SERVER['REMOTE_ADDR'];
        $data['title']          = 'SIAKAD';
        $this->load->view('login', $data);
    }
    public function Login()
    {
        $ip                     = $_SERVER['REMOTE_ADDR'];
        $this->form_validation->set_rules('username', 'username', 'required', array('required' => 'Username tidak boleh kosong.!'));
        $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Password tidak boleh kosong.!'));
        if ($this->form_validation->run() == TRUE) {
            $cari_username = $this->db->get_where('pegawai', array('username' => $this->input->post('username', TRUE)));
            if ($cari_username->row_array() > 0) {
                foreach ($cari_username->result() as $cek_password) {
                    // Pengecekan Password
                    if (password_verify($this->input->post('password', TRUE), $cek_password->pasword)) {
                        $id_user = $cek_password->id_user;
                        $cari_is_active = $this->db->get_where('login', array('id_user' => $id_user));
                        foreach ($cari_is_active->result() as $ketemu_is_active) {
                            // Pengkondisian jika username masih active
                            if ($ketemu_is_active->is_active == '1') {
                                $update_active_1=array(
                                    'user_agent'        =>$ip,
                                );
                                $this->db->set($update_active_1);
                                $this->db->where('id_user',$id_user);
                                $this->db->update('login');
                                $session_data=array(
                                    'id_user'           =>$id_user,
                                    'id_role'           =>$cek_password->id_role,
                                );
                                $this->session->set_userdata($session_data);
                                redirect('Dashboard');
                            }else{
                            // Pengkondisian jika username belum active
                                $update_active_0=array(
                                    'user_agent'        =>$ip,
                                    'is_active'         =>'1',
                                );
                                $this->db->set($update_active_0);
                                $this->db->where('id_user',$id_user);
                                $this->db->update('login');
                                $session_data=array(
                                    'id_user'           =>$id_user,
                                    'id_role'           =>$cek_password->id_role,
                                );
                                $this->session->set_userdata($session_data);
                                redirect('Dashboard');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('pesan', 'Password yang anda masukkan tidak sesuai.!');
                        $data['title']          = 'SIAKAD';
                        $this->load->view('login', $data);
                    }
                }
            } else {
                $this->session->set_flashdata('pesan', 'Data username yang anda masukkan tidak ditemukan.!');
                $data['title']          = 'SIAKAD';
                $this->load->view('login', $data);
            }
        } else {
            $data['title']          = 'SIAKAD';
            $this->load->view('login', $data);
        }
    }
    public function Logout()
    {
        $id_user = $this->session->userdata('id_user');
        $ip = $_SERVER['REMOTE_ADDR'];
        $update_data_logout = array(
            'is_active'         => '0',
            'user_agent'        => $ip,
        );
        $this->db->set($update_data_logout);
        $this->db->where('id_user', $id_user);
        $this->db->update('login');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('id_role');
        $this->session->sess_destroy();
        redirect('Auth', 'refresh');
    }
}

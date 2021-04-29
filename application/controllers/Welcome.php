<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modeluser');
		// $this->load->helper('attribute');
	}
	public function index()
	{
		$data['title']					= "SMKN 3 Banjar";
		$data['sub_title']				= "Beranda";
		$data['menu_profil']			= $this->Modeluser->get_menu_profil()->result();
		$data['menu_program_keahlian']	= $this->Modeluser->get_menu_program_keahlian()->result();
		$data['berita_beranda']			= $this->Modeluser->get_berita_beranda()->result();
		// $data['kepala_sekolah']			= 
		$this->template->load('user_template/halaman_master', 'user_beranda/beranda', $data);
	}
	public function Profile()
	{
		$id = $this->uri->segment(2);
		$cek = $this->Modeluser->get_profile_by_slug($id);
		if ($cek->row_array() > 0) {
			foreach ($cek->result() as $ketemu) {
				$data['title']					= "SMKN 3 Banjar";
				$data['sub_title']				= $ketemu->nama;
				$data['judul']					= $ketemu->nama;
				$data['isi']					= $ketemu->isi;
				$data['tanggal']				= $ketemu->tanggal;
				$data['menu_profil']			= $this->Modeluser->get_menu_profil()->result();
				$data['menu_program_keahlian']	= $this->Modeluser->get_menu_program_keahlian()->result();
				$this->template->load('user_template/halaman_master', 'user_profil/profil', $data);
			}
		} else {
			show_404();
		}
	}
	public function Prokeh()
	{
		$id = $this->uri->segment(2);
		$cek = $this->Modeluser->get_program_keahlian_by_slug($id);
		if ($cek->row_array() > 0) {
			foreach ($cek->result() as $ketemu) {
				$data['title']					= "SMKN 3 Banjar";
				$data['sub_title']				= $ketemu->judul;
				$data['judul']					= $ketemu->judul;
				$data['isi']					= $ketemu->deskripsi;
				$data['tanggal']				= $ketemu->tanggal;
				$data['menu_profil']			= $this->Modeluser->get_menu_profil()->result();
				$data['menu_program_keahlian']	= $this->Modeluser->get_menu_program_keahlian()->result();
				$this->template->load('user_template/halaman_master', 'user_profil/prokeh', $data);
			}
		} else {
			show_404();
		}
	}
	public function Galery()
	{
		$data['title']					= "SMKN 3 Banjar";
		$data['sub_title']				= 'Galery';
		$data['judul']					= 'Galery Foto';
		$data['menu_profil']			= $this->Modeluser->get_menu_profil()->result();
		$data['menu_program_keahlian']	= $this->Modeluser->get_menu_program_keahlian()->result();
		$data['data_galery']			= $this->Modeluser->get_data_galery()->result();
		$this->template->load('user_template/halaman_master', 'user_profil/Galery', $data);
	}
	public function Video()
	{
		$data['title']					= "SMKN 3 Banjar";
		$data['sub_title']				= 'Video';
		$data['judul']					= 'Galery Video';
		$data['menu_profil']			= $this->Modeluser->get_menu_profil()->result();
		$data['menu_program_keahlian']	= $this->Modeluser->get_menu_program_keahlian()->result();
		$data['data_video']				= $this->Modeluser->get_data_video()->result();
		$this->template->load('user_template/halaman_master', 'user_profil/Video', $data);
	}
	public function Staff()
	{
		$data['title']					= "SMKN 3 Banjar";
		$data['sub_title']				= 'Tenaga Pendidik';
		$data['judul']					= 'Tenaga Pendidik';
		$data['menu_profil']			= $this->Modeluser->get_menu_profil()->result();
		$data['menu_program_keahlian']	= $this->Modeluser->get_menu_program_keahlian()->result();
		$data['data_staff']				= $this->Modeluser->get_data_staff()->result();
		$this->template->load('user_template/halaman_master', 'user_staff/staff', $data);
	}
	public function Berita()
	{
		$id = $this->uri->segment(2);
		$cek = $this->Modeluser->get_berita_by_slug($id);
		if ($cek->row_array() > 0) {
			foreach ($cek->result() as $ketemu) {
				$data['title']					= "SMKN 3 Banjar";
				$data['sub_title']				= $ketemu->judul;
				$data['judul']					= $ketemu->judul;
				$data['isi']					= $ketemu->isi;
				$data['tanggal']				= $ketemu->tanggal;
				$data['pembuat']				= $ketemu->pembuat;
				$data['menu_profil']			= $this->Modeluser->get_menu_profil()->result();
				$data['menu_program_keahlian']	= $this->Modeluser->get_menu_program_keahlian()->result();
				$this->template->load('user_template/halaman_master', 'user_beranda/berita', $data);
			}
		} else {
			show_404();
		}
	}
	public function Kategori($slug = null)
	{
		$id = $this->uri->segment(2);
		$cek = $this->Modeluser->get_kategori_by_slug($id);
		if ($cek->row_array() > 0) {
			foreach ($cek->result() as $tampilkan) {
				$data['title']						= "SMKN 3 Banjar";
				$data['sub_title']					= "";
				$data['judul']						= $tampilkan->nama;
				$data['data_kategori']				= $this->Modeluser->get_kategori_by_slug($id)->result();
				$data['menu_profil']				= $this->Modeluser->get_menu_profil()->result();
				$data['menu_program_keahlian']		= $this->Modeluser->get_menu_program_keahlian()->result();
				$this->template->load('user_template/halaman_master', 'user_beranda/kategori', $data);
			}
		} else {
			show_404();
		}
	}
	public function Search($katakunci=null)
	{
		$id=$this->input->post('search',TRUE);
		$pencarian =$this->Modeluser->get_pencarian($id);
		
	}
}

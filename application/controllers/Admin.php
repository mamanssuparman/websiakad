<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modeldata');
	}
	// Halaman Dashboard
	public function index()
	{
		$this->template->load('admin_template/halaman_master', 'dashboard/dashboard');
	}
	// Kategori
	public function Kategori()
	{
		$data['data_kategori']			= $this->Modeldata->get_data_kategori()->result();
		$this->template->load('admin_template/halaman_master', 'data/kategori', $data);
	}
	public function Savekategori()
	{
		$this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|is_unique[categor.nama]', array('required' => 'Nama kategori tidak boleh kosong.!', 'is_unique' => 'Nama Kategori sudah ada di dalam tabel'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => 'Deskripsi kategori tidak boleh kosong.!'));
		$this->form_validation->set_rules('status_terbit', 'status_terbit', 'required', array('required' => 'Status kategori tidak boleh kosong.!'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$this->Modeldata->simpan_kategori();
			$this->session->set_flashdata('pesan', 'Data kategori berhasil di simpan.!');
			redirect('Kategori');
		} else {
			// Jika Gagal
			$data['data_kategori']			= $this->Modeldata->get_data_kategori()->result();
			$this->template->load('admin_template/halaman_master', 'data/kategori', $data);
		}
	}
	public function Get_id_kategori_hapus($id = null)
	{
		$query = $this->db->get_where('categor', array('id_kategori' => $id))->row();
		echo json_encode($query);
	}
	public function Edit_kategori($id = null)
	{
		$data['data_kategori_edit']		= $this->Modeldata->get_kategori_by_id($id)->result();
		$data['data_kategori']			= $this->Modeldata->get_data_kategori()->result();
		$this->template->load('admin_template/halaman_master', 'data/Edit_kategori', $data);
	}
	public function Update_kategori()
	{
		$this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required', array('required' => 'Nama kategori tidak boleh kosong.!'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => 'Deskripsi kategori tidak boleh kosong.!'));
		$this->form_validation->set_rules('status_terbit', 'status_terbit', 'required', array('required' => 'Status kategori tidak boleh kosong.!'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil
			$this->Modeldata->Update_kategori();
			$this->session->set_flashdata('pesan', 'Data kategori berhasil di Perbaharui.!');
			redirect('Kategori');
		} else {
			// Jika gagal validasi 
			$id = $this->input->post('id_kategori', TRUE);
			$data['data_kategori_edit']		= $this->Modeldata->get_kategori_by_id($id)->result();
			$this->template->load('admin_template/halaman_master', 'data/Edit_kategori', $data);
		}
	}
	public function Hapus_kategori()
	{
		// Validasi Id Kategori hapus
		$this->form_validation->set_rules('id_kategori_hapus', 'id_kategori_hapus', 'required');
		if ($this->form_validation->run() == TRUE) {
			// Id Kategori terisi 
			$this->db->trans_start();
			$this->Modeldata->Hapus_kategori();
			$this->db->trans_complete();
			// Logika jika id kategori masih berkaitan dengan tabel yang lain
			if ($this->db->trans_status() == FALSE) {
				$this->session->set_flashdata('pesan', 'Maaf data kategori tidak bisa di hapus karena data masih berkaitan dengan data yang lain');
				redirect('Kategori');
			} else {
				$this->session->set_flashdata('pesan', 'Data kategori berhasil di hapus');
				redirect('Kategori');
			}
		}
	}
	// Profil
	public function Profil()
	{
		$data['data_profil']			= $this->Modeldata->get_data_profil()->result();
		$this->template->load('admin_template/halaman_master', 'data/profil', $data);
	}
	public function Simpan_Profil()
	{
		$this->form_validation->set_rules('nama_profil', 'nama_profil', 'required|is_unique[profil.nama]', array('required' => 'Nama Profil tidak boleh kosong', 'is_unique' => 'Nama profil sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('isi', 'isi', 'required', array('required' => 'Isi Profil tidak boleh kosong'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$this->Modeldata->simpan_profil();
			$this->session->set_flashdata('pesan', 'Data Profil berhasil di simpan.!');
			redirect('Profil');
		} else {
			// Jika Gagal
			$data['data_profil']			= $this->Modeldata->get_data_profil()->result();
			$this->template->load('admin_template/halaman_master', 'data/profil', $data);
		}
	}
	public function Get_id_profil_hapus($id=null)
	{
		$query = $this->db->get_where('profil', array('id_profil' => $id))->row();
		echo json_encode($query);
	}
	public function Hapus_profil()
	{
		$this->form_validation->set_rules('id_profil_hapus', 'id_profil_hapus', 'required');
		if ($this->form_validation->run() == TRUE) {
			// Id Kategori terisi 
			$this->db->trans_start();
			$this->Modeldata->Hapus_kategori();
			$this->db->trans_complete();
			// Logika jika id kategori masih berkaitan dengan tabel yang lain
			if ($this->db->trans_status() == FALSE) {
				$this->session->set_flashdata('pesan', 'Maaf data kategori tidak bisa di hapus karena data masih berkaitan dengan data yang lain');
				redirect('Kategori');
			} else {
				$this->session->set_flashdata('pesan', 'Data kategori berhasil di hapus');
				redirect('Kategori');
			}
		}
	}
	public function Edit_profil($id=null)
	{
		$data['data_profil_edit']		= $this->Modeldata->get_profil_by_id($id)->result();
		$data['data_profil']			= $this->Modeldata->get_data_profil()->result();
		$this->template->load('admin_template/halaman_master', 'data/edit_profil', $data);
	}
	public function Update_profil()
	{
		$this->form_validation->set_rules('nama_profil', 'nama_profil', 'required', array('required' => 'Nama Profil tidak boleh kosong'));
		$this->form_validation->set_rules('isi', 'isi', 'required', array('required' => 'Isi Profil tidak boleh kosong'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$this->Modeldata->Update_profil();
			$this->session->set_flashdata('pesan', 'Data Profil berhasil di Update.!');
			redirect('Profil');
		} else {
			// Jika Gagal
			$data['data_profil']			= $this->Modeldata->get_data_profil()->result();
			$this->template->load('admin_template/halaman_master', 'data/edit_profil', $data);
		}
	}
	// Proju Profil Jurusan
	public function Proju()
	{
		$data['data_proju']				= $this->Modeldata->get_data_proju()->result();
		$this->template->load('admin_template/halaman_master', 'data/proju', $data);
	}
	public function Saveproju()
	{
		$this->form_validation->set_rules('nama_proju', 'nama_proju', 'required|is_unique[proju.nama]', array('required' => 'Nama Profil Jurusan tidak boleh kosong', 'is_unique' => 'Nama profil Jurusan sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => 'Deskripsi tidak boleh kosong'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$this->Modeldata->simpan_profil();
			$this->session->set_flashdata('pesan', 'Data Profil Jurusan berhasil di simpan.!');
			redirect('Proju');
		} else {
			// Jika Gagal
			$data['data_proju']			= $this->Modeldata->get_data_proju()->result();
			$this->template->load('admin_template/halaman_master', 'data/proju', $data);
		}
	}
}
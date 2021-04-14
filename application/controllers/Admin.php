<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modeldata');
		ceklogin();
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
	public function Get_id_profil_hapus($id = null)
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
	public function Edit_profil($id = null)
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
		$this->form_validation->set_rules('nama_proju', 'nama_proju', 'required|is_unique[proju.judul]', array('required' => 'Nama Profil Jurusan tidak boleh kosong', 'is_unique' => 'Nama profil Jurusan sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => 'Deskripsi tidak boleh kosong'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$this->Modeldata->simpan_proju();
			$this->session->set_flashdata('pesan', 'Data Profil Jurusan berhasil di simpan.!');
			redirect('Proju');
		} else {
			// Jika Gagal
			$data['data_proju']			= $this->Modeldata->get_data_proju()->result();
			$this->template->load('admin_template/halaman_master', 'data/proju', $data);
		}
	}
	public function Get_id_proju_hapus($id = null)
	{
		$query = $this->db->get_where('proju', array('id_proju' => $id))->row();
		echo json_encode($query);
	}
	public function Hapus_proju()
	{
		$this->form_validation->set_rules('id_proju_hapus', 'id_proju_hapus', 'required');
		if ($this->form_validation->run() == TRUE) {
			// Id Kategori terisi 
			$this->db->trans_start();
			$this->Modeldata->Hapus_proju();
			$this->db->trans_complete();
			// Logika jika id kategori masih berkaitan dengan tabel yang lain
			if ($this->db->trans_status() == FALSE) {
				$this->session->set_flashdata('pesan', 'Maaf Data Profil Jurusan tidak bisa di hapus karena data masih berkaitan dengan data yang lain');
				redirect('Proju');
			} else {
				$this->session->set_flashdata('pesan', 'Data Profil Jurusan berhasil di hapus');
				redirect('Proju');
			}
		}
	}
	public function Edit_proju($id = null)
	{
		$data['data_proju_edit']		= $this->Modeldata->get_proju_by_id($id)->result();
		$data['data_proju']				= $this->Modeldata->get_data_proju()->result();
		$this->template->load('admin_template/halaman_master', 'data/edit_proju', $data);
	}
	public function Update_proju()
	{
		$id_proju = $this->input->post('id_proju', 'id_proju', 'required');
		$this->form_validation->set_rules('nama_proju', 'nama_proju', 'required', array('required' => 'Nama Profil Jurusan tidak boleh kosong'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => 'Isi Profil tidak boleh kosong'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$this->Modeldata->Update_proju($id_proju);
			$this->session->set_flashdata('pesan', 'Data Profil Jurusan berhasil di Update.!');
			redirect('Proju');
		} else {
			// Jika Gagal
			$data['data_profil']			= $this->Modeldata->get_data_profil()->result();
			$this->template->load('admin_template/halaman_master', 'data/edit_profil', $data);
		}
	}
	// Program Keahlian
	public function Program_keahlian()
	{
		$data['data_program_keahlian']				= $this->Modeldata->get_data_program_keahlian()->result();
		$this->template->load('admin_template/halaman_master', 'data/program_keahlian', $data);
	}
	public function Save_program_keahlian()
	{
		$this->form_validation->set_rules('nama_program_keahlian', 'nama_program_keahlian', 'required|is_unique[programkeahlian.judul]', array('required' => 'Nama Program Keahlian tidak boleh kosong', 'is_unique' => 'Nama Program Keahlian sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => 'Deskripsi tidak boleh kosong'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$this->Modeldata->simpan_program_keahlian();
			$this->session->set_flashdata('pesan', 'Data Program Keahlian berhasil di simpan.!');
			redirect('Program-Keahlian');
		} else {
			// Jika Gagal
			$data['data_program_keahlian']			= $this->Modeldata->get_data_program_keahlian()->result();
			$this->template->load('admin_template/halaman_master', 'data/program_keahlian', $data);
		}
	}
	public function Get_id_program_keahlian_hapus($id = null)
	{
		$query = $this->db->get_where('programkeahlian', array('id_program_keahlian' => $id))->row();
		echo json_encode($query);
	}
	public function Hapus_program_keahlian()
	{
		$this->form_validation->set_rules('id_program_hapus', 'id_program_hapus', 'required');
		if ($this->form_validation->run() == TRUE) {
			// Id Kategori terisi 
			$this->db->trans_start();
			$this->Modeldata->Hapus_program_keahlian();
			$this->db->trans_complete();
			// Logika jika id kategori masih berkaitan dengan tabel yang lain
			if ($this->db->trans_status() == FALSE) {
				$this->session->set_flashdata('pesan', 'Maaf Data Profil Jurusan tidak bisa di hapus karena data masih berkaitan dengan data yang lain');
				redirect('Program-Keahlian');
			} else {
				$this->session->set_flashdata('pesan', 'Data Profil Jurusan berhasil di hapus');
				redirect('Program-Keahlian');
			}
		}
	}
	public function Edit_program_keahlian($id = null)
	{
		$data['data_program_keahlian_edit']		= $this->Modeldata->get_data_program_keahlian_by_id($id)->result();
		$data['data_program_keahlian']			= $this->Modeldata->get_data_program_keahlian()->result();
		$this->template->load('admin_template/halaman_master', 'data/edit_program_keahlian', $data);
	}
	public function Update_program_keahlian()
	{
		$this->form_validation->set_rules('nama_program_keahlian', 'nama_program_keahlian', 'required|is_unique[programkeahlian.judul]', array('required' => 'Nama Program Keahlian tidak boleh kosong', 'is_unique' => 'Nama Program Keahlian sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => 'Deskripsi tidak boleh kosong'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$id = $this->input->post('id_program_keahlian', TRUE);
			$this->Modeldata->update_program_keahlian($id);
			$this->session->set_flashdata('pesan', 'Data Program Keahlian berhasil di simpan.!');
			redirect('Program-Keahlian');
		} else {
			// Jika Gagal
			$data['data_program_keahlian']			= $this->Modeldata->get_data_program_keahlian()->result();
			$this->template->load('admin_template/halaman_master', 'data/program_keahlian', $data);
		}
	}
	// Pengumuman
	public function Pengumuman()
	{
		$data['data_pengumuman']			= $this->Modeldata->get_data_pengumuman()->result();
		// $data['data_role']					= $this->Modeldata->get_data_role()->result();
		$this->template->load('admin_template/halaman_master', 'data/pengumuman', $data);
	}
	public function Save_pengumuman()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required|htmlspecialchars', array('required' => 'Judul tidak boleh kosong'));
		$this->form_validation->set_rules('isi', 'isi', 'required', array('required' => 'Isi tidak boleh kosong.!'));
		if ($this->form_validation->run() == TRUE) {
			// Validasi berhasil
			$this->Modeldata->Save_pengumuman();
			$this->session->set_flashdata('pesan', 'Data pengumuman berhasil di simpan.!');
			redirect('Pengumuman');
		} else {
			// Validasi gagal
			$data['data_pengumuman']			= $this->Modeldata->get_data_pengumuman()->result();
			// $data['data_role']					= $this->Modeldata->get_data_role()->result();
			$this->template->load('admin_template/halaman_master', 'data/pengumuman', $data);
		}
	}
	public function Get_id_pengumuman($id = null)
	{
		$query = $this->db->get_where('pengumuman', array('id_pengumuman' => $id))->row();
		echo json_encode($query);
	}
	public function Hapus_pengumuman()
	{
		$this->form_validation->set_rules('id_pengumuman_hapus', 'id_pengumuman_hapus', 'required', array('required' => 'Data tidak berhasil di hapus'));
		if ($this->form_validation->run() == TRUE) {
			// Validasi berhasil
			$this->Modeldata->Hapus_pengumuman('pengumuman', $this->input->post('id_pengumuman_hapus'));
			$this->session->set_flashdata('pesan', 'Data pengumuman berhasil di hapus.!');
			redirect('Pengumuman');
		} else {
			// Validasi gagal
			$this->session->set_flashdata('pesan', 'Data pengumuman gagal di hapus.!');
			redirect('Pengumuman');
		}
	}
	public function Edit_pengumuman($md5 = null, $id = null)
	{
		$konversi_md5 = md5($md5);
		if ($konversi_md5 == $id) {
			$data['data_pengumuman_edit']			= $this->Modeldata->get_data_pengumuman_by_id($md5)->result();
			$this->template->load('admin_template/halaman_master', 'data/edit_pengumuman', $data);
		} else {
			redirect('Pengumuman', 'refresh');
		}
	}
	public function Update_pengumuman()
	{
		$this->form_validation->set_rules('id_pengumuman', 'id_pengumuman', 'required|htmlspecialchars', array('required' => 'Judul tidak boleh kosong'));
		$this->form_validation->set_rules('judul', 'judul', 'required|htmlspecialchars', array('required' => 'Judul tidak boleh kosong'));
		$this->form_validation->set_rules('isi', 'isi', 'required', array('required' => 'Isi tidak boleh kosong.!'));
		if ($this->form_validation->run() == TRUE) {
			$this->Modeldata->Update_pengumuman($this->input->post('id_pengumuman', TRUE));
			$this->session->set_flashdata('pesan', 'Data pengumuman berhasil di perbaharui');
			redirect('Pengumuman');
		} else {
			echo "gagal";
		}
	}
	// Berita
	public function Berita()
	{
		$data['data_berita']					= $this->Modeldata->get_data_berita()->result();
		$data['data_kategori']					= $this->Modeldata->get_data_kategori_active()->result();
		$this->template->load('admin_template/halaman_master', 'data/berita', $data);
	}
	public function Save_berita()
	{
		// Validasi Form 
		$this->form_validation->set_rules('judul', 'judul', 'required', array('required' => 'Judul tidak boleh kosong.!'));
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'required', array('required' => 'Kategori tidak boleh kosong.!'));
		$this->form_validation->set_rules('isi', 'isi', 'required', array('required' => 'Isi tidak boleh kosong.!'));
		if ($this->form_validation->run() == TRUE) {
			// Validasi berhasil 
			$this->Modeldata->Simpan_berita('berita');
			$this->session->set_flashdata('pesan', 'Data berita berhasil di simpan.!');
			redirect('Berita');
		} else {
			// Validasi gagal
			$data['data_berita']					= $this->Modeldata->get_data_berita()->result();
			$data['data_kategori']					= $this->Modeldata->get_data_kategori_active()->result();
			$this->template->load('admin_template/halaman_master', 'data/berita', $data);
		}
	}
	public function Detail_berita($md5 = null, $id = null)
	{

		$konversi = md5($md5);
		if ($konversi == $id) {
			$data['data_detail_berita']				= $this->Modeldata->get_data_berita_by_id($md5)->result();
			// $data['data_kategori']					= $this->Modeldata->get_data_kategori_active()->result();
			$this->template->load('admin_template/halaman_master', 'data/detail_berita', $data);
		} else {
			echo "Gagal";
		}
	}
	public function Get_id_berita_status($id = null)
	{
		$this->db->where('id_berita', $id);
		$query = $this->db->get('berita')->row();
		echo json_encode($query);
	}
	public function Edit_berita($md5 = null, $id = null)
	{
		$konversi = md5($md5);
		if ($konversi == $id) {
			$data['data_berita_edit']			= $this->Modeldata->get_data_berita_by_id($md5)->result();
			$data['data_kategori']				= $this->Modeldata->get_data_kategori_active()->result();
			$this->template->load('admin_template/halaman_master', 'data/edit_berita', $data);
		} else {
			echo "gagal";
		}
	}
	public function Update_berita()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required', array('required' => 'Judul tidak boleh kosong.!'));
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'required', array('required' => 'Kategori tidak boleh kosong.!'));
		$this->form_validation->set_rules('isi', 'isi', 'required', array('required' => 'Isi tidak boleh kosong.!'));
		if ($this->form_validation->run() == TRUE) {
			// Validasi berhasil 
			$this->Modeldata->Update_berita($this->input->post('id_berita', TRUE));
			$this->session->set_flashdata('pesan', 'Data berita berhasil di simpan.!');
			redirect('Berita');
		} else {
			// Validasi gagal
			$data['data_berita']					= $this->Modeldata->get_data_berita()->result();
			$data['data_kategori']					= $this->Modeldata->get_data_kategori_active()->result();
			$this->template->load('admin_template/halaman_master', 'data/berita', $data);
		}
	}
	// Pegawai
	public function Pegawai()
	{
		$data['data_pegawai']				= $this->Modeldata->get_data_pegawai()->result();
		$data['data_role']					= $this->Modeldata->get_data_role()->result();
		$this->template->load('admin_template/halaman_master', 'data/pegawai', $data);
	}
	public function Aktifkan_berita()
	{
		$this->form_validation->set_rules('id_berita_aktif', 'id_berita_aktif', 'required');
		if ($this->form_validation->run() == TRUE) {
			// validasi berhasil
			$this->Modeldata->aktifkan_berita($this->input->post('id_berita_aktif', TRUE));
			$this->session->set_flashdata('pesan', 'Data berita berhasil di aktifkan');
			redirect('Berita');
		}
	}
	public function nonaktifkan_berita()
	{
		$this->form_validation->set_rules('id_berita_nonaktif', 'id_berita_nonaktif', 'required');
		if ($this->form_validation->run() == TRUE) {
			// validasi berhasil
			$this->Modeldata->nonaktifkan_berita($this->input->post('id_berita_nonaktif', TRUE));
			$this->session->set_flashdata('pesan', 'Data berita berhasil di Non aktifkan');
			redirect('Berita');
		}
	}
	public function Savepegawai()
	{
		$this->form_validation->set_rules('nip', 'nip', 'required', array('required' => 'NIP tidak boleh kosong, jika dikosongkan di isi dengan "-"'));
		$this->form_validation->set_rules('nuptk', 'nuptk', 'required', array('required' => 'NUPTK tidak boleh kosong, jika dikosongkan di isi dengan "-"'));
		$this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama Pegawai tidak boleh kosong', 'is_unique' => 'Nama profil Jurusan sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('jk', 'jk', 'required', array('required' => 'Jenis kelamin belum di pilih'));
		$this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama Pegawai tidak boleh kosong', 'is_unique' => 'Nama profil Jurusan sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('pangkat', 'pangkat', 'htmlspecialchars', array('htmlspecialchars' => 'Masukkan data dengan benar'));
		$this->form_validation->set_rules('golongan', 'golongan', 'htmlspecialchars', array('htmlspecialchars' => 'Masukkan data dengan benar'));
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[pegawai.username]', array('required' => 'Username tidak boleh kosong.', 'is_unique' => 'Username sudah terdaftar, mohon di cek kembali'));
		// $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Password tidak boleh kosong.!'));
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required', array('required' => 'Tanggal lahir belum di isi.!'));
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil 
			$foto = $_FILES['foto']['name'];
			// Pengkondisian Foto 
			if (!empty($foto)) {
				$acak = rand(1000, 9999);
				$string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama', TRUE));
				$trim = trim($string);
				$pre_slug = strtolower(str_replace(" ", "-", $trim));
				$slug = $acak . '-pegawai-' . $pre_slug . '.html';
				$foto1 = $acak . '-images-' . md5($acak) . '.jpg';
				$config['upload_path']		= './uploads';
				$config['allowed_types']	= 'jpg';
				$config['max_size']			= 1024;
				$config['file_name']		= $foto1;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('pesan', 'Data gambar tidak sesuai.!!');
					redirect('Pegawai/');
				} else {
					$this->Modeldata->Simpan_pegawai_foto('pegawai', $foto1, $slug);
					$this->session->set_flashdata('pesan', 'Data pegawai berhasil di simpan.!');
					redirect('Pegawai/');
				}
				// Pengkondisian jika fotonya terisi
			} else {
				$cekjkfoto = $this->input->post('jk', TRUE);
				if ($cekjkfoto == "L") {
					$jenisfoto = "L-default.jpg";
				} else {
					$jenisfoto = "P-default.jpg";
				}
				$acak = rand(1000, 9999);
				$string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama', TRUE));
				$trim = trim($string);
				$pre_slug = strtolower(str_replace(" ", "-", $trim));
				$slug1 = $acak . '-pegawai-' . $pre_slug . '.html';
				$this->Modeldata->Simpan_pegawai_nofoto('pegawai', $jenisfoto, $slug1);
				$this->session->set_flashdata('pesan', 'Data pegawai berhasil di simpan.!');
				redirect('Pegawai/');
			}
		} else {
			// Jika Gagal
			$data['data_pegawai']				= $this->Modeldata->get_data_pegawai()->result();
			$data['data_role']					= $this->Modeldata->get_data_role()->result();
			$this->template->load('admin_template/halaman_master', 'data/pegawai', $data);
		}
	}
	public function Detail_pegawai($md5 = null, $id = null)
	{
		// Pengkondisian URL
		$konversi = md5($md5);
		if ($konversi != $id) {
			redirect('Pegawai');
		} else {
			$data['data_pegawai']				= $this->Modeldata->get_data_pegawai_by_id($md5)->result();
			// $data['data_role']				= $this->Modeldata->get_data_role()->result();
			$this->template->load('admin_template/halaman_master', 'data/detail_pegawai', $data);
		}
	}
	public function Edit_pegawai($md5 = null, $id = null)
	{
		$konversi = md5($md5);
		if ($konversi != $id) {
			redirect('Pegawai');
		} else {
			$data['data_pegawai']				= $this->Modeldata->get_data_pegawai_by_id($md5)->result();
			$data['data_role']					= $this->Modeldata->get_data_role()->result();
			$this->template->load('admin_template/halaman_master', 'data/edit_pegawai', $data);
		}
	}
	public function Update_pegawai()
	{
		$this->form_validation->set_rules('nip', 'nip', 'required', array('required' => 'NIP tidak boleh kosong, jika dikosongkan di isi dengan "-"'));
		$this->form_validation->set_rules('nuptk', 'nuptk', 'required', array('required' => 'NUPTK tidak boleh kosong, jika dikosongkan di isi dengan "-"'));
		$this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama Pegawai tidak boleh kosong', 'is_unique' => 'Nama profil Jurusan sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('jk', 'jk', 'required', array('required' => 'Jenis kelamin belum di pilih'));
		$this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama Pegawai tidak boleh kosong', 'is_unique' => 'Nama profil Jurusan sudah ada di dalam data, mohon di cek kembali'));
		$this->form_validation->set_rules('pangkat', 'pangkat', 'htmlspecialchars', array('htmlspecialchars' => 'Masukkan data dengan benar'));
		$this->form_validation->set_rules('golongan', 'golongan', 'htmlspecialchars', array('htmlspecialchars' => 'Masukkan data dengan benar'));
		// $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Password tidak boleh kosong.!'));
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required', array('required' => 'Tanggal lahir belum di isi.!'));
		if ($this->form_validation->run() == TRUE) {
			$cekjkfoto = $this->input->post('jk', TRUE);
			if ($cekjkfoto == "L") {
				$jenisfoto = "L-default.jpg";
			} else {
				$jenisfoto = "P-default.jpg";
			}
			$this->Modeldata->update_data_pegawai('pegawai', $this->input->post('id_user', TRUE));
			$this->session->set_flashdata('pesan', 'Data pegawai berhasil di simpan.!');
			redirect('Pegawai/');
		} else {
			// Jika Gagal
			$data['data_pegawai']				= $this->Modeldata->get_data_pegawai()->result();
			$this->template->load('admin_template/halaman_master', 'data/edit_pegawai', $data);
		}
	}
	public function Edit_account($md5 = null, $id = null)
	{
		$konversi = md5($md5);
		if ($konversi != $id) {
			redirect('Pegawai/Detail/');
		} else {
			$data['data_pegawai']				= $this->Modeldata->get_data_pegawai_by_id($md5)->result();
			$data['data_role']					= $this->Modeldata->get_data_role()->result();
			$this->template->load('admin_template/halaman_master', 'data/edit_account', $data);
		}
	}
	public function Update_account()
	{
		// Pengkondisian jika passowrd baru tidak di isi
		// $new_password=$this->input->post('');
		if (empty($this->input->post('new_password', TRUE))) {
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('role', 'role', 'required');
			// pengkondisian jika validasi berhasil 
			if ($this->form_validation->run() == TRUE) {
				$this->Modeldata->update_data_account_no_new_password('pegawai', $this->input->post('id_user', TRUE));
				$this->session->set_flashdata('pesan', 'Data Account pegawai berhasil di perbaharui.');
				redirect('Pegawai/');
			} else {
				$this->session->set_flashdata('pesan', 'Data Account gagal di perbaharui');
				redirect('Pegawai/');
			}
		} else {
			// Pengkondisian jika password baru di isi
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('new_password', 'new_passwrod', 'required');
			$this->form_validation->set_rules('role', 'role', 'required');
			// Jika Validasi Form Update Account Berhasil
			if ($this->form_validation->run() == TRUE) {
				$this->Modeldata->update_data_account('pegawai', $this->input->post('id_user', TRUE));
				$this->session->set_flashdata('pesan', 'Data Account pegawai berhasil di perbaharui.');
				redirect('Pegawai/');
			} else {
				$this->session->set_flashdata('pesan', 'Data Account gagal di perbaharui');
				redirect('Pegawai/');
			}
		}
	}
	public function Update_foto($md5 = null, $id = null)
	{
	}
	// Management
	public function Role()
	{
		$data['data_role']				= $this->Modeldata->get_data_role()->result();
		$this->template->load('admin_template/halaman_master', 'management/role', $data);
	}
	public function Save_role()
	{
		$this->form_validation->set_rules('role', 'role', 'required');
		if ($this->form_validation->run() == TRUE) {
			// Jika berhasil simpan
			$this->Modeldata->simpan_role();
			$this->session->set_flashdata('pesan', 'Data Role berhasil di simpan');
			redirect('Role');
		} else {
			$this->session->set_flashdata('pesan', 'Data Role tidak berhasil di simpan, Mohon di cek kembali.');
			redirect('Role');
		}
	}
	public function Get_id_role_edit($id = null)
	{
		$query = $this->db->get_where('role', array('id_role' => $id))->row();
		echo json_encode($query);
	}
	public function Update_role()
	{
		$this->form_validation->set_rules('id_role', 'id_role', 'required');
		$this->form_validation->set_rules('role', 'role', 'required');
		// Validasi berhasil
		if ($this->form_validation->run() == TRUE) {
			$this->Modeldata->update_role();
			$this->session->set_flashdata('pesan', 'Data Role berhasil di perbaharui.');
			redirect('Role');
		} else {
			// Validasi gagal
			$this->session->set_flashdata('pesan', 'Data Role gagal di perbaharui');
			redirect('Role');
		}
	}
	// Galery
	public function Galery()
	{
		$data['data_galery']			= $this->Modeldata->Get_data_galery()->result();
		$data['data_kategori']			= $this->Modeldata->get_data_kategori()->result();
		$this->template->load('admin_template/halaman_master', 'galery/photos', $data);
	}
	public function Add_galery()
	{
		$data['data_kategori']			= $this->Modeldata->get_data_kategori()->result();
		$this->template->load('admin_template/halaman_master', 'galery/add_photos', $data);
	}
	public function Save_photos()
	{
		// Validasi Form
		$this->form_validation->set_rules('judul', 'judul', 'required', array('required' => 'Judul tidak boleh kosong.!'));
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'required', array('required' => 'Kategori belum di pilih.!'));
		$this->form_validation->set_rules('isi', 'isi', 'required', array('required' => 'Deskripsi tidak boleh kosong.!'));
		// $this->form_validation->set_rules('foto', 'foto', 'required', array('required' => 'Foto belum di pilih'));
		$this->form_validation->set_rules('status_terbit', 'status_terbit', 'required', array('required' => 'Status terbit belum di pilih'));
		if ($this->form_validation->run() == TRUE) {
			// Validasi Berhasil 
			$foto = $_FILES['foto']['name'];
			// Pengkondisian Foto 
			if (!empty($foto)) {
				$acak = rand(1000, 9999);
				$string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('judul', TRUE));
				$trim = trim($string);
				$pre_slug = strtolower(str_replace(" ", "-", $trim));
				$slug = $acak . '-photos-' . $pre_slug . '.html';
				$foto1 = $acak . '-images-' . md5($acak) . '.jpg';
				$config['upload_path']		= './uploads/galery';
				$config['allowed_types']	= 'jpg';
				$config['max_size']			= 1024;
				$config['file_name']		= $foto1;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('pesan', 'Data gambar tidak sesuai.!!, Mohon isikan foto yang baik.!');
					redirect('Photos/Add');
				} else {
					$this->Modeldata->Save_photos('galery', $foto1, $slug);
					$this->session->set_flashdata('pesan', 'Data Photos berhasil di simpan.!');
					redirect('Photos/Add');
				}
			} else {
				$data['data_kategori']			= $this->Modeldata->get_data_kategori()->result();
				$this->session->set_flashdata('pesan', 'Data foto harap di isi.!');
				$this->template->load('admin_template/halaman_master', 'galery/add_photos', $data);
			}
		} else {
			$data['data_kategori']			= $this->Modeldata->get_data_kategori()->result();
			$this->template->load('admin_template/halaman_master', 'galery/add_photos', $data);
		}
	}
}

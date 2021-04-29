<?php 
class Modeluser extends CI_Model{
    public function get_berita_beranda()
    {
        $this->db->select('id_berita,judul,tanggal,left(isi,400) as isi,status_terbit,jumlah_baca,slug,pembuat');
        $this->db->where('status_terbit','ya');
        $this->db->where('coursel','tidak');
        $this->db->limit('5');
        $this->db->order_by('tanggal','DESC');
        return $this->db->get('vw_berita_detail');
    }
    public function get_menu_profil()
    {
        $this->db->where('status_terbit','ya');
        return $this->db->get('profil');
    }
    public function get_menu_program_keahlian()
    {
        $this->db->where(array('status_terbit'=>'ya'));
        return $this->db->get('programkeahlian');
    }
    public function get_profile_by_slug($slug)
    {
        $this->db->where('slug',$slug);
        $this->db->where('status_terbit','ya');
        return $this->db->get('profil');
    }
    public function get_program_keahlian_by_slug($slug)
    {
        $this->db->where('slug',$slug);
        $this->db->where('status_terbit','ya');
        return $this->db->get('programkeahlian');
    }
    public function get_data_galery()
    {
        $this->db->where('jenis','gambar');
        $this->db->where('status_terbit','ya');
        return $this->db->get('galery');
    }
    public function get_data_video()
    {
        $this->db->where('jenis','video');
        $this->db->where('status_terbit','ya');
        return $this->db->get('galery');
    }
    public function get_data_staff()
    {
        $this->db->where('status_terbit','ya');
        $this->db->order_by('nama','ASC');
        return $this->db->get('pegawai');
    }
    public function get_berita_by_slug($slug)
    {
        $this->db->where('slug',$slug);
        $this->db->where('status_terbit','ya');
        return $this->db->get('vw_berita_detail');
    }
    public function get_kepala_sekolah()
    {
        $this->db->where('jabatan','Kepala Sekolah');
        $this->db->where('status_terbit','ya');
        return $this->db->get('pegawai');
    }
    public function get_kategori_by_slug($slug)
    {
        $this->db->where('slug_kategori',$slug);
        $this->db->where('kategori_status','ya');
        return $this->db->get('vw_berita_detail');
    }
}
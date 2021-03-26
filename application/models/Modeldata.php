<?php

class Modeldata extends CI_Model
{
    // Kategori
    public function get_data_kategori()
    {
        return $this->db->get('categor');
    }
    public function get_kategori_by_id($id)
    {
        return $this->db->get_where('categor', array('id_kategori' => $id));
    }
    public function simpan_kategori()
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_kategori', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $query = $this->db->get('categor');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka di tambahkan 1
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug1 = $acak . '-' . 'kategori-' . $pre_slug . '1.html';
            $isidata = array(
                'nama'          => $this->input->post('nama_kategori', TRUE),
                'deskripsi'     => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->insert('categor', $isidata);
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'kategori-' . $pre_slug . '.html';
            $isidata = array(
                'nama'          => $this->input->post('nama_kategori', TRUE),
                'deskripsi'     => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->insert('categor', $isidata);
        }
    }
    public function Update_kategori()
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_kategori', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $this->db->where('id_kategori', $this->input->post('id_kategori', TRUE));
        $query = $this->db->get('categor');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka slug tidak di update
            $isidata = array(
                'nama'          => $this->input->post('nama_kategori', TRUE),
                'deskripsi'     => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
            );
            $this->db->set($isidata);
            $this->db->update('categor');
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'kategori-' . $pre_slug . '.html';
            $isidata = array(
                'nama'          => $this->input->post('nama_kategori', TRUE),
                'deskripsi'     => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->set($isidata);
            $this->db->update('categor');
        }
    }
    public function Hapus_kategori()
    {
        $id = $this->input->post('id_kategori_hapus', TRUE);
        $this->db->where('id_kategori', $id);
        $this->db->delete('categor');
    }
    // Profil
    public function get_data_profil()
    {
        return $this->db->get('profil');
    }
    public function simpan_profil()
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_profil', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $query = $this->db->get('profil');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka di tambahkan 1
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_profil', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug1 = $acak . '-' . 'profil-' . $pre_slug . '1.html';
            $isidata = array(
                'nama'          => $this->input->post('nama_profil', TRUE),
                'isi'           => $this->input->post('isi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->insert('profil', $isidata);
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_profil', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'profil-' . $pre_slug . '.html';
            $isidata = array(
                'nama'          => $this->input->post('nama_profil', TRUE),
                'isi'           => $this->input->post('isi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->insert('profil', $isidata);
        }
    }
    public function Hapus_profil()
    {
        $id = $this->input->post('id_profil_hapus', TRUE);
        $this->db->where('id_profil', $id);
        $this->db->delete('profil');
    }
    public function get_profil_by_id($id)
    {
        return $this->db->get_where('profil', array('id_profil' => $id));
    }
    public function Update_profil()
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_profil', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $query = $this->db->get('profil');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka di tambahkan 1
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_profil', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug1 = $acak . '-' . 'profil-' . $pre_slug . '1.html';
            $isidata = array(
                'nama'          => $this->input->post('nama_profil', TRUE),
                'isi'           => $this->input->post('isi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->set( $isidata);
            $this->db->where('id_profil',$this->input->post('id_profil'));
            $this->db->update('profil');
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_profil', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'profil-' . $pre_slug . '.html';
            $isidata = array(
                'nama'          => $this->input->post('nama_profil', TRUE),
                'isi'           => $this->input->post('isi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->set($isidata);
            $this->db->where('id_profil',$this->input->post('id_profil'));
            $this->db->update('profil');
        }
    }
    // Profil Jurusan
    public function get_data_proju()
    {
        return $this->db->get('proju');
    }
}

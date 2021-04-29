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
    public function get_data_kategori_active()
    {
        return $this->db->get_where('categor', array('status_terbit' => 'ya'));
    }
    public function Nonaktif_kategori($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_kategori',$id);
        $this->db->update('categor');
    }
    public function Aktif_kategori($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_kategori',$id);
        $this->db->update('categor');
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
            $this->db->set($isidata);
            $this->db->where('id_profil', $this->input->post('id_profil'));
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
            $this->db->where('id_profil', $this->input->post('id_profil'));
            $this->db->update('profil');
        }
    }
    public function Nonaktif_profil($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_profil',$id);
        $this->db->update('profil');
    }
    public function Aktif_profil($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_profil',$id);
        $this->db->update('profil');
    }
    // Profil Jurusan
    public function get_data_proju()
    {
        return $this->db->get('proju');
    }
    public function simpan_proju()
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_proju', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $query = $this->db->get('proju');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka di tambahkan 1
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_proju', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug1 = $acak . '-' . 'proju-' . $pre_slug . '1.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_proju', TRUE),
                'deskripsi'           => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->insert('proju', $isidata);
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_proju', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'proju-' . $pre_slug . '.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_proju', TRUE),
                'deskripsi'           => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->insert('proju', $isidata);
        }
    }
    public function Hapus_proju()
    {
        $id = $this->input->post('id_proju_hapus', TRUE);
        $this->db->where('id_proju', $id);
        $this->db->delete('proju');
    }
    public function get_proju_by_id($id)
    {
        return $this->db->get_where('proju', array('id_proju' => $id));
    }
    public function Update_proju($id)
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_proju', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $query = $this->db->get('proju');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka di tambahkan 1
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_proju', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug1 = $acak . '-' . 'proju-' . $pre_slug . '1.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_proju', TRUE),
                'deskripsi'           => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->set($isidata);
            $this->db->where('id_proju', $id);
            $this->db->update('proju');
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_proju', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'proju-' . $pre_slug . '.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_proju', TRUE),
                'deskripsi'           => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->set($isidata);
            $this->db->where('id_proju', $id);
            $this->db->update('proju');
        }
    }
    public function Nonaktif_proju($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_proju',$id);
        $this->db->update('proju');
    }
    public function Aktif_proju($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_proju',$id);
        $this->db->update('proju');
    }
    // Program Keahlian
    public function get_data_program_keahlian()
    {
        return $this->db->get('programkeahlian');
    }
    public function simpan_program_keahlian()
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_program_keahlian', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $query = $this->db->get('programkeahlian');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka di tambahkan 1
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_program_keahlian', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug1 = $acak . '-' . 'program-keahlian-' . $pre_slug . '1.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_program_keahlian', TRUE),
                'deskripsi'           => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->insert('programkeahlian', $isidata);
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_program_keahlian', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'program_keahlian-' . $pre_slug . '.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_program_keahlian', TRUE),
                'deskripsi'           => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->insert('programkeahlian', $isidata);
        }
    }
    public function Hapus_program_keahlian()
    {
        $id = $this->input->post('id_program_hapus', TRUE);
        $this->db->where('id_program_keahlian', $id);
        $this->db->delete('programkeahlian');
    }
    public function get_data_program_keahlian_by_id($id)
    {
        return $this->db->get_where('programkeahlian', array('id_program_keahlian' => $id));
    }
    public function update_program_keahlian($id)
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_program_keahlian', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-' . $pre_slug . '.html';
        $this->db->where('slug', $slug);
        $query = $this->db->get('programkeahlian');
        // Pencarian slug 
        if ($query->num_rows() > 0) {
            // Jika slug ada yang sama maka di tambahkan 1
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_program_keahlian', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug1 = $acak . '-' . 'program-keahlian-' . $pre_slug . '1.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_program_keahlian', TRUE),
                'deskripsi'      => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->set($isidata);
            $this->db->where('id_program_keahlian', $id);
            $this->db->update('programkeahlian');
        } else {
            // Jika slug data tidak sama
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama_program_keahlian', TRUE));
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $acak . '-' . 'program_keahlian-' . $pre_slug . '.html';
            $isidata = array(
                'judul'          => $this->input->post('nama_program_keahlian', TRUE),
                'deskripsi'      => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug,
            );
            $this->db->set($isidata);
            $this->db->where('id_program_keahlian', $id);
            $this->db->update('programkeahlian');
        }
    }
    public function Nonaktif_program_keahlian($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_program_keahlian',$id);
        $this->db->update('programkeahlian');
    }
    public function Aktif_program_keahlian($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_program_keahlian',$id);
        $this->db->update('programkeahlian');
    }
    // Pengumuman
    public function get_data_pengumuman()
    {
        return $this->db->get('vw_pengumuman_detail');
    }
    public function Save_pengumuman()
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('judul', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-pengumuman-' . $pre_slug . '.html';
        $isidata = array(
            'judul'         => $this->input->post('judul', TRUE),
            'isi'           => $this->input->post('isi', TRUE),
            'slug'          => $slug,
            'id_user'       => $this->session->userdata('id_user'),
        );
        $this->db->insert('pengumuman', $isidata);
    }
    public function Hapus_pengumuman($tabel, $id_pengumuman)
    {
        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->delete('pengumuman');
    }
    public function get_data_pengumuman_by_id($id)
    {
        return $this->db->get_where('pengumuman', array('id_pengumuman' => $id));
    }
    public function Update_pengumuman($id)
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('judul', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-pengumuman-' . $pre_slug . '.html';
        $isidata = array(
            'judul'         => $this->input->post('judul', TRUE),
            'isi'           => $this->input->post('isi', TRUE),
            'slug'          => $slug,

        );
        $this->db->set($isidata);
        $this->db->where('id_pengumuman', $id);
        $this->db->update('pengumuman');
    }
    public function Nonaktif_pengumuman($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_pengumuman',$id);
        $this->db->update('pengumuman');
    }
    public function Aktif_pengumuman($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_pengumuman',$id);
        $this->db->update('pengumuman');
    }
    // Pegawai
    public function get_data_pegawai()
    {
        return $this->db->get('vw_role_pegawai');
    }
    public function get_data_pegawai_by_id($id)
    {
        return $this->db->get_where('vw_role_pegawai', array('id_user' => $id));
    }
    public function Simpan_pegawai_foto($tabel, $foto, $slug)
    {
        // $acak = rand(1000, 9999);
        // $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama', TRUE));
        // $trim = trim($string);
        // $pre_slug = strtolower(str_replace(" ", "-", $trim));
        // $slug = $acak . '-' . $pre_slug . '.html';
        // $this->db->where('slug', $slug);
        // $query = $this->db->get('proju');
        $cekpassword = $this->input->post('password', TRUE);
        if (empty($cekpassword)) {
            $isipassword = password_hash('123456', PASSWORD_DEFAULT);
        } else {
            $isipassword = password_hash($cekpassword, PASSWORD_DEFAULT);
        }
        $isidata = array(
            'nip'       => $this->input->post('nip', TRUE),
            'nuptk'     => $this->input->post('nuptk', TRUE),
            'nama'      => $this->input->post('nama', TRUE),
            'jk'        => $this->input->post('jk', TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
            'pend_terakhir' => $this->input->post('pend_terakhir', TRUE),
            'jabatan'       => $this->input->post('jabatan', TRUE),
            'pangkat'       => $this->input->post('pangkat', TRUE),
            'golongan'      => $this->input->post('golongan', TRUE),
            'slug'          => $slug,
            'foto'          => $foto,
            'alamat'        => $this->input->post('alamat', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'website'       => $this->input->post('website', TRUE),
            'bio'           => $this->input->post('bio', TRUE),
            'username'      => $this->input->post('username', TRUE),
            'pasword'       => $isipassword,
            'id_role'       => $this->input->post('role', TRUE),
        );
        // var_dump($isidata);
        $this->db->insert($tabel, $isidata);
        $id_user = $this->db->insert_id();
        $isidatalogin = array(
            'id_user'       => $id_user,
            // 'id_role'       => $this->input->post('role', TRUE),
        );
        $this->db->insert('login', $isidatalogin);
    }
    public function Simpan_pegawai_nofoto($tabel, $foto, $slug)
    {
        $cekpassword = $this->input->post('password', TRUE);
        if (empty($cekpassword)) {
            $isipassword = password_hash('123456', PASSWORD_DEFAULT);
        } else {
            $isipassword = password_hash($cekpassword, PASSWORD_DEFAULT);
        }
        $isidata = array(
            'nip'       => $this->input->post('nip', TRUE),
            'nuptk'     => $this->input->post('nuptk', TRUE),
            'nama'      => $this->input->post('nama', TRUE),
            'jk'        => $this->input->post('jk', TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
            'pend_terakhir' => $this->input->post('pend_terakhir', TRUE),
            'jabatan'       => $this->input->post('jabatan', TRUE),
            'pangkat'       => $this->input->post('pangkat', TRUE),
            'golongan'      => $this->input->post('golongan', TRUE),
            'slug'          => $slug,
            'foto'          => $foto,
            'alamat'        => $this->input->post('alamat', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'website'       => $this->input->post('website', TRUE),
            'bio'           => $this->input->post('bio', TRUE),
            'username'      => $this->input->post('username', TRUE),
            'pasword'       => $isipassword,
            'id_role'       => $this->input->post('role', TRUE),

        );
        $this->db->insert($tabel, $isidata);
        $id_user = $this->db->insert_id();
        $isidatalogin = array(
            'id_user'       => $id_user,
            // 'id_role'       => $this->input->post('role', TRUE),
        );
        $this->db->insert('login', $isidatalogin);
    }
    public function update_data_pegawai($tabel, $id_user)
    {
        $isidata = array(
            'nip'           => $this->input->post('nip', TRUE),
            'nuptk'         => $this->input->post('nuptk', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'jk'            => $this->input->post('jk', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'alamat'        => $this->input->post('alamat', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'website'       => $this->input->post('website', TRUE),
            'bio'           => $this->input->post('bio', TRUE),
            'tgl_lahir'     => $this->input->post('tgl_lahir', TRUE),
            'pend_terakhir' => $this->input->post('pend_terakhir', TRUE),
            'jabatan'       => $this->input->post('jabatan', TRUE),
            'pangkat'       => $this->input->post('pangkat', TRUE),
            'golongan'      => $this->input->post('golongan', TRUE),

        );
        $this->db->set($isidata);
        $this->db->where('id_user', $id_user);
        $this->db->update($tabel);
    }
    public function update_data_account($tabel, $id_user)
    {
        $hash_password = password_hash($this->input->post('new_password', TRUE), PASSWORD_DEFAULT);
        $isidata = array(
            'username'           => $this->input->post('username', TRUE),
            'pasword'            => $hash_password,
            'id_role'            => $this->input->post('role', TRUE),
        );
        $this->db->set($isidata);
        $this->db->where('id_user', $id_user);
        $this->db->update($tabel);
        // Update user login
        // $this->db->set->()
    }
    public function get_data_foto_by_id($id)
    {
        return $this->db->get_where('pegawai',array('id_user'=>$id));
    }
    public function update_foto_pegawai($tabel,$foto,$slug)
    {
        $this->db->set(array('foto'=>$foto,'slug'=>$slug));
        $this->db->where('id_user',$this->input->post('id_user',TRUE));
        $this->db->update($tabel);
    }
    public function update_data_account_no_new_password($tabel, $id_user)
    {
        $isidata = array(
            'username'           => $this->input->post('username', TRUE),
            'id_role'            => $this->input->post('role', TRUE),
        );
        $this->db->set($isidata);
        $this->db->where('id_user', $id_user);
        $this->db->update($tabel);
    }
    public function Aktifkan_pegawai($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_user',$id);
        $this->db->update('pegawai');
    }
    public function Nonaktifkan_pegawai($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_user',$id);
        $this->db->update('pegawai');
    }
    // Management
    public function get_data_role()
    {
        return $this->db->get('role');
    }
    public function get_data_role_by_id($id)
    {
        return $this->db->get_where('role',array('id_role'=>$id));
    }
    public function simpan_role()
    {
        $isidata = array(
            'nama_role'         => $this->input->post('role', TRUE),
        );
        $this->db->insert('role', $isidata);
    }
    public function update_role()
    {
        $id = $this->input->post('id_role', TRUE);
        $isidata = array(
            'nama_role'         => $this->input->post('role', TRUE),
        );
        $this->db->set($isidata);
        $this->db->where('id_role', $id);
        $this->db->update('role');
    }
    public function get_data_access_menu($id)
    {
       $this->db->where('id_role',$id);
       return $this->db->get('vw_role_access_menu');
    }
    public function Aktifkan_menu($id)
    {
        $this->db->set(array('status'=>'1'));
        $this->db->where('id_access_menu',$id);
        $this->db->update('user_access_menu');
    }
    public function Nonaktifkan_menu($id)
    {
        $this->db->set(array('status'=>'0'));
        $this->db->where('id_access_menu',$id);
        $this->db->update('user_access_menu');
    }
    public function Nonaktifkanmenu($id)
    {
        $this->db->set(array('status_active'=>'0'));
        $this->db->where('id_menu',$id);
        $this->db->update('user_menu');
    }
    // Berita
    public function get_data_berita()
    {
        return $this->db->get('vw_berita_detail');
    }
    public function Simpan_berita($tabel)
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('judul', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-berita-' . $pre_slug . '.html';
        $isidata = array(
            'judul'            => $this->input->post('judul', TRUE),
            'isi'            => $this->input->post('isi'),
            'id_kategori'    => $this->input->post('id_kategori', TRUE),
            'id_user'        => $this->session->userdata('id_user'),
            'slug'          => $slug
        );
        $this->db->insert($tabel, $isidata);
    }
    public function get_data_berita_by_id($id)
    {
        return $this->db->get_where('vw_berita_detail', array('id_berita' => $id));
    }
    public function aktifkan_berita($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->set(array('status_terbit' => 'ya'));
        $this->db->update('berita');
    }
    public function nonaktifkan_berita($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->set(array('status_terbit' => 'tidak'));
        $this->db->update('berita');
    }
    public function Update_berita($id)
    {
        $acak = rand(1000, 9999);
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('judul', TRUE));
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $acak . '-berita-' . $pre_slug . '.html';
        $isidata = array(
            'judul'            => $this->input->post('judul', TRUE),
            'isi'            => $this->input->post('isi'),
            'id_kategori'    => $this->input->post('id_kategori', TRUE),
            'id_user'        => $this->session->userdata('id_user'),
            'slug'          => $slug
        );
        $this->db->set($isidata);
        $this->db->where('id_berita', $id);
        $this->db->update('berita');
        // $this->db->insert($tabel,$isidata);
    }
    // Galery
    public function Get_data_galery()
    {
        return $this->db->get_where('vw_galery_detail',array('jenis'=>'gambar'));
    }
    public function Save_photos($tabel,$nama_foto,$slug)
    {
        $isidata=array(
            'judul'             =>$this->input->post('judul',TRUE),
            'deskripsi'         =>$this->input->post('isi',TRUE),
            'id_kategori'       =>$this->input->post('id_kategori',TRUE),
            'id_user'           =>$this->session->userdata('id_user'),
            'gambar'            =>$nama_foto,
            'jenis'             =>'gambar',
            'status_terbit'    =>$this->input->post('status_terbit',TRUE),
            'slug'              =>$slug,
        );
        $this->db->insert($tabel,$isidata);
    }
    public function Nonaktifkan_photos($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_galery',$id);
        $this->db->update('galery');
    }
    public function Aktifkan_photos($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_galery',$id);
        $this->db->update('galery');
    }
    public function Get_photos_by_id($id)
    {
        return $this->db->get_where('vw_galery_detail',array('id_galery'=>$id));
    }
    public function Update_photos($tabel,$foto,$slug)
    {
        $isidata=array(
            'judul'         =>$this->input->post('judul',TRUE),
            // 'tanggal'       =>date('now'),
            'deskripsi'     =>$this->input->post('isi',TRUE),
            'id_kategori'   =>$this->input->post('id_kategori',TRUE),
            'id_user'       =>$this->session->userdata('id_user'),
            'gambar'        =>$foto,
            'status_terbit' =>$this->input->post('status_terbit',TRUE),
            'slug'          =>$slug,
        );
        $this->db->set($isidata);
        $this->db->where('id_galery',$this->input->post('id_galery_edit',TRUE));
        $this->db->update($tabel);
    }
    public function Update_nophotos($tabel)
    {
        $isidata=array(
            'judul'         =>$this->input->post('judul',TRUE),
            'deskripsi'     =>$this->input->post('isi',TRUE),
            // 'tanggal'       =>date('now'),
            'id_kategori'   =>$this->input->post('id_kategori',TRUE),
            'id_user'       =>$this->session->userdata('id_user'),
            'status_terbit' =>$this->input->post('status_terbit',TRUE),
        );
        $this->db->set($isidata);
        $this->db->where('id_galery',$this->input->post('id_galery_edit',TRUE));
        $this->db->update($tabel);
    }
    // Videos
    public function get_data_videos()
    {
        return $this->db->get_where('vw_galery_detail',array('jenis'=>'video'));
    }
    public function Save_videos()
    {
        $isidata=array(
            'judul'             =>$this->input->post('judul',TRUE),
            'deskripsi'         =>$this->input->post('isi',TRUE),
            'id_kategori'       =>$this->input->post('id_kategori',TRUE),
            'id_user'           =>$this->session->userdata('id_user'),
            'jenis'             =>'video',
            'url'               =>$this->input->post('url',TRUE),
            'status_terbit'    =>$this->input->post('status_terbit',TRUE),
        );
        $this->db->insert('galery',$isidata);
    }
    public function Get_videos_by_id($id)
    {
        $this->db->where('id_galery',$id);
        return $this->db->get('vw_galery_detail');
    }
    public function Nonaktifkan_videos($id)
    {
        $this->db->set(array('status_terbit'=>'tidak'));
        $this->db->where('id_galery',$id);
        $this->db->update('galery');
    }
    public function Aktifkan_videos($id)
    {
        $this->db->set(array('status_terbit'=>'ya'));
        $this->db->where('id_galery',$id);
        $this->db->update('galery');
    }
    public function Update_videos()
    {
        $isidata=array(
            'judul'             =>$this->input->post('judul',TRUE),
            'deskripsi'         =>$this->input->post('isi',TRUE),
            'id_kategori'       =>$this->input->post('id_kategori',TRUE),
            'id_user'           =>$this->session->userdata('id_user'),
            'jenis'             =>'video',
            'url'               =>$this->input->post('url',TRUE),
            'status_terbit'    =>$this->input->post('status_terbit',TRUE),
        );
        $this->db->set($isidata);
        $this->db->where('id_galery',$this->input->post('id_galery'));
        $this->db->update('galery');
    }
}

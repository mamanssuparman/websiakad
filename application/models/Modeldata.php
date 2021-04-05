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
                'deskripsi'           => $this->input->post('deskripsi', TRUE),
                'status_terbit' => $this->input->post('status_terbit', TRUE),
                'slug'          => $slug1,
            );
            $this->db->set($isidata);
            $this->db->where('id_program_keahlian',$id);
            $this->db->update('programkeahlian');
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
            $this->db->set($isidata);
            $this->db->where('id_program_keahlian',$id);
            $this->db->update('programkeahlian');
        }
    }
    // Pegawai
    public function get_data_pegawai()
    {
        return $this->db->get('pegawai');
    }
    public function get_data_pegawai_by_id($id)
    {
        return $this->db->get_where('vw_role_pegawai',array('id_user'=>$id));
    }
    public function Simpan_pegawai_foto($tabel,$foto,$slug)
    {
        // $acak = rand(1000, 9999);
        // $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $this->input->post('nama', TRUE));
        // $trim = trim($string);
        // $pre_slug = strtolower(str_replace(" ", "-", $trim));
        // $slug = $acak . '-' . $pre_slug . '.html';
        // $this->db->where('slug', $slug);
        // $query = $this->db->get('proju');

        $isidata=array(
            'nip'       =>$this->input->post('nip',TRUE),
            'nuptk'     =>$this->input->post('nuptk',TRUE),
            'nama'      =>$this->input->post('nama',TRUE),
            'jk'        =>$this->input->post('jk',TRUE),
            'tgl_lahir' =>$this->input->post('tgl_lahir',TRUE),
            'pend_terakhir' =>$this->input->post('pend_terakhir',TRUE),
            'jabatan'       =>$this->input->post('jabatan',TRUE),
            'pangkat'       =>$this->input->post('pangkat',TRUE),
            'golongan'      =>$this->input->post('golongan',TRUE),
            'slug'          =>$slug,
            'foto'          =>$foto,
            'username'      =>$this->input->post('username',TRUE),
            'pasword'       =>$this->input->post('password',TRUE),
            'id_role'       =>$this->input->post('role',TRUE),
        );
		// var_dump($isidata);
        $this->db->insert($tabel,$isidata);
    }
    public function Simpan_pegawai_nofoto($tabel,$foto,$slug)
    {
        $cekpassword=$this->input->post('password',TRUE);
        if (empty($cekpassword)) {
            $isipassword=password_hash('123456',PASSWORD_DEFAULT);
        }else{
            $isipassword=password_hash($cekpassword,PASSWORD_DEFAULT);
        }
        $isidata=array(
            'nip'       =>$this->input->post('nip',TRUE),
            'nuptk'     =>$this->input->post('nuptk',TRUE),
            'nama'      =>$this->input->post('nama',TRUE),
            'jk'        =>$this->input->post('jk',TRUE),
            'tgl_lahir' =>$this->input->post('tgl_lahir',TRUE),
            'pend_terakhir' =>$this->input->post('pend_terakhir',TRUE),
            'jabatan'       =>$this->input->post('jabatan',TRUE),
            'pangkat'       =>$this->input->post('pangkat',TRUE),
            'golongan'      =>$this->input->post('golongan',TRUE),
            'slug'          =>$slug,
            'foto'          =>$foto,
            'username'      =>$this->input->post('username',TRUE),
            'pasword'       =>$isipassword,
            'id_role'       =>$this->input->post('role',TRUE),
        );
        $this->db->insert($tabel,$isidata);
    }
    // Management
    public function get_data_role()
    {
        return $this->db->get('role');
    }
    public function simpan_role()
    {
        $isidata=array(
            'nama_role'         =>$this->input->post('role',TRUE),
        );
        $this->db->insert('role',$isidata);
    }
    public function update_role()
    {
        $id=$this->input->post('id_role',TRUE);
        $isidata=array(
            'nama_role'         =>$this->input->post('role',TRUE),
        );
        $this->db->set($isidata);
        $this->db->where('id_role',$id);
        $this->db->update('role');
    }
}

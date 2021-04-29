<?php

function nama_pengguna()
{
    $ci = &get_instance();
    $id_user = $ci->session->userdata('id_user');
    $data_user = $ci->db->get_where('pegawai', array('id_user' => $id_user))->result();
    foreach ($data_user as $tampilkan_user) {
        echo "$tampilkan_user->nama";
    }
}
function nama_aplikasi()
{
    echo "SIAKAD SMK 3";
}
function foto_pengguna()
{
    $ci = &get_instance();
    $id_user = $ci->session->userdata('id_user');
    $data_user = $ci->db->get_where('pegawai', array('id_user' => $id_user))->result();
    foreach ($data_user as $tampilkan_foto) { ?>
        <img src="<?php echo base_url() ?>uploads/pegawai/<?php echo $tampilkan_foto->foto ?>" alt="..." class="img-circle profile_img">
    <?php }
}
function foto_pengguna_atas()
{
    $ci = &get_instance();
    $id_user = $ci->session->userdata('id_user');
    $data_user = $ci->db->get_where('pegawai', array('id_user' => $id_user))->result();
    foreach ($data_user as $tampilkan_foto) { ?>
        <img src="<?php echo base_url() ?>uploads/pegawai/<?php echo $tampilkan_foto->foto ?>" alt="...">
    <?php }
}
function copyright()
{
    echo "SIAKAD - SMK Negeri 3 Banjar, Template Support By Bootstrap Admin Template by Colorlib";
}
function kepala_sekolah()
{
    $ci = &get_instance();
    $ci->db->where('status_terbit', 'ya');
    $ci->db->where('jabatan', 'Kepala Sekolah');
    $ketemu = $ci->db->get('pegawai');
    if ($ketemu->row_array() > 0) {
        foreach ($ketemu->result() as $tampilkan) {
            echo "<img class='img-responsive' width='280' src=" . base_url() . "uploads/pegawai/" . $tampilkan->foto . " style='padding:10px;float:left;border-radius:8px;'> <br>";
            echo "<br>";
            echo "<b><center> $tampilkan->nama </center></b>";
        }
    } else {
        echo "Tidak Ketemu Kepsek";
    }
}
function kategori()
{
    $ci = &get_instance();
    $ci->db->select("DISTINCT(nama),id_kategori,slug_kategori");
    $datakategori = $ci->db->get("vw_berita_detail");
    foreach ($datakategori->result() as $tampilkan_kategori) { ?>
        <a href="<?php echo base_url() ?>kategori/<?php echo $tampilkan_kategori->slug_kategori ?>"><?= $tampilkan_kategori->nama ?></a> <br>
<?php }
}

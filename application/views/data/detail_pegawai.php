<?php
if ($this->session->flashdata('pesan')) {
    $this->load->view('admin_template/message');
}
?>
<!-- Form Input -->
<div class="row">
    <!-- form input mask -->
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail Profile Pegawai</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <?php foreach ($data_pegawai as $tampilkan_pegawai) { ?>
                                <img class="img-responsive avatar-view" src="<?php echo base_url() ?>uploads/pegawai/<?php echo $tampilkan_pegawai->foto ?>" alt="Avatar" title="Change the avatar" width="200">
                            <a href="<?php echo base_url() ?>Pegawai/Update_foto/<?php echo md5($tampilkan_pegawai->id_user) ?>/<?php echo $tampilkan_pegawai->id_user ?>"><button class="btn btn-info btn-block">Perbaharui Foto</button></a>
                        </div>
                    </div>

                    <h3>
                        <?php echo $tampilkan_pegawai->nama; ?>
                    </h3>
                    <ul class="list-unstyled user_data">

                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $tampilkan_pegawai->alamat; ?>
                        </li>
                        <li>
                            <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $tampilkan_pegawai->jabatan; ?>
                        </li>
                        <li>
                            <i class="fa fa-barcode user-profile-icon"></i> <?php echo $tampilkan_pegawai->nip; ?>
                        </li>
                        <li>
                            <i class="fa fa-barcode user-profile-icon"></i> <?php echo $tampilkan_pegawai->username; ?>
                        </li>
                        <li class="m-top-xs">
                        <li><i class="fa fa-user user-profile-icon"></i> <?php echo $tampilkan_pegawai->nama_role; ?></li>
                        </li>
                        <a href="<?php echo base_url() ?>Pegawai/Edit/<?php echo md5($tampilkan_pegawai->id_user) ?>/<?php echo $tampilkan_pegawai->id_user ?>"><button class="btn btn-info btn-block">Perbaharui</button></a>
                    </ul>
                    <br />
                    <!-- start skills -->
                    <!-- end of skills -->
                </div>
                <div class="col-md-9 col-sm-9 profile_left">
                    <table class="table table-hover">
                        <tr>
                            <td>
                                <h4>NIP</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->nip ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>NUPTK</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->nuptk ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Nama</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->nama ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Jenis Kelamin</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->jk ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>No Handphone</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->no_hp ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Email</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->email ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Tanggal Lahir</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->tgl_lahir ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Pendidikan Terakhir</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->pend_terakhir ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Pangkat</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->pangkat ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Golongan</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->golongan ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Username</h4>
                            </td>
                            <td>:</td>
                            <td>
                                <h4><?php echo $tampilkan_pegawai->username ?></h4>
                            </td>
                        </tr>
                    </table>
                    </h4>
                </div>
            <?php  } ?>
            </div>
        </div>
    </div>
</div>
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
                <h2>Detail Foto Pegawai</h2>
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
                    <!-- start skills -->
                    <!-- end of skills -->
                </div>
            <?php  } ?>
            </div>
        </div>
    </div>
</div>
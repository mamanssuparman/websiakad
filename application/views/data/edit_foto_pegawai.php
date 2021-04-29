<?php
if ($this->session->flashdata('pesan')) {
    $this->load->view('admin_template/message');
}
?>
<div class="row">
    <!-- form input mask -->
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $title_form ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="col-md-5 col-sm-12">
                    <?php
                    foreach ($foto_lama as $tampilkan_foto) { ?>
                        <img src="<?php echo base_url() ?>uploads/pegawai/<?php echo $tampilkan_foto->foto ?>" alt="..." class="img-circle profile_img">
                </div>
                <div class="col-md-7 col-sm-12">
                    <form action="<?php echo base_url() ?>Pegawai/Foto_update" method="POST" enctype="multipart/form-data">
                        Nama :
                        <input type="text" name="nama" class="form form-control" value="<?php echo $tampilkan_foto->nama ?>" disabled>
                        Ganti Foto :
                        <input type="hidden" name="id_user" class="form form-control" value="<?php echo $tampilkan_foto->id_user ?>">
                        <input type="file" class="form form-control" name="foto"> <br>
                        <button class="btn btn-info btn-md btn-block" type="submit">
                            <li class="fa fa-save"> Perbaharui Foto</li>
                        </button>
                        <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    </form>
                <?php    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
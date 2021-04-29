<?php
if ($this->session->flashdata('pesan')) {
    $this->load->view('admin_template/message');
}
?>
<div class="row">
    <?php
    foreach ($data_pegawai as $tampilkan_pegawai) {
    ?>
        <!-- form input mask -->
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $title_form ?></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Pegawai/Update_account" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $tampilkan_pegawai->id_user ?>">
                                <input type="text" class="form-control" name="username" value="<?php echo $tampilkan_pegawai->username ?>">
                                <span>
                                    <font color="red"><?php echo form_error('username') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Password Baru</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="password" class="form-control" name="new_password" value="">
                                <span>
                                    <font color="red"><?php echo form_error('new_password') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Akses</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="role" id="role" class="form-control">
                                    <?php
                                    foreach ($data_role as $tampilkan_role) {
                                        echo "<option value='$tampilkan_role->id_role'>$tampilkan_role->nama_role</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-info">
                                    <li class="fa fa-save"></li> Perbaharui
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <span>
                                    <i>
                                        Catatan : Mohon masukkan password baru dengan baik dan benar
                                    </i>
                                </span>
                            </div>
                        </div>
                        <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
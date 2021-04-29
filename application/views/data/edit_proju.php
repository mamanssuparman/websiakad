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
                <h2><?= $title_form ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                foreach ($data_proju_edit as $tampilkan_proju) {
                ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Proju/Update" method="POST">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Profil Jurusan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="hidden" class="form-control" name="id_proju" value="<?php echo $tampilkan_proju->id_proju ?>">
                                <input type="text" class="form-control" name="nama_proju" value="<?php echo $tampilkan_proju->judul ?>">
                                <span>
                                    <font color="red"><?php echo form_error('nama_proju') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Deskripsi</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="ckeditor">
                                <?php echo $tampilkan_proju->deskripsi ?>
                                </textarea>
                                <span>
                                    <font color="red"><?php echo form_error('deskripsi') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Terbit</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="status_terbit" class="form-control">
                                    <option value="ya">Terbitkan</option>
                                    <option value="tidak">Tidak Terbitkan</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <a href="javascript:window.history.go(-1)">
                                    <button type="button" class="btn btn-warning">
                                        <li class="fa fa-undo"></li> Kembali
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <li class="fa fa-save"></li> Perbaharui
                                </button>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
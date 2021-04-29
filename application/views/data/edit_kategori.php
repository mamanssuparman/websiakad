<?php
if ($this->session->flashdata('pesan')) {
    $this->load->view('admin_template/message');
}
?>
<!-- Form Edit -->
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
                <?php
                foreach ($data_kategori_edit as $tampilkan_kategori_edit) { ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Kategori/Update" method="POST">
                        <input type="hidden" name="id_kategori" value="<?php echo $tampilkan_kategori_edit->id_kategori ?>">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Kategori</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="nama_kategori" value="<?php echo $tampilkan_kategori_edit->nama ?>">
                                <span>
                                    <font color="red"><?php echo form_error('nama_kategori') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Deskripsi</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="deskripsi" value="<?php echo $tampilkan_kategori_edit->deskripsi ?>">
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
                            <a href="javascript:window.history.go(-1);"><button type="button" class="btn btn-warning"><li class="fa fa-undo"></li> Kembali</button></a>
                                <button type="submit" class="btn btn-success"><li class="fa fa-save"></li> Perbaharui</button>
                            </div>
                        </div>
                    </form>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
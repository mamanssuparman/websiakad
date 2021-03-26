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
                <h2>Form Update Data Profil</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php 
                    foreach ($data_profil_edit as $tampilkan_profil) {
                ?>
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Profil/Update" method="POST">
                    <div class="form-group row">
                        <input type="hidden" name="id_profil" value="<?php echo $tampilkan_profil->id_profil ?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Profil</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nama_profil" value="<?php echo $tampilkan_profil->nama ?>">
                            <span>
                                <font color="red"><?php echo form_error('nama_profil') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Deskripsi</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="isi" id="" cols="30" rows="10" class="ckeditor"><?php echo $tampilkan_profil->isi ?></textarea>
                            <span>
                                <font color="red"><?php echo form_error('isi') ?></font>
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
                    <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                            <button type="button" class="btn btn-success">
                                <li class="fa fa-undo"></li> Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <li class="fa fa-save"></li> Simpan
                            </button>
                        </div>
                    </div>
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                </form>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</div>
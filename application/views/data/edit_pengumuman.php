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
                <h2>Form Input Data Pengumuman</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                foreach ($data_pengumuman_edit as $tampilkan_pengumuman) { ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Pengumuman/Update" method="POST">
                        <div class="form-group row">
                            <input type="hidden" value="<?php echo $tampilkan_pengumuman->id_pengumuman ?>" name="id_pengumuman">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Judul</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="judul" value="<?php echo $tampilkan_pengumuman->judul ?>">
                                <span>
                                    <font color="red"><?php echo form_error('judul') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Isi</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea name="isi" id="" cols="30" rows="10" class="ckeditor"><?php echo $tampilkan_pengumuman->isi ?></textarea>
                                <span>
                                    <font color="red"><?php echo form_error('isi') ?></font>
                                </span>
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
                <?php    }
                ?>
            </div>
        </div>
    </div>
</div>
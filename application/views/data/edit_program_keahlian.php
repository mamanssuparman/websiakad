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
                <h2>Form Input Data Program Keahlian</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                foreach ($data_program_keahlian_edit as $tampilkan_program_keahlian) {
                ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Program-keahlian/Update" method="POST">

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Program Keahlian</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="id_program_keahlian" value="<?php echo $tampilkan_program_keahlian->id_program_keahlian ?>">
                                <input type="text" class="form-control" name="nama_program_keahlian" value="<?php echo $tampilkan_program_keahlian->judul ?>">
                                <span>
                                    <font color="red"><?php echo form_error('nama_program_keahlian') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Deskripsi</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="ckeditor">
                                <?php echo $tampilkan_program_keahlian->deskripsi ?>
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
                                <button type="button" class="btn btn-success">
                                    <li class="fa fa-undo"></li> Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <li class="fa fa-save"></li> Simpan
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
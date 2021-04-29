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
                <h2>Form Update Data Galery</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                foreach ($data_photos_edit as $tampilkan_galery) :
                ?>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Gambar Sebelumnya</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            | <img src="<?php echo base_url() ?>uploads/galery/<?php echo $tampilkan_galery->gambar ?>" alt="image" class="image view view-first" width="50%" height="auto">
                            <span>
                                <font color="red"><?php echo form_error('judul') ?></font>
                            </span>
                        </div>
                    </div>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Photos/Update" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Judul</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="hidden" name="id_galery_edit" id="" class="form control" value="<?php echo $tampilkan_galery->id_galery ?>">
                                <input type="text" class="form-control" name="judul" value="<?php echo $tampilkan_galery->judul ?>">
                                <span>
                                    <font color="red"><?php echo form_error('judul') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kategori</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="id_kategori" class="form-control">
                                    <?php foreach ($data_kategori as $tampilkan_kategori) : ?>
                                        <option value="<?php echo $tampilkan_kategori->id_kategori ?>"><?php echo $tampilkan_kategori->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Isi</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea name="isi" id="isi" cols="" rows="10" class="form form-control">
                                <?php echo $tampilkan_galery->deskripsi ?>
                            </textarea>
                                <span>
                                    <font color="red"><?php echo form_error('isi') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Foto</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="file" name="foto" class="form form-control">
                                <span>
                                    * Jika Image/ Foto masih sama kosongkan saja file yang akan di uploads.
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
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
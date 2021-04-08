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
                    <h2>Form Update Data Pegawai</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Pegawai/Update" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">NIP</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $tampilkan_pegawai->id_user ?>">
                                <input type="text" class="form-control" name="nip" value="<?php echo $tampilkan_pegawai->nip ?>">
                                <span>
                                    <font color="black"><i>Jika mau di kosongkan di isi "-"</i></font>
                                </span>
                                <span>
                                    <font color="red"><?php echo form_error('nip') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">NUPTK</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="nuptk" value="<?php echo $tampilkan_pegawai->nuptk ?>">
                                <span>
                                    <font color="black"><i>Jika mau di kosongkan di isi "-"</i></font>
                                </span>
                                <span>
                                    <font color="red"><?php echo form_error('nuptk') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Lengkap</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="nama" value="<?php echo $tampilkan_pegawai->nama ?>">
                                <span>
                                    <font color="red"><?php echo form_error('nama') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <?php
                                if ($tampilkan_pegawai->jk == "L") {
                                    echo "<input type='radio' name='jk' value='L' class='flat' checked> Laki-laki <input type='radio' name='jk' value='P' class='flat'> Perempuan";
                                } else {
                                    echo "<input type='radio' name='jk' value='L' class='flat' > Laki-laki <input type='radio' name='jk' value='P' class='flat' checked> Perempuan";
                                }
                                ?>
                                <span>
                                    <font color="red"><?php echo form_error('jk') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">No Handphone</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="no_hp" class="form-control" value="<?php echo $tampilkan_pegawai->no_hp ?>">
                                <span>
                                    <font color="red"><?php echo form_error('no_hp') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">E-mail</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="email" name="email" class="form-control" value="<?php echo $tampilkan_pegawai->email ?>">
                                <span>
                                    <font color="red"><?php echo form_error('email') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Website</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="website" class="form-control" value="<?php echo $tampilkan_pegawai->website ?>">
                                <span>
                                    <font color="red"><?php echo form_error('website') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea name="alamat" id="alamat" cols="" rows="3" class="form-control"><?php echo $tampilkan_pegawai->alamat ?></textarea>
                                <span>
                                    <font color="red"><?php echo form_error('alamat') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Bio</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea name="bio" id="bio" cols="" rows="3" class="form-control"><?php echo $tampilkan_pegawai->bio ?></textarea>
                                <span>
                                    <font color="red"><?php echo form_error('bio') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $tampilkan_pegawai->tgl_lahir ?>">
                                <span>
                                    <font color="red"><?php echo form_error('tgl_lahir') ?></font>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Pendidikan Terakhir</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="D1">D1</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Pangkat</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="pangkat" id="pangkat" class="form-control" value="<?php echo $tampilkan_pegawai->pangkat ?>">
                            </div>
                            <span>
                                <font color="red"><?php echo form_error('pangkat') ?></font>
                            </span>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Golongan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="golongan" id="golongan" class="form-control" value="<?php echo $tampilkan_pegawai->golongan ?>">
                            </div>
                            <span>
                                <font color="red"><?php echo form_error('golongan') ?></font>
                            </span>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="jabatan" id="jabatan" class="form-control">
                                    <option value="Guru">Guru</option>
                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                    <option value="Staff TU">Staff TU</option>
                                    <option value="Penjaga">Penjaga</option>
                                    <option value="Tool Man">Tool Man</option>
                                </select>
                                <span>
                                    <font color="red"><?php echo form_error('jabatan') ?></font>
                                </span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <button type="button" class="btn btn-success">
                                    <li class="fa fa-undo"></li> Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <li class="fa fa-save"></li> Perbaharui
                                </button>
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
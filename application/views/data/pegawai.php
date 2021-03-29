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
                <h2>Form Input Data Pegawai</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Pegawai/Save" method="POST">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">NIP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nip" value="<?php echo set_value('nip') ?>">
                            <span>
                                <font color="red"><?php echo form_error('nip') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">NUPTK</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nuptk" value="<?php echo set_value('nuptk') ?>">
                            <span>
                                <font color="red"><?php echo form_error('nuptk') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Lengkap</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>">
                            <span>
                                <font color="red"><?php echo form_error('nama') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="radio" name="jk" value="L" class="flat"> Laki-laki <input type="radio" name="jk" value="L" class="flat"> Perempuan
                            <span>
                                <font color="red"><?php echo form_error('jk') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pendidikan Terakhir</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="date" class="form-control" name="pend_terakhir" value="<?php echo set_value('pend_terakhir') ?>">
                            <span>
                                <font color="red"><?php echo form_error('pend_terakhir') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="date" class="form-control" name="tgl_lahir" value="<?php echo set_value('tgl_lahir') ?>">
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
                            <input type="text" name="pangkat" id="pangkat" class="form-control" value="<?php echo set_value('pangkat') ?>">
                        </div>
                        <span>
                            <font color="red"><?php echo form_error('pangkat') ?></font>
                        </span>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Golongan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="golongan" id="golongan" class="form-control" value="<?php echo set_value('golongan') ?>">
                        </div>
                        <span>
                            <font color="red"><?php echo form_error('golongan') ?></font>
                        </span>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username') ?>">
                        </div>
                        <span>
                            <font color="red"><?php echo form_error('username') ?></font>
                        </span>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password') ?>">
                        </div>
                        <!--  -->
                        <span>
                            <font color="red"></font>
                        </span>
                        <span>
                            <font color="red"><?php echo form_error('password') ?></font>
                        </span>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="file" name="foto" id="foto" class="form-control">
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
            </div>
        </div>
    </div>
</div>
<!-- Data Tables -->
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Button Example <small>Users</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID Profil</th>
                                        <th>Nama</th>
                                        <th>Status Terbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Java Script -->
<script>
    function hapus(id) {
        $('#form_hapus')[0].reset();
        $.ajax({
            url: "<?php echo base_url('Profil/Get_id_profil_hapus') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_profil_hapus"]').val(data.id_profil);
                $('#modal-default').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal ambil ajax');
            }
        });
    }
</script>
<!-- Modal Hapus -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <li class="fa fa-warning"></li> Pesan.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?php echo base_url() ?>Profil/hapus" method="POST" id="form_hapus">
                <div class="modal-body">

                    <input type="hidden" name="id_profil_hapus" value="" id="id_profil_hapus">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    <p>Apakah anda yakin akan menghapus data tersebut &hellip;?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">
                        <li class="fa fa-undo"></li> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <li class="fa fa-check"></li> Ya
                    </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
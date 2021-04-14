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
                <h2>Form Input Data Berita</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Berita/Save" method="POST">

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Judul</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="judul" value="<?php echo set_value('judul') ?>">
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
                            <textarea name="isi" id="isi" cols="30" rows="50" class="ckeditor">
                                <?php echo set_value('isi') ?>
                            </textarea>
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
                                        <th>ID Berita</th>
                                        <th>Judul</th>
                                        <th>Pembuat</th>
                                        <th>Kategori</th>
                                        <th>Status Terbit</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_berita as $tampilkan_berita) : ?>
                                        <tr>
                                            <td><?php echo $tampilkan_berita->id_berita ?></td>
                                            <td><?php echo $tampilkan_berita->judul ?></td>
                                            <td><?php echo $tampilkan_berita->pembuat ?></td>
                                            <td><?php echo $tampilkan_berita->nama ?></td>
                                            <td>
                                                <?php
                                                if ($tampilkan_berita->status_terbit == 'ya') {
                                                    echo "<span class='badge badge-primary'>YA</span>";
                                                } else {
                                                    echo "<span class='badge badge-warning'>TIDAK</span>";
                                                }
                                                echo "</td>";
                                                ?>
                                            </td>
                                            <td><a href="<?php echo base_url() ?>Berita/Detail/<?php echo md5($tampilkan_berita->id_berita) ?>/<?php echo $tampilkan_berita->id_berita ?>"><button class="btn btn-warning btn-sm" title="Detail"><li class="fa fa-bars"></li></button></a> |  
                                                <?php 
                                                    // Pengkondisian tombol aktiv dan tidak aktiv
                                                    if ($tampilkan_berita->status_terbit=='ya') {
                                                        echo "<button class='btn btn-danger btn-sm' title='Tidak Terbitkan' onClick='nonaktifkan($tampilkan_berita->id_berita)'><li class='fa fa-power-off'></li></button>";
                                                    }else{
                                                        echo "<button class='btn btn-success btn-sm' title='Terbitkan' onClick='aktifkan($tampilkan_berita->id_berita)'><li class='fa fa-power-off'></li></button>";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach
                                    ?>
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
            url: "<?php echo base_url('Proju/Get_id_proju_hapus') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_proju_hapus"]').val(data.id_proju);
                $('#modal-default').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal ambil ajax');
            }
        });
    }
    function aktifkan(id){
        $('#form_aktifkan')[0].reset();
        $.ajax({
            url:"<?php echo base_url('Berita/Get_id_berita_status') ?>/"+id,
            type: "GET",
            dataType: "JSON",
            success : function(data){
                $('[name="id_berita_aktif"]').val(data.id_berita);
                $('#modal-aktifkan').modal('show');
            },
            error:function(jqXHR,textStatus,errorThrown){
                alert('Gagal ambil ajax');
            }
        });
    }
    function nonaktifkan(id){
        $('#form_nonaktifkan')[0].reset();
        $.ajax({
            url:"<?php echo base_url('Berita/Get_id_berita_status') ?>/"+id,
            type: "GET",
            dataType: "JSON",
            success : function(data){
                $('[name="id_berita_nonaktif"]').val(data.id_berita);
                $('#modal-nonaktifkan').modal('show');
            },
            error:function(jqXHR,textStatus,errorThrown){
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
            <form action="<?php echo base_url() ?>Proju/Hapus" method="POST" id="form_hapus">
                <div class="modal-body">
                    <input type="hidden" name="id_proju_hapus" value="" id="id_proju_hapus">
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
<!-- Modal Pesan Aktifkan -->
<div class="modal fade" id="modal-aktifkan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <li class="fa fa-warning"></li> Pesan.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?php echo base_url() ?>Berita/Aktifkan" method="POST" id="form_aktifkan">
                <div class="modal-body">
                    <input type="hidden" name="id_berita_aktif" value="" id="id_berita_aktif">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    <p>Apakah anda yakin akan menghapus mengaktifkan data tersebut &hellip;?</p>
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
<!-- Modal Pesan nonaktifkan -->
<div class="modal fade" id="modal-nonaktifkan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <li class="fa fa-warning"></li> Pesan.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?php echo base_url() ?>Berita/nonaktifkan" method="POST" id="form_nonaktifkan">
                <div class="modal-body">
                    <input type="hidden" name="id_berita_nonaktif" value="" id="id_berita_nonaktif">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    <p>Apakah anda yakin akan menghapus menonaktifkan data tersebut &hellip;?</p>
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
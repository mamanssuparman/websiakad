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
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Pengumuman/Save" method="POST">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Isi</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="isi" id="" cols="30" rows="10" class="ckeditor"><?php set_value('isi') ?></textarea>
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
                                        <th>ID Pengumuman</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Status</th>
                                        <th>Pembuat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_pengumuman as $tampilkan) {
                                        echo "<tr>";
                                        echo "<td>$tampilkan->id_pengumuman</td>";
                                        echo "<td>$tampilkan->judul</td>";
                                        echo "<td>$tampilkan->isi</td>";
                                        echo "<td>";
                                        // Pengkondisian Badge Status Terbit
                                        if ($tampilkan->status_terbit == 'ya') {
                                            echo "<span class='badge badge-primary'>YA</span>";
                                        } else {
                                            echo "<span class='badge badge-warning'>TIDAK</span>";
                                        }
                                        echo "</td>";
                                        echo "<td>$tampilkan->pembuat</td>";
                                        echo "<td><a href='Pengumuman/Edit/$tampilkan->id_pengumuman'><button class='btn btn-primary btn-sm' title='Edit'><li class='fa fa-edit'></li></button></a> <button class='btn btn-danger btn-sm' title='Hapus' onClick='hapus($tampilkan->id_pengumuman)'><li class='fa fa-trash'></li></button></td>";

                                        echo "</tr>";
                                    }
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
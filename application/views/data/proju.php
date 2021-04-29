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
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Proju/Save" method="POST">

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Profil Jurusan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nama_proju" value="<?php echo set_value('nama_proju') ?>">
                            <span>
                                <font color="red"><?php echo form_error('nama_proju') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Deskripsi</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="ckeditor">
                                <?php echo set_value('deskripsi') ?>
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
                            <button type="submit" class="btn btn-success">
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
                <h2><?= $title_data ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID Proju</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Status Terbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_proju as $tampilkan_proju) {
                                        echo "<tr>";
                                        echo "<td>$tampilkan_proju->id_proju</td>";
                                        echo "<td>$tampilkan_proju->judul</td>";
                                        echo "<td>$tampilkan_proju->deskripsi</td>";
                                        echo "<td>";
                                        // Pengkondisian Badge Status Terbit
                                        if ($tampilkan_proju->status_terbit == 'ya') {
                                            echo "<input type='checkbox' class='js-switch' checked onChange='Nonaktif($tampilkan_proju->id_proju)'/>";
                                        } else {
                                            echo "<input type='checkbox' class='js-switch' onChange='Aktif($tampilkan_proju->id_proju)'/>";
                                        }
                                        echo "</td>";
                                        echo "<td><a href=".base_url()."Proju/Edit/".md5($tampilkan_proju->id_proju)."/".$tampilkan_proju->id_proju."><button class='btn btn-warning btn-sm' title='Edit'><li class='fa fa-edit'></li></button></a> <button class='btn btn-danger btn-sm' title='Hapus' onClick='hapus($tampilkan_proju->id_proju)'><li class='fa fa-trash'></li></button></td>";
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

    function Nonaktif(id) {
        $.ajax({
            url: "<?php echo base_url('Proju/Nonaktif') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Aksi');
            }
        });
    }

    function Aktif(id) {
        $.ajax({
            url: "<?php echo base_url('Proju/Aktif') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Aksi');
            }
        });
    }
</script>
<!-- Modal -->
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
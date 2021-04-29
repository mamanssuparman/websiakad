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
                <h2><?php echo $title_form ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Kategori/Save" method="POST">

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Kategori</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nama_kategori" value="<?php echo set_value('nama_kategori') ?>">
                            <span>
                                <font color="red"><?php echo form_error('nama_kategori') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Deskripsi</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi') ?>">
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
                <h2><?php echo $title_data ?></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID Categori</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Status Terbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_kategori as $tampilkan_kategori) {
                                        echo "<tr>";
                                        echo "<td>$tampilkan_kategori->id_kategori</td>";
                                        echo "<td>$tampilkan_kategori->nama</td>";
                                        echo "<td>$tampilkan_kategori->deskripsi</td>";
                                        echo "<td align='center'>";
                                        // Pengkondisian Badge Status Terbit
                                        if ($tampilkan_kategori->status_terbit == 'ya') {
                                            echo "<input type='checkbox' class='js-switch' checked onChange='Nonaktif($tampilkan_kategori->id_kategori)'/>";
                                        } else {
                                            echo "<input type='checkbox' class='js-switch' onChange='Aktif($tampilkan_kategori->id_kategori)'/>";
                                        }
                                        echo "</td>";
                                        echo "<td align='center'><a href=".base_url()."Kategori/Edit/".$tampilkan_kategori->id_kategori."><button class='btn btn-info btn-sm' title='Edit'><li class='fa fa-edit'></li></button></a> <button class='btn btn-danger btn-sm' title='Hapus' onClick='hapus($tampilkan_kategori->id_kategori)'><li class='fa fa-trash'></li></button></td>";
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
            url: "<?php echo base_url('Kategori/Get_id_kategori_hapus') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_kategori_hapus"]').val(data.id_kategori);
                $('#modal-default').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal ambil ajax');
            }
        });
    }

    function Nonaktif(id) {
        $.ajax({
            url: "<?php echo base_url('Kategori/Nonaktif') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Eksekusi');
            }
        });
    }
    function Aktif(id){
        $.ajax({
            url: "<?php echo base_url('Kategori/Aktif') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Eksekusi');
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
            <form action="<?php echo base_url() ?>Kategori/hapus" method="POST" id="form_hapus">
                <div class="modal-body">

                    <input type="hidden" name="id_kategori_hapus" value="" id="id_kategori_hapus">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    <p>Apakah anda yakin akan menghapus data tersebut &hellip;?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">
                        <li class="fa fa-undo"></li> Batal
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">
                        <li class="fa fa-check"></li> Ya
                    </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
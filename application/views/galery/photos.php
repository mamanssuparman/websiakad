<?php
if ($this->session->flashdata('pesan')) {
    $this->load->view('admin_template/message');
}
?>
<!-- Data Galery -->
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Button Example <small>Users</small></h2>
                <a href="<?php echo base_url() ?>Photos/Add"><button class="btn btn-dark btn-sm pull-right">
                        <li class="fa fa-plus"></li> Add Galery
                    </button></a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID Galery</th>
                                        <th>Photos</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Pembuat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_galery as $tampilkan_galery) :
                                    ?>
                                        <tr>
                                            <td><?php echo $tampilkan_galery->id_galery ?></td>
                                            <td>
                                                <div class="thumbnail">
                                                    <div class="image view view-first">
                                                        <img style="width: 50%; display: block; height:auto;" src="<?php echo base_url() ?>uploads/galery/<?php echo $tampilkan_galery->gambar ?>" alt="image" />
                                                        <div class="mask">
                                                            <p>Your Text</p>
                                                            <div class="tools tools-bottom">
                                                                <a href="#"><i class="fa fa-link"></i></a>
                                                                <a href="#"><i class="fa fa-pencil"></i></a>
                                                                <a href="#"><i class="fa fa-times"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <p align="center"><b><?php echo $tampilkan_galery->judul ?></b></p>
                                                        <center>
                                                            <p align="center">
                                                                <li class="fa fa-calendar"></li> | <?php echo $tampilkan_galery->tanggal ?>
                                                            </p>
                                                        </center>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $tampilkan_galery->nama_kategori ?></td>
                                            <td><?php echo $tampilkan_galery->status_terbit ?></td>
                                            <td><?php echo $tampilkan_galery->pembuat ?></td>
                                            <td>
                                                <?php
                                                if ($tampilkan_galery->status_terbit == 'ya') {
                                                    echo "<button class='btn btn-danger btn-sm' title='Tidak terbitkan' onClick='Off_kan($tampilkan_galery->id_galery)'><li class='fa fa-power-off'></li></button>";
                                                } else {
                                                    echo "<button class='btn btn-success btn-sm' title='Terbitkan' onClick='On_kan($tampilkan_galery->id_galery)'><li class='fa fa-power-off'></li></button>";
                                                }
                                                echo " | ";
                                                echo " <a href=".base_url()."Photos/Edit/".md5($tampilkan_galery->id_galery)."/".$tampilkan_galery->id_galery." > <button class='btn btn-primary btn-sm' title='Edit'><li class='fa fa-edit'></li></button></a>";
                                                echo " | ";
                                                echo "<button class='btn btn-warning btn-sm' title='Detail'><li class='fa fa-bars'></li></button>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
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
<!-- JS -->
<script>
    function Off_kan(id) {
        $('#form_nonaktif')[0].reset();
        $.ajax({
            url: "<?php echo base_url('Photos/Get_photos_by_id_row') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_galery_non_aktif"]').val(data.id_galery);
                $('#modal-nonaktif').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal ambil ajax');
            }
        });
    }
    function On_kan(id) {
        $('#form_aktif')[0].reset();
        $.ajax({
            url: "<?php echo base_url('Photos/Get_photos_by_id_row') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_galery_aktif"]').val(data.id_galery);
                $('#modal-aktif').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal ambil ajax');
            }
        });
    }
</script>
<!-- Modal -->
<div class="modal fade" id="modal-aktif">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <li class="fa fa-warning"></li> Pesan.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?php echo base_url() ?>Photos/Aktifkan" method="POST" id="form_aktif">
                <div class="modal-body">

                    <input type="hidden" name="id_galery_aktif" value="" id="id_galery_aktif">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    <p>Apakah anda yakin akan mengaktifkan data tersebut &hellip;?</p>
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

<div class="modal fade" id="modal-nonaktif">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <li class="fa fa-warning"></li> Pesan.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?php echo base_url() ?>Photos/Nonaktifkan" method="POST" id="form_nonaktif">
                <div class="modal-body">

                    <input type="hidden" name="id_galery_non_aktif" value="" id="id_galery_non_aktif">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                    <p>Apakah anda yakin akan Me Non Aktifkan Foto tersebut &hellip;?</p>
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
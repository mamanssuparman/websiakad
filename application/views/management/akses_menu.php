<?php
if ($this->session->flashdata('pesan')) {
    $this->load->view('admin_template/message');
}
?>
<!-- Data Tables -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <button class="btn-primary btn-sm" onclick="add()">
            <li class="fa fa-plus"></li> Tambah Menu Untuk :
        </button>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>  Role : 
                <?php 
                    foreach ($data_role as $tampilkan_role) {
                        echo $tampilkan_role->nama_role;
                    }
                ?>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data_role_access as $tampilkan_access) :
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $tampilkan_access->menu ?></td>
                                            <td>
                                            <!-- Switch -->
                                                <?php
                                                if ($tampilkan_access->status == 0) {
                                                    echo "<input type='checkbox' class='js-switch' onChange='Aktif($tampilkan_access->id_access_menu)'/>";
                                                } else {
                                                    echo "<input type='checkbox' class='js-switch' checked onChange='Nonaktif($tampilkan_access->id_access_menu)'/>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
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
<!-- Java Script -->
<script>
    function Aktif(id) {
        $.ajax({
            url: "<?php echo base_url('Role/Aktifkan') ?>/" + id,
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

    function Nonaktif(id) {
        $.ajax({
            url: "<?php echo base_url('Role/Nonaktif') ?>/" + id,
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

    function add() {
        $('#form_tambah')[0].reset();
        $('#modal-add').modal('show');
    }
</script>
<!-- Modal Edit-->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <li class="fa fa-warning"></li> Update Role
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url() ?>Role/Update" method="POST" id="form_edit">
                <div class="modal-body">
                    <input type="hidden" name="id_role" id="id_role" value="">
                    <label>Nama Role</label><input type="text" name="role" class="form-control" id="role">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">
                        <li class="fa fa-undo"></li> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <li class="fa fa-check"></li> Perbaharui
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Add -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <li class="fa fa-warning"></li> Add Role
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url() ?>Role/Simpan" method="POST" id="form_tambah">
                <div class="modal-body">
                    <label>Nama Role</label><input type="text" name="role" class="form-control" id="role">
                    <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
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
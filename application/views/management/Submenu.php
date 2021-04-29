<?php
if ($this->session->flashdata('pesan')) {
    $this->load->view('admin_template/message');
}
?>
<!-- Data Tables -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <button class="btn-primary btn-sm" onclick="add()">
            <li class="fa fa-plus"></li> Tambah Sub Menu
        </button>
    </div>
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
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Menu</th>
                                        <th>Sub Menu</th>
                                        <th>Status Active</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_sub_menu as $tampilkan_submenu) :
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $tampilkan_submenu->nama_role ?></td>
                                            <td><?php echo $tampilkan_submenu->menu ?></td>
                                            <td><?php echo $tampilkan_submenu->judul ?></td>
                                            <td><?php echo $tampilkan_submenu->status_active_sub_menu ?></td>
                                            <td>button</td>

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
<!-- Java Script -->
<script>
    function Edit(id) {
        $('#form_edit')[0].reset();
        $.ajax({
            url: "<?php echo base_url('Role/Get_id_role_edit') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_role"]').val(data.id_role);
                $('[name="role"]').val(data.nama_role);
                $('#modal-default').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Ambil Ajax');
            }
        });
    }

    function add() {
        $('#form_tambah')[0].reset();
        $('#modal-add').modal('show');
    }

    function Aktif(id) {
        $.ajax({
            url: "<?php echo base_url('Menu/Aktifkan') ?>/" + id,
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
            url: "<?php echo base_url('Menu/Nonaktifkan_menu') ?>/" + id,
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
                    <li class="fa fa-warning"></li> Add Sub Menu
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url() ?>Submenu/Simpan" method="POST" id="form_tambah">
                <div class="modal-body">
                    <label>Role</label>
                    <select name="role" id="role" class="form form-control">
                        <?php
                        foreach ($data_role as $tampilkan_role) {
                            echo "<option value='$tampilkan_role->id_role'>$tampilkan_role->nama_role</option>";
                        }
                        ?>
                    </select>
                    <label>Menu</label>
                    <select name="menu" id="menu" class="form form-control">
                        <?php
                        foreach ($data_menu as $tampilkan_menu) {
                            echo "<option value='$tampilkan_menu->id_menu'>$tampilkan_menu->menu</option>";
                        }
                        ?>
                    </select>
                    <label>Sub Menu</label>
                    <select name="sub_menu" id="sub_menu" class="form form-control">
                        <?php
                        foreach ($data_sub_menu_1 as $tampilkan_sub_menu) {
                            echo "<option value='$tampilkan_sub_menu->id_sub_menu'>$tampilkan_sub_menu->judul</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
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
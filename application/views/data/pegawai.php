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
                <h2><?php echo $title_form ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Pegawai/Save" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">NIP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nip" value="<?php echo set_value('nip') ?>">
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
                            <input type="text" class="form-control" name="nuptk" value="<?php echo set_value('nuptk') ?>">
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
                            <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>">
                            <span>
                                <font color="red"><?php echo form_error('nama') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="radio" name="jk" value="L" class="flat"> Laki-laki <input type="radio" name="jk" value="P" class="flat"> Perempuan
                            <span>
                                <font color="red"><?php echo form_error('jk') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No Handphone</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="no_hp" class="form-control">
                            <span>
                                <font color="red"><?php echo form_error('no_hp') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">E-mail</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="email" name="email" class="form-control">
                            <span>
                                <font color="red"><?php echo form_error('email') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Website</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="website" class="form-control">
                            <span>
                                <font color="red"><?php echo form_error('website') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="alamat" id="alamat" cols="" rows="3" class="form-control"></textarea>
                            <span>
                                <font color="red"><?php echo form_error('alamat') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bio</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="bio" id="bio" cols="" rows="3" class="form-control"></textarea>
                            <span>
                                <font color="red"><?php echo form_error('bio') ?></font>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username') ?>">
                            <span>
                                <font color="red"><?php echo form_error('username') ?></font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password') ?>">
                            <span>
                                <font color="black"><i>Kosongkan jika password di isi dengan default</i></font>
                            </span>
                            <span>
                                <font color="red"><?php echo form_error('password') ?></font>
                            </span>
                        </div>
                        <!--  -->
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Akses</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <select name="role" id="role" class="form-control">
                                <?php
                                foreach ($data_role as $tampilkan_role) {
                                    echo "<option value='$tampilkan_role->id_role'>$tampilkan_role->nama_role</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-dark">
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
                <h2><?php echo $title_data ?></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>NUTPK</th>
                                        <th>NAMA</th>
                                        <th>FOTO</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>STATUS TERBIT</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_pegawai as $tampilkan_pegawai) {
                                        echo "<tr>";
                                        echo "<td>$tampilkan_pegawai->nip</td>";
                                        echo "<td>$tampilkan_pegawai->nuptk</td>";
                                        echo "<td>$tampilkan_pegawai->nama</td>";
                                        echo "<td>"; ?>
                                        <img class="img-responsive avatar-view" width="80" src="<?php echo base_url() ?>uploads/pegawai/<?php echo $tampilkan_pegawai->foto ?>" alt="Avatar" title="Change the avatar">
                                        <?php echo "</td>";
                                        echo "<td>$tampilkan_pegawai->tgl_lahir</td>";
                                        echo "<td align='center'>";
                                        if ($tampilkan_pegawai->status_terbit == 'tidak') {
                                            echo "<input type='checkbox' class='js-switch' onChange='Aktif($tampilkan_pegawai->id_user)'/>";
                                        } else {
                                            echo "<input type='checkbox' class='js-switch' checked onChange='Nonaktif($tampilkan_pegawai->id_user)'/>";
                                        }
                                        echo "</td>"; ?>
                                        <td align="center">
                                            <a href="<?php echo base_url() ?>Pegawai/Detail/<?php echo md5($tampilkan_pegawai->id_user) ?>/<?php echo $tampilkan_pegawai->id_user ?>">
                                                <button class='btn btn-dark btn-sm' title='Detail'>
                                                    <li class='fa fa-list'></li>
                                                </button>
                                            </a>
                                        </td>
                                    <?php echo "</tr>";
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
    function Aktif(id) {
        $.ajax({
            url: "<?php echo base_url('Pegawai/Aktifkan') ?>/" + id,
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
            url: "<?php echo base_url('Pegawai/Nonaktif') ?>/" + id,
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
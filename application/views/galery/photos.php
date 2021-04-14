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
                <a href="<?php echo base_url() ?>Photos/Add"><button class="btn btn-dark btn-sm pull-right"><li class="fa fa-plus"></li>  Add Galery</button></a>
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
                                                        <center><p align="center"><li class="fa fa-calendar"></li> | <?php echo $tampilkan_galery->tanggal ?></p></center>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $tampilkan_galery->nama_kategori ?></td>
                                            <td><?php echo $tampilkan_galery->status_terbit ?></td>
                                            <td><?php echo $tampilkan_galery->pembuat ?></td>
                                            <td>
                                                <?php 
                                                    if ($tampilkan_galery->status_terbit=='ya') {
                                                        echo "<button class='btn btn-danger btn-sm' title='Tidak terbitkan'><li class='fa fa-power-off'></li></button>";
                                                    }else{
                                                        echo "<button class='btn btn-success btn-sm' title='Terbitkan'><li class='fa fa-power-off'></li></button>";

                                                    }
                                                    echo " | ";
                                                    echo "<button class='btn btn-primary btn-sm' title='Edit'><li class='fa fa-edit'></li></button>";
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
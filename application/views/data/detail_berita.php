<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <?php
            foreach ($data_detail_berita as $tampilkan_berita) :
            ?>
                <div class="x_title">
                    <!-- Judul Berita -->
                    <h2><?php echo $tampilkan_berita->judul ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <!-- Isi berita -->
                    <div class="col-md-9 col-sm-9  ">
                        <?php
                        echo $tampilkan_berita->isi
                        ?>
                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3  ">

                        <section class="panel">

                            <div class="x_title">
                                <h2>Deskripsi Berita</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <h5 class="green"><i class="fa fa-newspaper-o"></i> SLUG</h5>

                                <p><?php echo $tampilkan_berita->slug ?></p>
                                <br />

                                <div class="project_detail">

                                    <p class="title">Kategori Berita</p>
                                    <p><?php echo $tampilkan_berita->nama ?></p>
                                    <p class="title">Pembuat</p>
                                    <p><?php echo $tampilkan_berita->pembuat ?></p>
                                    <p class="title">Status Terbit</p>
                                    <p><?php echo $tampilkan_berita->status_terbit ?></p>
                                    <p class="title">Tanggal di buat</p>
                                    <p><?php echo $tampilkan_berita->tanggal ?></p>
                                </div>

                                <br />
                                <br />

                                <div class="text-center mtop20">
                                    <a href="<?php echo base_url() ?>Berita/Edit/<?php echo md5($tampilkan_berita->id_berita) ?>/<?php echo $tampilkan_berita->id_berita ?>"> <button class="btn btn-success btn-block"> <li class="fa fa-edit"></li> Perbaharui</button></a>
                                </div>
                                <div class="text-center mtop20">
                                <a href="javascript:window.history.go(-1);"><button type="button" class="btn btn-warning btn-block"><li class="fa fa-undo"></li> Kembali</button></a>
                                </div>
                            </div>

                        </section>

                    </div>
                    <!-- end project-detail sidebar -->

                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
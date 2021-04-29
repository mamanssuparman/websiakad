<div class="col-md-4">
    <div class="container-fluid gariskotak">
        &nbsp
        <div class="card">
            <div class="card-kepala">
                <span class="kotakhijau"><b>Kepala Sekolah</b></span>
            </div>
        </div>
        &nbsp;
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- <img class="img-responsive" width="280" src="" style="padding:10px;float:left;border-radius:8px;" src="<?php  ?>"> <br> -->
                <?php kepala_sekolah() ?>
            </div>

        </div>
    </div>
    <div class="container-fluid gariskotak">
        &nbsp
        <div class="card">
            <div class="card-kepala">
                <span class="kotakhijau"><b>Kategori Berita</b></span>
            </div>
        </div>
        &nbsp;
        <div class="panel panel-default">
            <div class="panel-body">
               <?php kategori() ?>
            </div>
        </div>
    </div>
    <div class="container-fluid gariskotak">
        &nbsp
        <div class="card">
            <div class="card-kepala">
                <span class="kotakhijau"><b>Terpopuler</b></span>
            </div>
        </div>
        &nbsp;
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                // berita_populer();
                ?>
            </div>

        </div>
    </div>
    <div class="container-fluid gariskotak">
        &nbsp
        <div class="card">
            <div class="card-kepala">
                <span class="kotakhijau"><b>Statistik Pengunjung</b></span>
            </div>
        </div>
        &nbsp;
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                // get_ip();
                // echo "<br>";
                // total_pengunjung();
                // foreach ($total_pengunjung as $tampilkan_pengunjung):
                // 	echo "Total Pengunjung : $tampilkan_pengunjung->jmlpengunjung";
                // endforeach;
                ?>
            </div>

        </div>
    </div>
</div>
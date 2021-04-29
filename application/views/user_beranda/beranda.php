<div class="container-fluid gariskotak">
    &nbsp
    <div class="card">
        <div class="card-kepala">
            <span class="kotakhijau"><b>Berita</b></span>
        </div>
    </div>
    &nbsp
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <?php
            foreach ($berita_beranda as $tampilkan_berita) :
            ?>
                <b><?= $tampilkan_berita->judul ?></b>
                <br>
                <i class='fa fa-calendar-check-o'></i> <?= $tampilkan_berita->tanggal ?> | <i class='fa fa-eye'></i> | <i class='fa fa-user'></i> <?= $tampilkan_berita->pembuat ?>
                <hr>
                <?= $tampilkan_berita->isi ?>... <a href="<?= base_url() ?>Berita/<?= $tampilkan_berita->slug ?>"> Readmore </a>
                <br>
                <hr>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
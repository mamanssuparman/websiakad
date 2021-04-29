<div class="container-fluid gariskotak">
    &nbsp
    <div class="card">
        <div class="card-kepala">
            <span class="kotakhijau"><b>Kategori</b></span>
        </div>
    </div>
    &nbsp
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= $judul ?>
        </div>
        <div class="panel-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_kategori as $tampilkan_kategori) {
                        echo "<tr>";
                        echo "<td><a href=" . base_url() . "Berita/" . $tampilkan_kategori->slug . ">$tampilkan_kategori->judul</a></td>";
                        echo "<td>$tampilkan_kategori->tanggal</td>";
                        echo "<td>$tampilkan_kategori->jumlah_baca</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
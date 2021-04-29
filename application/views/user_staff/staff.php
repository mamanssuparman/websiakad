<div class="container-fluid gariskotak">
    &nbsp
    <div class="card">
        <div class="card-kepala">
            <span class="kotakhijau"><b>Tenaga Pendidik</b></span>
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
                        <th>#</th>
                        <th>Image</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>NUPTK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    foreach ($data_staff as $tampilkan) :
                    ?>
                        <tr>
                            <td>
                                <?= $i++ ?>
                            </td>
                            <td width="auto">
                                <img src="<?= base_url() ?>uploads/pegawai/<?= $tampilkan->foto ?>" alt="" class="img img-responsive" width="50%">
                            </td>
                            <td>
                                <?= $tampilkan->nama ?>
                            </td>
                            <td>
                                <?= $tampilkan->nip ?>
                            </td>
                            <td>
                                <?= $tampilkan->nuptk ?>
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
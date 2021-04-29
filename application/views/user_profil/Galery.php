<div class="container-fluid gariskotak">
    &nbsp
    <div class="card">
        <div class="card-kepala">
            <span class="kotakhijau"><b>Galery</b></span>
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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    foreach ($data_galery as $tampilkan) :
                    ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url() ?>uploads/galery/<?php echo $tampilkan->gambar ?>" alt="" class="img-responsive" style="padding:10px;float:left;border-radius:8px; width:50%">
                            </td>
                            <td>
                                <?= $tampilkan->deskripsi ?> <hr> <i class="fa fa-calendar">
                                <?= $tampilkan->tanggal ?>
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
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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_video as $tampilkan) :
                    ?>
                        <tr>
                            <td>
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $tampilkan->url ?>"></iframe>
                            </td>
                            <td>
                                <?= $tampilkan->judul ?>
                                <hr> <i class="fa fa-calendar">
                                    <?= $tampilkan->tanggal ?>
                                    <hr>
                                    <?= $tampilkan->deskripsi ?>
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
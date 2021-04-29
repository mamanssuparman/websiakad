<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a href="<?php echo base_url() ?>" class="navbar-brand"><b>Beranda</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        foreach ($menu_profil as $tampil_menu_profil) : ?>

                            <li><a href="<?php echo base_url() ?>Profile/<?php echo $tampil_menu_profil->slug ?>"><?php echo $tampil_menu_profil->nama ?></a></li>
                        <?php endforeach;
                        ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Program Keahlian <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        foreach ($menu_program_keahlian as $tampil_menu_program_keahlian) : ?>
                            <li><a href="<?php echo base_url() ?>Program-keahlian/<?php echo $tampil_menu_program_keahlian->slug ?>"><?php echo $tampil_menu_program_keahlian->judul ?></a></li>
                        <?php endforeach;
                        ?>
                    </ul>
                </li>
                <li><a href="<?php echo base_url() ?>Galery">Galery</a></li>
                <li><a href="<?php echo base_url() ?>Staff">Staff</a></li>
                <li><a href="<?php echo base_url() ?>Video">Album Video</a></li>
                <li><a href="http://e-learning.smkn3-banjar.sch.id/">E-Learning</a></li>
            </ul>
            <h6></h6>
                <form class="form-inline my-2 my-md-0" method="POST" action="<?php echo base_url(); ?>Search">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search" required>
                </form>

        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
</nav>
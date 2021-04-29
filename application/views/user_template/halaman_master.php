<?php $this->load->view('user_template/header'); ?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body>
    <div class="containerweb containerweb-fluid">
        <div class="row">
            <div class="col-md-12">
                &nbsp;
                <img src="<?php echo base_url() ?>master/headersmk.jpg" alt="" class="img img-fluid img-responsive">
            </div>
        </div>
        <!-- Menu -->
        &nbsp;
        <?php
        $this->load->view('user_template/menu_top');
        ?>
        <!-- Content -->
        <div class="row">
            <div class="col-md-8">
                <?= $content ?>
            </div>
            <?php
            $this->load->view('user_template/sidebar');
            ?>
        </div>
        <?php
        $this->load->view('user_template/footer');
        ?>
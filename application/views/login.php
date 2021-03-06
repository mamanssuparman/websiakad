<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        $this->load->view('admin_template/message');
                    }
                    ?>
                    <form method="POST" action="<?php echo base_url() ?>Login/Verifikasi">
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" name="username" />
                            <span>
                                <?php echo form_error('username') ?>
                            </span>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                            <span>
                                <?php echo form_error('password') ?>
                            </span>
                        </div>
                        <input type="hidden" class='form-control' name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                        <div>
                            <button class="btn btn-success btn-block" type="submit">Login</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div>
                                <h1> <?php echo $title ?></h1>
                                <p>??2016 All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>
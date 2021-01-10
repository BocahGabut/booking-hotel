<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from www.11-76.com/themes/fin/index-KENBURNS-SLIDESHOW-DARK.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2019 14:03:27 GMT -->

<head>
    <meta charset="utf-8">
    <title>
        Login Page
    </title>
    <meta content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi" name="viewport">
    <!-- Fin v1.0 || ex nihilo || May 2016 -->
    <!-- style start -->
    <link href="<?php echo base_url(); ?>assets/login/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/login/css/style-dark.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/login/css/font-awesome-4.6.2/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"><!-- style end -->
    <!-- alternate style start || to use your preferred color, simply remove all style colors below and leave only your preferred color -->
    <link href="<?php echo base_url(); ?>assets/login/css/colors/yellow-2.css" media="screen" rel="stylesheet" title="yellow-2" type="text/css">
    <link href="<?php echo base_url(); ?>assets/login/css/custom.css" media="screen" rel="stylesheet" title="yellow-2" type="text/css">

    <!-- google fonts start -->
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900%7CDosis:200,300,400,500,600,700,800%7COswald:300,400,700%7CMontserrat:400,700" rel="stylesheet" type="text/css"><!-- google fonts end -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>

<body>
    <!-- preloader start -->
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position preloader-effect">
                <span></span>
            </div>
        </div>
    </div><!-- preloader end -->
    <!-- hero slider start -->
    <div class="hero-fullscreen hero-bg">
        <!-- ken burns image slideshow start -->
        <div id="kenburnsy-bg">
            <img alt="Background" src="<?php echo base_url(); ?>assets/login/img/bg1.jpg"> <img alt="Background" src="<?php echo base_url(); ?>assets/login/img/bg2.jpg"> <img alt="Background" src="<?php echo base_url(); ?>assets/login/img/bg3.jpg"> <img alt="Background" src="<?php echo base_url(); ?>assets/login/img/bg4.jpg">
        </div>
        <div class="preload-content"></div><!-- preload content end -->
    </div>
    <div class="center-container-home">
        <!-- center block start -->
        <div class="center-block-home">
            <div class="form-login">
                <form id="form_login" action="<?php echo base_url() . 'login/aksi_login' ?>" method="POST">
                    <label class="label-header">LOGIN</label>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <br>
                    <!--<label class="msg">Silahkan Masukan Username Dan Password </label>-->
                    <div class="row">
                        <div class="col-12">
                            <input type="text" required class="input-field " name="username" placeholder="Username">
                        </div>
                        <div class="col-12">
                            <input type="password" required class="input-field" name="password" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <button class="submit-button" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- center block end -->
    </div>
    <!-- scripts start -->
    <script src="<?php echo base_url(); ?>assets/login/js/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/fin.js" type="text/javascript"></script><!-- scripts end -->
</body>

</html>
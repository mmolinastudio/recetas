<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title; ?> - Recetacas! </title>
        <meta name="description" content="Base de datos personal de recetas de cocina fáciles y herramienta sencilla para hacer la lista de la compra.">
        <meta name="viewport" content="width=device-width">
        <link rel="author" href="humans.txt" />

        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-responsive.min.css"); ?>">
        
        <link rel="stylesheet" href="<?php echo base_url("assets/js/vendor/jasny-bootstrap/css/jasny-bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/js/vendor/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css"); ?>">
        
        <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>">
        <link href='http://fonts.googleapis.com/css?family=Londrina+Shadow|Fascinate' rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="{{ base_url("assets/js/vendor/html5shiv.js") }}"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo site_url(); ?>">Recetacas!</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li<?php if($nav_active == "home"){ ?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>"><i class="icon-home icon-white"></i> Home</a></li>
                            <li<?php if($nav_active == "recetas"){ ?> class="active" <?php } ?>><a href="<?php echo site_url("recetas"); ?>"><i class="icon-book icon-white"></i> Recetas</a></li>
                            <li<?php if ($nav_active == "about"){ ?> class="active" <?php } ?>><a href="<?php echo site_url("about"); ?>"><i class="icon-search icon-white"></i> Buscar</a></li>
                            
                            <?php if ($nav_active == "registrar_usuario"){ ?>
                                <li class="active"><a href="<?php echo site_url("auth"); ?>">Registro</a></li>
                            <?php } elseif ($logged_in){ ?>
                                <li<?php if($nav_active == "mi_perfil"){ ?> class="active" <?php } ?>><a href="<?php echo site_url("mi_perfil"); ?>"><i class="icon-user  icon-white"></i> Mi perfil</a></li>
                                
                                <?php if($real_username == "administrador") { ?>
                                    <li<?php if($nav_active == "auth"){ ?> class="active" <?php } ?>><a href="<?php echo site_url("auth"); ?>">Configuración</a></li>
                                <?php } ?>

                            <?php } ?>

                        </ul>

                        <?php if(isset($logged_in) && $logged_in==true){ ?>
                            <p class="navbar-text pull-right">
                                <a href="<?php echo site_url("mi_cuenta"); ?>"><i class="icon-wrench icon-white"></i> <?php echo $real_username; ?></a> | <a href="<?php echo site_url("logout"); ?>"><?php echo lang('web_logout'); ?> <i class="icon-off  icon-white"></i></a>
                            </p>
                        <?php }else{ ?>
                            <p class="navbar-text pull-right">
                                <a href="<?php echo site_url("login"); ?>"><?php echo lang('web_login'); ?></a> | <a href="<?php echo site_url("registro"); ?>"><?php echo lang('web_new_user'); ?></a>
                            </p>
                        <?php } ?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
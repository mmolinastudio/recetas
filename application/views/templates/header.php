<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title; ?> - Recetacas </title>
        <meta name="description" content="Base de datos personal de recetas de cocina fáciles y herramienta sencilla para hacer la lista de la compra.">
        <meta name="viewport" content="width=device-width">
        <link rel="author" href="humans.txt" />

        <link rel="stylesheet" href="<?php echo site_url(); ?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo site_url(); ?>css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo site_url(); ?>css/main.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="{{ site_url() }}js/vendor/html5shiv.js"><\/script>')</script>
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
                    <a class="brand" href="<?php echo site_url(); ?>">Recetacas</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li<?php if($controller == "home"){ ?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>">Home</a></li>
                            <li<?php if($controller == "recetas"){ ?> class="active" <?php } ?>><a href="<?php echo site_url("recetas"); ?>">Recetas</a></li>
                            <li<?php if ($controller == "about"){ ?> class="active" <?php } ?>><a href="<?php echo site_url("about"); ?>">About</a></li>
                            <?php if ($controller == "auth"){ ?><li class="active"><a href="<?php echo site_url("auth"); ?>">Configuración</a></li><?php } ?>
                            <?php if ($controller == "registrar_usuario"){ ?>
                                <li class="active"><a href="<?php echo site_url("auth"); ?>">Registro</a></li>
                            <?php } elseif (($logged_in) && ($real_username != "administrator")){ ?>
                                <li<?php if($controller == "mi_perfil"){ ?> class="active" <?php } ?>><a href="<?php echo site_url("mi_perfil"); ?>">Mi cuenta</a></li>
                            <?php } ?>
                        </ul>

                        <?php if(isset($logged_in) && $logged_in==true){ ?>
                            <p class="navbar-text pull-right">
                                Logged in as <a class="navbar-link" href="<?php echo site_url("auth"); ?>"><?php echo $real_username; ?></a> | <a class="navbar-link" href="<?php echo site_url("logout"); ?>">Logout</a>
                            </p>
                        <?php }else{ ?>
                            <p class="navbar-text pull-right">
                                <a class="navbar-link" href="<?php echo site_url("login"); ?>">Login</a> | <a class="navbar-link" href="<?php echo site_url("registro"); ?>">Nuevo Usuario</a>
                            </p>
                        <?php } ?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
<?php

/* templates/header.twig */
class __TwigTemplate_81a9e7279eb4169fb1ca7a19fc2f3735 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\"> <!--<![endif]-->
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
        <title>";
        // line 9
        if (isset($context["title"])) { $_title_ = $context["title"]; } else { $_title_ = null; }
        echo twig_escape_filter($this->env, $_title_, "html", null, true);
        echo " - Recetacas </title>
        <meta name=\"description\" content=\"Base de datos personal de recetas de cocina fáciles y herramienta sencilla para hacer la lista de la compra.\">
        <meta name=\"viewport\" content=\"width=device-width\">
        <link rel=\"author\" href=\"humans.txt\" />

        <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "css/bootstrap.min.css\">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "css/bootstrap-responsive.min.css\">
        <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "css/main.css\">

        <!--[if lt IE 9]>
            <script src=\"//html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
            <script>window.html5 || document.write('<script src=\"";
        // line 26
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "js/vendor/html5shiv.js\"><\\/script>')</script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class=\"chromeframe\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade your browser</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class=\"navbar navbar-inverse navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </a>
                    <a class=\"brand\" href=\"";
        // line 44
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\">Recetacas</a>
                    <div class=\"nav-collapse collapse\">
                        <ul class=\"nav\"> ";
        // line 47
        echo "                            <li";
        if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
        if (($_controller_ == "home")) {
            echo " class=\"active\" ";
        }
        echo "><a href=\"";
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\">Home</a></li>
                            <li";
        // line 48
        if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
        if (($_controller_ == "recetas")) {
            echo " class=\"active\" ";
        }
        echo "><a href=\"";
        echo twig_escape_filter($this->env, site_url("recetas"), "html", null, true);
        echo "\">Recetas</a></li>
                            <li";
        // line 49
        if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
        if (($_controller_ == "about")) {
            echo " class=\"active\" ";
        }
        echo "><a href=\"";
        echo twig_escape_filter($this->env, site_url("about"), "html", null, true);
        echo "\">About</a></li>
                            ";
        // line 50
        if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
        if (($_controller_ == "auth")) {
            echo "<li class=\"active\"><a href=\"";
            echo twig_escape_filter($this->env, site_url("auth"), "html", null, true);
            echo "\">Configuración</a></li>";
        }
        // line 51
        echo "                            ";
        if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
        if (isset($context["username"])) { $_username_ = $context["username"]; } else { $_username_ = null; }
        if (($_controller_ == "registrar_usuario")) {
            // line 52
            echo "                                <li class=\"active\"><a href=\"";
            echo twig_escape_filter($this->env, site_url("auth"), "html", null, true);
            echo "\">Registro</a></li>
                            ";
        } elseif (($_username_ && ($_username_ != "administrator"))) {
            // line 54
            echo "                                <li";
            if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
            if (($_controller_ == "perfil")) {
                echo " class=\"active\" ";
            }
            echo "><a href=\"";
            echo twig_escape_filter($this->env, site_url("perfil"), "html", null, true);
            echo "\">Mi cuenta</a></li>
                            ";
        }
        // line 56
        echo "                            <!--<li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Dropdown <b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"#\">Action</a></li>
                                    <li><a href=\"#\">Another action</a></li>
                                    <li><a href=\"#\">Something else here</a></li>
                                    <li class=\"divider\"></li>
                                    <li class=\"nav-header\">Nav header</li>
                                    <li><a href=\"#\">Separated link</a></li>
                                    <li><a href=\"#\">One more separated link</a></li>
                                </ul>
                            </li>-->
                        </ul>
                        <!--
                        <form class=\"navbar-form pull-right\">
                            <input class=\"span2\" type=\"text\" placeholder=\"Email\">
                            <input class=\"span2\" type=\"password\" placeholder=\"Password\">
                            <button type=\"submit\" class=\"btn\">Sign in</button>
                        </form>
                        -->

                        ";
        // line 77
        if (isset($context["logged_in"])) { $_logged_in_ = $context["logged_in"]; } else { $_logged_in_ = null; }
        if ($_logged_in_) {
            // line 78
            echo "                            <p class=\"navbar-text pull-right\">
                                Logged in as <a href=\"";
            // line 79
            echo twig_escape_filter($this->env, site_url("auth"), "html", null, true);
            echo "\">";
            if (isset($context["username"])) { $_username_ = $context["username"]; } else { $_username_ = null; }
            echo twig_escape_filter($this->env, $_username_, "html", null, true);
            echo "</a> | <a href=\"";
            echo twig_escape_filter($this->env, site_url("logout"), "html", null, true);
            echo "\">Logout</a>
                            </p>
                        ";
        } else {
            // line 82
            echo "                            <p class=\"navbar-text pull-right\">
                                <a class=\"navbar-link\" href=\"";
            // line 83
            echo twig_escape_filter($this->env, site_url("login"), "html", null, true);
            echo "\">Login</a> | <a class=\"navbar-link\" href=\"";
            echo twig_escape_filter($this->env, site_url("registro"), "html", null, true);
            echo "\">Nuevo Usuario</a>
                            </p>
                        ";
        }
        // line 86
        echo "                        <!--<p class=\"navbar-text pull-right\">
                            Logged in as
                            <a class=\"navbar-link\" href=\"#\">Username</a>
                        </p>-->
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class=\"container\">";
    }

    public function getTemplateName()
    {
        return "templates/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 86,  185 => 83,  182 => 82,  171 => 79,  168 => 78,  165 => 77,  142 => 56,  131 => 54,  125 => 52,  120 => 51,  113 => 50,  104 => 49,  95 => 48,  85 => 47,  80 => 44,  59 => 26,  52 => 22,  48 => 21,  38 => 14,  29 => 9,  19 => 1,);
    }
}

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
        echo "<html>
    <head>
        <title>";
        // line 3
        if (isset($context["title"])) { $_title_ = $context["title"]; } else { $_title_ = null; }
        echo twig_escape_filter($this->env, $_title_, "html", null, true);
        echo " - Recetacas </title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"″ />
\t</head>
\t<body>
\t    <h1>Recetacas</h1>
\t    <hr>";
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
        return array (  23 => 3,  38 => 7,  32 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}

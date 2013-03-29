<?php

/* recetas/header.html.twig */
class __TwigTemplate_b894ba6cae6a44be8a648f5422f7d6d2 extends Twig_Template
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
        return "recetas/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}

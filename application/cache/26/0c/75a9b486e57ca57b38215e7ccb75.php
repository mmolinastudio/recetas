<?php

/* recetas/view.php */
class __TwigTemplate_260c75a9b486e57ca57b38215e7ccb75 extends Twig_Template
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
        echo "
<h1> ";
        // line 2
        if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "nombre", array(), "array"), "html", null, true);
        echo " </h1>
<p> ";
        // line 3
        if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "desc_larga", array(), "array"), "html", null, true);
        echo " </p>";
    }

    public function getTemplateName()
    {
        return "recetas/view.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  22 => 2,  19 => 1,);
    }
}

<?php

/* recetas/view.twig */
class __TwigTemplate_961870b7c8a85263dcf2d3fe76cedff4 extends Twig_Template
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
";
        // line 2
        $this->env->loadTemplate("templates/header.twig")->display($context);
        // line 3
        echo "
\t<h1> ";
        // line 4
        if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "nombre"), "html", null, true);
        echo " </h1>
\t<p> ";
        // line 5
        if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "desc_larga"), "html", null, true);
        echo " </p>

";
        // line 7
        $this->env->loadTemplate("templates/footer.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "recetas/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  32 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}

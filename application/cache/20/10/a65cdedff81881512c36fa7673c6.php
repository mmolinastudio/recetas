<?php

/* recetas/index.twig */
class __TwigTemplate_2010a65cdedff81881512c36fa7673c6 extends Twig_Template
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
        $this->env->loadTemplate("templates/header.twig")->display($context);
        // line 2
        echo "
<h1>Recetas - listado</h1>

";
        // line 5
        if (isset($context["recetas"])) { $_recetas_ = $context["recetas"]; } else { $_recetas_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_recetas_);
        foreach ($context['_seq'] as $context["_key"] => $context["recetas_item"]) {
            // line 6
            echo "
    <h2>";
            // line 7
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "nombre"), "html", null, true);
            echo "</h2>
    <div id=\"main\">
        ";
            // line 9
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "desc_corta"), "html", null, true);
            echo "
    </div>
    <p><a href=\"";
            // line 11
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "slug"), "html", null, true);
            echo "\">Ver receta</a></p>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recetas_item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "
";
        // line 15
        $this->env->loadTemplate("templates/footer.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "recetas/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 15,  56 => 14,  46 => 11,  40 => 9,  34 => 7,  31 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }
}

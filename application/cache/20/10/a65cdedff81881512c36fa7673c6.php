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
\t<h2>Lista de Recetas</h2>
\t";
        // line 4
        if (isset($context["paginacion"])) { $_paginacion_ = $context["paginacion"]; } else { $_paginacion_ = null; }
        echo $_paginacion_;
        echo "
\t<div class=\"accordion\" id=\"accordion2\">
\t";
        // line 6
        if (isset($context["recetas"])) { $_recetas_ = $context["recetas"]; } else { $_recetas_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_recetas_);
        foreach ($context['_seq'] as $context["_key"] => $context["recetas_item"]) {
            // line 7
            echo "\t\t<div class=\"accordion-group\">
\t\t\t<div class=\"accordion-heading\">
\t\t\t\t<h3 class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion2\" href=\"#collapse";
            // line 9
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "nombre"), "html", null, true);
            echo "</h3>
\t\t\t</div>
\t\t\t<div id=\"collapse";
            // line 11
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "id"), "html", null, true);
            echo "\" class=\"accordion-body collapse\">
\t\t\t\t<div class=\"accordion-inner\">
\t\t\t\t\t<p>";
            // line 13
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_recetas_item_, "desc_corta"), "html", null, true);
            echo "</p>
\t\t    \t\t<p><a href=\"";
            // line 14
            if (isset($context["recetas_item"])) { $_recetas_item_ = $context["recetas_item"]; } else { $_recetas_item_ = null; }
            echo twig_escape_filter($this->env, ((current_url() . "/") . $this->getAttribute($_recetas_item_, "slug")), "html", null, true);
            echo "\">Ver receta</a></p>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recetas_item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 19
        echo "\t</div>
\t";
        // line 20
        if (isset($context["paginacion"])) { $_paginacion_ = $context["paginacion"]; } else { $_paginacion_ = null; }
        echo $_paginacion_;
        echo "

";
        // line 22
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
        return array (  81 => 22,  75 => 20,  72 => 19,  60 => 14,  55 => 13,  49 => 11,  40 => 9,  36 => 7,  31 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }
}

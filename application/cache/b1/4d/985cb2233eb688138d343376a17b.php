<?php

/* recetas/index.php */
class __TwigTemplate_b14d985cb2233eb688138d343376a17b extends Twig_Template
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
        echo "<h1>Recetas - listado</h1>
<?php foreach (\$recetas as \$recetas_item): ?>

    <h2><?php echo \$recetas_item['nombre'] ?></h2>
    <div id=\"main\">
        <?php echo \$recetas_item['desc_corta'] ?>
    </div>
    <p><a href=\"<?php echo \$recetas_item['slug'] ?>\">View article</a></p>

<?php endforeach ?>";
    }

    public function getTemplateName()
    {
        return "recetas/index.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}

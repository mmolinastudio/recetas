<?php

/* templates/footer.twig */
class __TwigTemplate_e55838dfe862f1f55f3cc60ef2488e56 extends Twig_Template
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
        echo "\t\t\t<hr>

            <footer>
                <p class=\"muted\">&copy; 2013 | @mmolinastudio</p>
            </footer>

        </div> <!-- /container -->

        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
        <script>window.jQuery || document.write('<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, site_url("js/vendor/jquery-1.9.1.min.js"), "html", null, true);
        echo "\"><\\/script>')</script>

        <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, site_url("js/vendor/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, site_url("js/plugins.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, site_url("js/main.js"), "html", null, true);
        echo "\"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "templates/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 15,  40 => 14,  35 => 12,  30 => 10,  19 => 1,);
    }
}

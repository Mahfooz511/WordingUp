<?php

/* @CoreHome/_topScreen.twig */
class __TwigTemplate_d6c391708c18d642bd7e82adc67c6fdb02afd493d2c1a2779cce7818ff5ffb93 extends Twig_Template
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
        echo "<div id=\"header\">
    ";
        // line 2
        $this->env->loadTemplate("@CoreHome/_logo.twig")->display($context);
        // line 3
        echo "    ";
        $this->env->loadTemplate("@CoreHome/_topBar.twig")->display($context);
        // line 4
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_topScreen.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}

<?php

/* @Events/index.twig */
class __TwigTemplate_260afeaa7bfeb2ea11a2011613f9aa912c2d1d0abfb969caecd094b8b33ee325 extends Twig_Template
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
        echo (isset($context["leftMenuReports"]) ? $context["leftMenuReports"] : $this->getContext($context, "leftMenuReports"));
        echo "

";
    }

    public function getTemplateName()
    {
        return "@Events/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}

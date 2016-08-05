<?php

/* @UserCountry/index.twig */
class __TwigTemplate_4f1a2e7720c40ab22114f0d54aaae52bbd9f3210595fa7b07335fe2cb169fc12 extends Twig_Template
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
        echo "<div id=\"leftcolumn\">
    ";
        // line 2
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.leftColumnUserCountry"));
        echo "

    <h2 piwik-enriched-headline>";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Continent")), "html", null, true);
        echo "</h2>
    ";
        // line 5
        echo (isset($context["dataTableContinent"]) ? $context["dataTableContinent"] : $this->getContext($context, "dataTableContinent"));
        echo "

    <div class=\"sparkline\">
        ";
        // line 8
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array((isset($context["urlSparklineCountries"]) ? $context["urlSparklineCountries"] : $this->getContext($context, "urlSparklineCountries"))));
        echo "
        ";
        // line 9
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_DistinctCountries", (("<strong>" . (isset($context["numberDistinctCountries"]) ? $context["numberDistinctCountries"] : $this->getContext($context, "numberDistinctCountries"))) . "</strong>")));
        echo "
    </div>

    ";
        // line 12
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.footerUserCountry"));
        echo "

</div>

<div id=\"rightcolumn\">
    <h2 piwik-enriched-headline>";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Country")), "html", null, true);
        echo "</h2>
    ";
        // line 18
        echo (isset($context["dataTableCountry"]) ? $context["dataTableCountry"] : $this->getContext($context, "dataTableCountry"));
        echo "

    <h2 piwik-enriched-headline>";
        // line 20
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Region")), "html", null, true);
        echo "</h2>
    ";
        // line 21
        echo (isset($context["dataTableRegion"]) ? $context["dataTableRegion"] : $this->getContext($context, "dataTableRegion"));
        echo "

    <h2 piwik-enriched-headline>";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_City")), "html", null, true);
        echo "</h2>
    ";
        // line 24
        echo (isset($context["dataTableCity"]) ? $context["dataTableCity"] : $this->getContext($context, "dataTableCity"));
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "@UserCountry/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 24,  73 => 23,  68 => 21,  64 => 20,  59 => 18,  55 => 17,  47 => 12,  41 => 9,  37 => 8,  31 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}

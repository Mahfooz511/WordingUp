<?php

/* @DevicesDetection/index.twig */
class __TwigTemplate_3e40e4030e6befe47a693b08f297698d23d2f6efde4409c8b12f3e2823b7f56a extends Twig_Template
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
        echo "<div id='leftcolumn'>
    <h2 piwik-enriched-headline>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceType")), "html", null, true);
        echo "</h2>
    ";
        // line 3
        echo (isset($context["deviceTypes"]) ? $context["deviceTypes"] : $this->getContext($context, "deviceTypes"));
        echo "
    <h2 piwik-enriched-headline>";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceBrand")), "html", null, true);
        echo "</h2>
    ";
        // line 5
        echo (isset($context["deviceBrands"]) ? $context["deviceBrands"] : $this->getContext($context, "deviceBrands"));
        echo "
    <h2 piwik-enriched-headline>";
        // line 6
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceModel")), "html", null, true);
        echo "</h2>
    ";
        // line 7
        echo (isset($context["deviceModels"]) ? $context["deviceModels"] : $this->getContext($context, "deviceModels"));
        echo "
</div>

<div id='rightcolumn'>
    <h2 piwik-enriched-headline>";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_OperatingSystemFamilies")), "html", null, true);
        echo "</h2>
    ";
        // line 12
        echo (isset($context["osReport"]) ? $context["osReport"] : $this->getContext($context, "osReport"));
        echo "
    <h2 piwik-enriched-headline>";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_BrowserFamilies")), "html", null, true);
        echo "</h2>
    ";
        // line 14
        echo (isset($context["browserReport"]) ? $context["browserReport"] : $this->getContext($context, "browserReport"));
        echo "
    <h2 piwik-enriched-headline>";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_BrowserEngines")), "html", null, true);
        echo "</h2>
    ";
        // line 16
        echo (isset($context["browserEngineReport"]) ? $context["browserEngineReport"] : $this->getContext($context, "browserEngineReport"));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@DevicesDetection/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 16,  65 => 15,  61 => 14,  57 => 13,  53 => 12,  49 => 11,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}

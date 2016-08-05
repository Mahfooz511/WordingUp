<?php

/* @Live/_actionsList.twig */
class __TwigTemplate_ec66626e97826cf3a25f9cbee9e4f55d5f2ffd4df2c61cc3aa0aa6a1be47bd45 extends Twig_Template
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
        $context["previousAction"] = false;
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actionDetails"]) ? $context["actionDetails"] : $this->getContext($context, "actionDetails")));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "        ";
            if ($this->getAttribute($context["action"], "customVariables", array(), "any", true, true)) {
                // line 5
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                echo ":
            ";
                // line 6
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["action"], "customVariables", array()));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 7
                    echo "                ";
                    $context["name"] = ("customVariablePageName" . $context["id"]);
                    // line 8
                    echo "                ";
                    $context["value"] = ("customVariablePageValue" . $context["id"]);
                    // line 9
                    echo "                - ";
                    echo $this->getAttribute($context["customVariable"], (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array");
                    echo " ";
                    if ((twig_length_filter($this->env, $this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array")) > 0)) {
                        echo " = ";
                        echo $this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array");
                    }
                    // line 10
                    echo "
                ";
                    // line 12
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "        ";
            }
            // line 14
            echo "    ";
            $context["customVariablesTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "    ";
            if ((((!$this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "filterEcommerce", array())) || ($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) || ($this->getAttribute($context["action"], "type", array()) == "ecommerceAbandonedCart"))) {
                // line 16
                echo "        <li class=\"";
                if ($this->getAttribute($context["action"], "goalName", array(), "any", true, true)) {
                    echo "goal";
                } else {
                    echo "action";
                }
                echo "\"
            title=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "serverTimePretty", array()), "html", null, true);
                if (($this->getAttribute($context["action"], "url", array(), "any", true, true) && twig_length_filter($this->env, trim($this->getAttribute($context["action"], "url", array()))))) {
                    // line 18
                    echo "
";
                    // line 19
                    echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                }
                if (twig_length_filter($this->env, trim((isset($context["customVariablesTooltip"]) ? $context["customVariablesTooltip"] : $this->getContext($context, "customVariablesTooltip"))))) {
                    // line 20
                    echo "
";
                    // line 21
                    echo twig_escape_filter($this->env, trim((isset($context["customVariablesTooltip"]) ? $context["customVariablesTooltip"] : $this->getContext($context, "customVariablesTooltip"))), "html", null, true);
                }
                // line 22
                if ($this->getAttribute($context["action"], "generationTime", array(), "any", true, true)) {
                    // line 23
                    echo "
";
                    // line 24
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnGenerationTime")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($context["action"], "generationTime", array());
                }
                // line 25
                if ($this->getAttribute($context["action"], "timeSpentPretty", array(), "any", true, true)) {
                    // line 26
                    echo "
";
                    // line 27
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($context["action"], "timeSpentPretty", array());
                }
                echo "\">
            <div>
            ";
                // line 29
                if ((($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder") || ($this->getAttribute($context["action"], "type", array()) == "ecommerceAbandonedCart"))) {
                    // line 30
                    echo "            ";
                    // line 31
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                    echo "\"/>
                ";
                    // line 32
                    if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                        // line 33
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceOrder")), "html", null, true);
                        echo "</strong>
                    <span style='color:#666;'>(";
                        // line 34
                        echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "orderId", array()), "html", null, true);
                        echo ")</span>
                ";
                    } else {
                        // line 36
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
                        echo "</strong>

                    ";
                        // line 39
                        echo "                ";
                    }
                    // line 40
                    echo "                <p>
                <span ";
                    // line 41
                    if ((!(isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget")))) {
                        echo "style='margin-left:20px;'";
                    }
                    echo ">
                    ";
                    // line 42
                    if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                        // line 44
                        ob_start();
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                        echo "
";
                        // line 45
                        if ((!twig_test_empty($this->getAttribute($context["action"], "revenueSubTotal", array())))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Subtotal")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueSubTotal", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                        }
                        // line 46
                        echo "
";
                        // line 47
                        if ((!twig_test_empty($this->getAttribute($context["action"], "revenueTax", array())))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Tax")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueTax", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                        }
                        // line 48
                        echo "
";
                        // line 49
                        if ((!twig_test_empty($this->getAttribute($context["action"], "revenueShipping", array())))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Shipping")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueShipping", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                        }
                        // line 50
                        echo "
";
                        // line 51
                        if ((!twig_test_empty($this->getAttribute($context["action"], "revenueDiscount", array())))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Discount")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueDiscount", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                        }
                        $context["ecommerceOrderTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 53
                        echo "                    <abbr title=\"";
                        echo twig_escape_filter($this->env, (isset($context["ecommerceOrderTooltip"]) ? $context["ecommerceOrderTooltip"] : $this->getContext($context, "ecommerceOrderTooltip")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    ";
                    } else {
                        // line 55
                        echo "                        ";
                        ob_start();
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        $context["revenueLeft"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 56
                        echo "                        ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", (isset($context["revenueLeft"]) ? $context["revenueLeft"] : $this->getContext($context, "revenueLeft")))), "html", null, true);
                        echo ":
                    ";
                    }
                    // line 58
                    echo "                        <strong>";
                    echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                    echo "</strong>
                    ";
                    // line 59
                    if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                        // line 60
                        echo "                    </abbr>
                    ";
                    }
                    // line 61
                    echo ", ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "items", array()), "html", null, true);
                    echo "

                    ";
                    // line 64
                    echo "                    ";
                    if ((!twig_test_empty($this->getAttribute($context["action"], "itemDetails", array())))) {
                        // line 65
                        echo "                        <ul style='list-style:square;margin-left:";
                        if ((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) {
                            echo "15";
                        } else {
                            echo "50";
                        }
                        echo "px;'>
                            ";
                        // line 66
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["action"], "itemDetails", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 67
                            echo "                                <li>
                                    ";
                            // line 68
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "itemSKU", array()), "html", null, true);
                            if ((!twig_test_empty($this->getAttribute($context["product"], "itemName", array())))) {
                                echo ": ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "itemName", array()), "html", null, true);
                            }
                            // line 69
                            echo "                                    ";
                            if ((!twig_test_empty($this->getAttribute($context["product"], "itemCategory", array())))) {
                                echo " (";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "itemCategory", array()), "html", null, true);
                                echo ")";
                            }
                            // line 70
                            echo "                                    ,
                                    ";
                            // line 71
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "quantity", array()), "html", null, true);
                            echo ",
                                    ";
                            // line 72
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Price")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["product"], "price", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                            echo "
                                </li>
                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 75
                        echo "                        </ul>
                    ";
                    }
                    // line 77
                    echo "                </span>
                </p>
            ";
                } elseif ((!$this->getAttribute($context["action"], "goalName", array(), "any", true, true))) {
                    // line 80
                    echo "                ";
                    // line 81
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute($context["action"], "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "pageTitle", array()), false)) : (false))))) {
                        // line 82
                        echo "                    <span class=\"truncated-text-line\">";
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "pageTitle", array())));
                        echo "</span>
                ";
                    }
                    // line 84
                    echo "                ";
                    if ($this->getAttribute($context["action"], "siteSearchKeyword", array(), "any", true, true)) {
                        // line 85
                        echo "                    ";
                        if (($this->getAttribute($context["action"], "type", array()) == "search")) {
                            // line 86
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                            echo "' title='";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_SubmenuSitesearch")), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 88
                        echo "                    <span class=\"truncated-text-line\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "siteSearchKeyword", array()), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 90
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false))))) {
                        // line 91
                        echo "                    <img src='";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                        echo "' title='";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
                        echo "' class=\"action-list-action-icon\">
                    <span class=\"truncated-text-line\">";
                        // line 92
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "eventCategory", array())));
                        echo " - ";
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "eventAction", array())));
                        echo " ";
                        if ($this->getAttribute($context["action"], "eventName", array(), "any", true, true)) {
                            echo "- ";
                            echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "eventName", array())));
                        }
                        echo " ";
                        if ($this->getAttribute($context["action"], "eventValue", array(), "any", true, true)) {
                            echo "[";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "eventValue", array()), "html", null, true);
                            echo "]";
                        }
                        echo "</span>
                ";
                    }
                    // line 94
                    echo "                ";
                    if ((!twig_test_empty($this->getAttribute($context["action"], "url", array())))) {
                        // line 95
                        echo "                    ";
                        if ((($this->getAttribute($context["action"], "type", array()) == "action") && (!twig_test_empty((($this->getAttribute($context["action"], "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "pageTitle", array()), false)) : (false)))))) {
                            echo "<p>";
                        }
                        // line 96
                        echo "                    ";
                        if ((($this->getAttribute($context["action"], "type", array()) == "download") || ($this->getAttribute($context["action"], "type", array()) == "outlink"))) {
                            // line 97
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 99
                        echo "
                    ";
                        // line 100
                        if (((!twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false)))) && ((($this->getAttribute((isset($context["previousAction"]) ? $context["previousAction"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["previousAction"]) ? $context["previousAction"] : null), "url", array()), false)) : (false)) == $this->getAttribute($context["action"], "url", array())))) {
                            // line 102
                            echo "                        ";
                            // line 103
                            echo "                    ";
                        } else {
                            // line 104
                            echo "                        <a href=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                            echo "\" target=\"_blank\" class=\"";
                            if (twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false)))) {
                                echo "action-list-url";
                            }
                            echo " truncated-text-line\"
                           ";
                            // line 105
                            if (((!array_key_exists("overrideLinkStyle", $context)) || (isset($context["overrideLinkStyle"]) ? $context["overrideLinkStyle"] : $this->getContext($context, "overrideLinkStyle")))) {
                                echo "style=\"";
                                if ((($this->getAttribute($context["action"], "type", array()) == "action") && (!twig_test_empty((($this->getAttribute($context["action"], "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "pageTitle", array()), false)) : (false)))))) {
                                    echo "margin-left: 9px;";
                                }
                                echo "text-decoration:underline;\"";
                            }
                            echo ">
                           ";
                            // line 106
                            if ((!twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false))))) {
                                // line 107
                                echo "                               (url)
                           ";
                            } else {
                                // line 109
                                echo "                               ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                                echo "
                           ";
                            }
                            // line 111
                            echo "                        </a>
                    ";
                        }
                        // line 113
                        echo "                    ";
                        if ((($this->getAttribute($context["action"], "type", array()) == "action") && (!twig_test_empty((($this->getAttribute($context["action"], "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "pageTitle", array()), false)) : (false)))))) {
                            echo "</p>";
                        }
                        // line 114
                        echo "                ";
                    } elseif ((($this->getAttribute($context["action"], "type", array()) != "search") && ($this->getAttribute($context["action"], "type", array()) != "event"))) {
                        // line 115
                        echo "                    <p>
                    <span style=\"margin-left: 9px;\">";
                        // line 116
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "pageUrlNotDefined", array()), "html", null, true);
                        echo "</span>
                    </p>
                ";
                    }
                    // line 119
                    echo "            ";
                } else {
                    // line 120
                    echo "                ";
                    // line 121
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                    echo "\" />
                <strong>";
                    // line 122
                    echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "goalName", array()), "html", null, true);
                    echo "</strong>
                ";
                    // line 123
                    if (($this->getAttribute($context["action"], "revenue", array()) > 0)) {
                        echo ", ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    <strong>";
                        // line 124
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                        echo "</strong>
                ";
                    }
                    // line 126
                    echo "            ";
                }
                // line 127
                echo "            </div>
        </li>
    ";
            }
            // line 130
            echo "
    ";
            // line 131
            $context["previousAction"] = $context["action"];
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/_actionsList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  479 => 131,  476 => 130,  471 => 127,  468 => 126,  463 => 124,  457 => 123,  453 => 122,  448 => 121,  446 => 120,  443 => 119,  437 => 116,  434 => 115,  431 => 114,  426 => 113,  422 => 111,  416 => 109,  412 => 107,  410 => 106,  400 => 105,  391 => 104,  388 => 103,  386 => 102,  384 => 100,  381 => 99,  375 => 97,  372 => 96,  367 => 95,  364 => 94,  346 => 92,  339 => 91,  336 => 90,  330 => 88,  322 => 86,  319 => 85,  316 => 84,  310 => 82,  307 => 81,  305 => 80,  300 => 77,  296 => 75,  285 => 72,  279 => 71,  276 => 70,  269 => 69,  263 => 68,  260 => 67,  256 => 66,  247 => 65,  244 => 64,  236 => 61,  232 => 60,  230 => 59,  225 => 58,  219 => 56,  214 => 55,  206 => 53,  198 => 51,  195 => 50,  188 => 49,  185 => 48,  178 => 47,  175 => 46,  168 => 45,  161 => 44,  159 => 42,  153 => 41,  150 => 40,  147 => 39,  141 => 36,  136 => 34,  131 => 33,  129 => 32,  124 => 31,  122 => 30,  120 => 29,  112 => 27,  109 => 26,  107 => 25,  102 => 24,  99 => 23,  97 => 22,  94 => 21,  91 => 20,  87 => 19,  84 => 18,  81 => 17,  72 => 16,  69 => 15,  66 => 14,  63 => 13,  57 => 12,  54 => 10,  46 => 9,  43 => 8,  40 => 7,  36 => 6,  31 => 5,  28 => 4,  25 => 3,  21 => 2,  19 => 1,);
    }
}

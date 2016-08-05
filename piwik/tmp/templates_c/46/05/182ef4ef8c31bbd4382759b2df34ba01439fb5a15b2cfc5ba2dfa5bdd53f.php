<?php

/* @Live/_dataTableViz_visitorLog.twig */
class __TwigTemplate_4605182ef4ef8c31bbd4382759b2df34ba01439fb5a15b2cfc5ba2dfa5bdd53f extends Twig_Template
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
        $context["displayVisitorsInOwnColumn"] = (((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) ? (false) : (true));
        // line 2
        $context["displayReferrersInOwnColumn"] = (($this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "smallWidth", array())) ? (false) : (true));
        // line 3
        echo "<table class=\"dataTable\" cellspacing=\"0\" width=\"100%\" style=\"width:100%;table-layout:fixed;\">
<thead>
<tr>
    <th style=\"display:none;\"></th>
    <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;width:190px;\" width=\"190px\">
        <div id=\"thDIV\">";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Date")), "html", null, true);
        echo "</div>
    </th>
    ";
        // line 10
        if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
            // line 11
            echo "        <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;width:225px;\" width=\"225px\">
            <div id=\"thDIV\">";
            // line 12
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Visitors")), "html", null, true);
            echo "</div>
        </th>
    ";
        }
        // line 15
        echo "    ";
        if ((isset($context["displayReferrersInOwnColumn"]) ? $context["displayReferrersInOwnColumn"] : $this->getContext($context, "displayReferrersInOwnColumn"))) {
            // line 16
            echo "    <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;width:230px;\" width=\"230px\">
        <div id=\"thDIV\">";
            // line 17
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_Referrer_URL")), "html", null, true);
            echo "</div>
    </th>
    ";
        }
        // line 20
        echo "    <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;\">
        <div id=\"thDIV\">";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnNbActions")), "html", null, true);
        echo "</div>
    </th>
</tr>
</thead>
<tbody>
";
        // line 26
        $context["cycleIndex"] = 0;
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getRows", array(), "method"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["visitor"]) {
            // line 28
            echo "    ";
            $context["breakBeforeVisitorRank"] = ((($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatusIcon"), "method") && $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method"))) ? (true) : (false));
            // line 29
            echo "    ";
            ob_start();
            // line 30
            echo "        ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "countryFlag"), "method")) {
                echo "<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "countryFlag"), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "location"), "method"), "html", null, true);
                echo ", Provider ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerName"), "method"), "html", null, true);
                echo "\"/>";
            }
            // line 31
            echo "        &nbsp;
        ";
            // line 32
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "plugins"), "method")) {
                // line 33
                echo "            ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "browserIcon"), "method")) {
                    echo "<img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "browserIcon"), "method"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_BrowserWithPluginsEnabled", $this->getAttribute($context["visitor"], "getColumn", array(0 => "browserName"), "method"), $this->getAttribute($context["visitor"], "getColumn", array(0 => "plugins"), "method"))), "html", null, true);
                    echo "\"/>";
                }
                // line 34
                echo "        ";
            } else {
                // line 35
                echo "            ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "browserIcon"), "method")) {
                    echo "<img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "browserIcon"), "method"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_BrowserWithNoPluginsEnabled", $this->getAttribute($context["visitor"], "getColumn", array(0 => "browserName"), "method"))), "html", null, true);
                    echo "\"/>";
                }
                // line 36
                echo "        ";
            }
            // line 37
            echo "        ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "operatingSystemIcon"), "method")) {
                echo "&nbsp;
        <img src=\"";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "operatingSystemIcon"), "method"), "html", null, true);
                echo "\"
             title=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "operatingSystem"), "method"), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "resolution"), "method"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "screenType"), "method"), "html", null, true);
                echo ")\"/>";
            }
            // line 40
            echo "        ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method")) {
                // line 41
                echo "            ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method")) {
                    echo "&nbsp;-
            <img src=\"";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method"), "html", null, true);
                    echo "\"
                 title=\"";
                    // line 43
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReturningVisitor")), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitCount"), "method"))), "html", null, true);
                    echo "\"/>";
                }
                // line 44
                echo "        ";
            }
            // line 45
            echo "        ";
            if (((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) || (isset($context["breakBeforeVisitorRank"]) ? $context["breakBeforeVisitorRank"] : $this->getContext($context, "breakBeforeVisitorRank")))) {
                echo "<br/><br />";
            }
            // line 46
            echo "        ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitConverted"), "method")) {
                // line 47
                echo "            <span title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitConvertedNGoals", $this->getAttribute($context["visitor"], "getColumn", array(0 => "goalConversions"), "method"))), "html", null, true);
                echo "\" class='visitorRank'
                  ";
                // line 48
                if (((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) || (isset($context["breakBeforeVisitorRank"]) ? $context["breakBeforeVisitorRank"] : $this->getContext($context, "breakBeforeVisitorRank")))) {
                    echo "style=\"margin-left:0;\"";
                }
                echo ">
            <img src=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitConvertedIcon"), "method"), "html", null, true);
                echo "\"/>
            <span class='hash'>#</span>
            ";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "goalConversions"), "method"), "html", null, true);
                echo "
            ";
                // line 52
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatusIcon"), "method")) {
                    // line 53
                    echo "                &nbsp;-
                <img src=\"";
                    // line 54
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatusIcon"), "method"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatus"), "method"), "html", null, true);
                    echo "\"/>
            ";
                }
                // line 56
                echo "            </span>
        ";
            }
            // line 58
            echo "        ";
            if ((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn")))) {
                echo "<br/><br />";
            }
            // line 59
            echo "        ";
            if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                // line 60
                echo "            ";
                if ((twig_length_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "pluginsIcons"), "method")) > 0)) {
                    // line 61
                    echo "                <hr/>
                ";
                    // line 62
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
                    echo ":
                ";
                    // line 63
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["visitor"], "getColumn", array(0 => "pluginsIcons"), "method"));
                    foreach ($context['_seq'] as $context["_key"] => $context["pluginIcon"]) {
                        // line 64
                        echo "                    <img src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["pluginIcon"], "pluginIcon", array()), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["pluginIcon"], "pluginName", array()), true), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["pluginIcon"], "pluginName", array()), true), "html", null, true);
                        echo "\"/>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pluginIcon'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 66
                    echo "            ";
                }
                // line 67
                echo "        ";
            }
            // line 68
            echo "    ";
            $context["visitorColumnContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 69
            echo "
    ";
            // line 70
            ob_start();
            // line 71
            echo "    <div class=\"referrer\">
        ";
            // line 72
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "website")) {
                // line 73
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_ColumnWebsite")), "html", null, true);
                echo ":
            <a href=\"";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                echo "\" target=\"_blank\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                echo "\"
               style=\"text-decoration:underline;\">
                ";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "
            </a>
        ";
            }
            // line 79
            echo "        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "campaign")) {
                // line 80
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_ColumnCampaign")), "html", null, true);
                echo "
            <br/>
            ";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "
            ";
                // line 83
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method")))) {
                    echo " - ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                }
                // line 84
                echo "        ";
            }
            // line 85
            echo "        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "search")) {
                // line 86
                $context["keywordNotDefined"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotDefined", call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnKeyword"))));
                // line 87
                $context["showKeyword"] = ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"))) && ($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method") != (isset($context["keywordNotDefined"]) ? $context["keywordNotDefined"] : $this->getContext($context, "keywordNotDefined"))));
                // line 88
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "searchEngineIcon"), "method")) {
                    // line 89
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "searchEngineIcon"), "method"), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                    echo "\"/>
            ";
                }
                // line 91
                echo "            <span ";
                if ((!(isset($context["showKeyword"]) ? $context["showKeyword"] : $this->getContext($context, "showKeyword")))) {
                    echo "title=\"";
                    echo twig_escape_filter($this->env, (isset($context["keywordNotDefined"]) ? $context["keywordNotDefined"] : $this->getContext($context, "keywordNotDefined")), "html", null, true);
                    echo "\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "</span>
            ";
                // line 92
                if ((isset($context["showKeyword"]) ? $context["showKeyword"] : $this->getContext($context, "showKeyword"))) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Keywords")), "html", null, true);
                    echo ":
                <br/>
                <a href=\"";
                    // line 94
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                    echo "\" target=\"_blank\" style=\"text-decoration:underline;\">
                    \"";
                    // line 95
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                    echo "\"</a>
            ";
                }
                // line 97
                echo "            ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                $context["keyword"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 98
                echo "            ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                $context["searchName"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 99
                echo "            ";
                ob_start();
                echo "#";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeywordPosition"), "method"), "html", null, true);
                $context["position"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 100
                echo "            ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeywordPosition"), "method")) {
                    // line 101
                    echo "                <span title='";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_KeywordRankedOnSearchResultForThisVisitor", (isset($context["keyword"]) ? $context["keyword"] : $this->getContext($context, "keyword")), (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), (isset($context["searchName"]) ? $context["searchName"] : $this->getContext($context, "searchName")))), "html", null, true);
                    echo "' class='visitorRank'>
                                <span class='hash'>#</span>
                    ";
                    // line 103
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeywordPosition"), "method"), "html", null, true);
                    echo "
                            </span>
            ";
                }
                // line 106
                echo "        ";
            }
            // line 107
            echo "        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "direct")) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DirectEntry")), "html", null, true);
            }
            // line 108
            echo "    </div>
    ";
            $context["referrerColumnContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 110
            echo "
    ";
            // line 111
            ob_start();
            // line 112
            echo "        <tr class=\"label";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), (isset($context["cycleIndex"]) ? $context["cycleIndex"] : $this->getContext($context, "cycleIndex"))), "html", null, true);
            echo "\">
        ";
            // line 113
            $context["cycleIndex"] = ((isset($context["cycleIndex"]) ? $context["cycleIndex"] : $this->getContext($context, "cycleIndex")) + 1);
            // line 114
            echo "            <td style=\"display:none;\"></td>
            <td class=\"label\">
                <strong title=\"";
            // line 116
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorType"), "method") == "new")) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewVisitor")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorsLastVisit", $this->getAttribute($context["visitor"], "getColumn", array(0 => "daysSinceLastVisit"), "method"))), "html", null, true);
            }
            echo "\">
                    ";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "serverDatePrettyFirstAction"), "method"), "html", null, true);
            echo "
                    ";
            // line 118
            if ((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) {
                echo "<br/>";
            } else {
                echo "-";
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "serverTimePrettyFirstAction"), "method"), "html", null, true);
            echo "</strong>
                ";
            // line 119
            if ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitIp"), "method")))) {
                // line 120
                echo "                    <br/>
                <span title=\"";
                // line 121
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method")))) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_UserId")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method");
                }
                // line 122
                echo "
";
                // line 123
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method")))) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitorID")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
                }
                // line 124
                if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "latitude"), "method") || $this->getAttribute($context["visitor"], "getColumn", array(0 => "longitude"), "method"))) {
                    // line 125
                    echo "
";
                    // line 126
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "location"), "method"), "html", null, true);
                    echo "

GPS (lat/long): ";
                    // line 128
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "latitude"), "method"), "html", null, true);
                    echo ",";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "longitude"), "method"), "html", null, true);
                }
                echo "\">
                    IP: ";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitIp"), "method"), "html", null, true);
                echo "
                    ";
                // line 130
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method")))) {
                    echo "<br/><br/>";
                    echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method");
                }
                // line 131
                echo "
                    </span>";
            }
            // line 133
            echo "
                ";
            // line 134
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "provider"), "method")) {
                // line 135
                echo "                    <br/>
                    ";
                // line 136
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Provider_ColumnProvider")), "html", null, true);
                echo ":
                    <a href=\"";
                // line 137
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerUrl"), "method"), "html", null, true);
                echo "\" target=\"_blank\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerUrl"), "method"), "html", null, true);
                echo "\" style=\"text-decoration:underline;\">
                        ";
                // line 138
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerName"), "method"), "html", null, true);
                echo "
                    </a>
                ";
            }
            // line 141
            echo "                ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "customVariables"), "method")) {
                // line 142
                echo "                    <br/>
                    ";
                // line 143
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["visitor"], "getColumn", array(0 => "customVariables"), "method"));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 144
                    echo "                        ";
                    $context["name"] = ("customVariableName" . $context["id"]);
                    // line 145
                    echo "                        ";
                    $context["value"] = ("customVariableValue" . $context["id"]);
                    // line 146
                    echo "                        <br/>
                        <acronym title=\"";
                    // line 147
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                    echo " (index ";
                    echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                    echo ")\">
                            ";
                    // line 148
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute($context["customVariable"], (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array"), 30)), "html", null, true);
                    echo "
                        </acronym>
                    ";
                    // line 150
                    if ((twig_length_filter($this->env, $this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array")) > 0)) {
                        echo ": ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array"), 50)), "html", null, true);
                    }
                    // line 151
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 152
                echo "                ";
            }
            // line 153
            echo "                ";
            if ((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn")))) {
                // line 154
                echo "                    <br/>
                    ";
                // line 155
                echo twig_escape_filter($this->env, (isset($context["visitorColumnContent"]) ? $context["visitorColumnContent"] : $this->getContext($context, "visitorColumnContent")), "html", null, true);
                echo "
                ";
            }
            // line 157
            echo "                ";
            if ((!(isset($context["displayReferrersInOwnColumn"]) ? $context["displayReferrersInOwnColumn"] : $this->getContext($context, "displayReferrersInOwnColumn")))) {
                // line 158
                echo "                    <br/>
                    ";
                // line 159
                echo twig_escape_filter($this->env, (isset($context["referrerColumnContent"]) ? $context["referrerColumnContent"] : $this->getContext($context, "referrerColumnContent")), "html", null, true);
                echo "
                ";
            }
            // line 161
            echo "            </td>

            ";
            // line 163
            if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                // line 164
                echo "                <td class=\"label\">
                    ";
                // line 165
                echo twig_escape_filter($this->env, (isset($context["visitorColumnContent"]) ? $context["visitorColumnContent"] : $this->getContext($context, "visitorColumnContent")), "html", null, true);
                echo "
                </td>
            ";
            }
            // line 168
            echo "
            ";
            // line 169
            if ((isset($context["displayReferrersInOwnColumn"]) ? $context["displayReferrersInOwnColumn"] : $this->getContext($context, "displayReferrersInOwnColumn"))) {
                // line 170
                echo "                <td class=\"column\">
                    ";
                // line 171
                echo twig_escape_filter($this->env, (isset($context["referrerColumnContent"]) ? $context["referrerColumnContent"] : $this->getContext($context, "referrerColumnContent")), "html", null, true);
                echo "
                </td>
            ";
            }
            // line 174
            echo "
            <td class=\"column ";
            // line 175
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitConverted"), "method") && (!(isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))))) {
                echo "highlightField";
            }
            echo "\">
                <div class=\"visitor-log-page-list\">
                    ";
            // line 177
            if ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method")))) {
                // line 178
                echo "                    <a class=\"visitor-log-visitor-profile-link\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                echo "\" data-visitor-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
                echo "\">
                        <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/> <span>";
                // line 179
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                // line 180
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method")))) {
                    echo ": ";
                    echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method");
                }
                echo "</span>
                    </a>
                    ";
            }
            // line 183
            echo "                    <strong>
                        ";
            // line 184
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method")), "html", null, true);
            echo "
                        ";
            // line 185
            if ((twig_length_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method")) <= 1)) {
                // line 186
                echo "                            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Action")), "html", null, true);
                echo "
                        ";
            } else {
                // line 188
                echo "                            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
                echo "
                        ";
            }
            // line 190
            echo "                        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitDuration"), "method") > 0)) {
                echo "- ";
                echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitDurationPretty"), "method");
            }
            // line 191
            echo "                    </strong>
                    <br/>
                    <ol class='visitorLog'>
                        ";
            // line 194
            $this->env->loadTemplate("@Live/_actionsList.twig")->display(array_merge($context, array("actionDetails" => $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method"))));
            // line 195
            echo "                    </ol>
                </div>
            </td>
        </tr>
    ";
            $context["visitorRow"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 200
            echo "
    ";
            // line 201
            if (((!$this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "filterEcommerce", array())) || $this->getAttribute($context["visitor"], "getMetadata", array(0 => "hasEcommerce"), "method"))) {
                // line 202
                echo "        ";
                echo twig_escape_filter($this->env, (isset($context["visitorRow"]) ? $context["visitorRow"] : $this->getContext($context, "visitorRow")), "html", null, true);
                echo "
    ";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 205
        echo "
</tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "@Live/_dataTableViz_visitorLog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  696 => 205,  678 => 202,  676 => 201,  673 => 200,  666 => 195,  664 => 194,  659 => 191,  653 => 190,  647 => 188,  641 => 186,  639 => 185,  635 => 184,  632 => 183,  623 => 180,  621 => 179,  614 => 178,  612 => 177,  605 => 175,  602 => 174,  596 => 171,  593 => 170,  591 => 169,  588 => 168,  582 => 165,  579 => 164,  577 => 163,  573 => 161,  568 => 159,  565 => 158,  562 => 157,  557 => 155,  554 => 154,  551 => 153,  548 => 152,  542 => 151,  537 => 150,  532 => 148,  526 => 147,  523 => 146,  520 => 145,  517 => 144,  513 => 143,  510 => 142,  507 => 141,  501 => 138,  495 => 137,  491 => 136,  488 => 135,  486 => 134,  483 => 133,  479 => 131,  474 => 130,  470 => 129,  463 => 128,  458 => 126,  455 => 125,  453 => 124,  447 => 123,  444 => 122,  438 => 121,  435 => 120,  433 => 119,  423 => 118,  419 => 117,  411 => 116,  407 => 114,  405 => 113,  400 => 112,  398 => 111,  395 => 110,  391 => 108,  386 => 107,  383 => 106,  377 => 103,  371 => 101,  368 => 100,  362 => 99,  357 => 98,  352 => 97,  347 => 95,  343 => 94,  337 => 92,  326 => 91,  318 => 89,  316 => 88,  314 => 87,  312 => 86,  309 => 85,  306 => 84,  301 => 83,  297 => 82,  291 => 80,  288 => 79,  282 => 76,  275 => 74,  270 => 73,  268 => 72,  265 => 71,  263 => 70,  260 => 69,  257 => 68,  254 => 67,  251 => 66,  238 => 64,  234 => 63,  230 => 62,  227 => 61,  224 => 60,  221 => 59,  216 => 58,  212 => 56,  205 => 54,  202 => 53,  200 => 52,  196 => 51,  191 => 49,  185 => 48,  180 => 47,  177 => 46,  172 => 45,  169 => 44,  163 => 43,  159 => 42,  154 => 41,  151 => 40,  143 => 39,  139 => 38,  134 => 37,  131 => 36,  122 => 35,  119 => 34,  110 => 33,  108 => 32,  105 => 31,  94 => 30,  91 => 29,  88 => 28,  71 => 27,  69 => 26,  61 => 21,  58 => 20,  52 => 17,  49 => 16,  46 => 15,  40 => 12,  37 => 11,  35 => 10,  30 => 8,  23 => 3,  21 => 2,  19 => 1,);
    }
}

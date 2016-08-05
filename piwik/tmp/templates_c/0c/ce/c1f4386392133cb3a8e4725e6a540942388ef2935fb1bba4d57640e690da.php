<?php

/* @Goals/_formAddGoal.twig */
class __TwigTemplate_0ccec1f4386392133cb3a8e4725e6a540942388ef2935fb1bba4d57640e690da extends Twig_Template
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
        echo "<div class='entityAddContainer' style=\"display:none;\">
    <form>
        <table class=\"dataTable entityTable\">
            <thead>
            <tr class=\"first\">
                <th colspan=\"2\">";
        // line 6
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AddNewGoal")), "html", null, true);
        echo "</th>
            <tr>
            </thead>
            <tbody>
            <tr>
                <td class=\"first\">";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalName")), "html", null, true);
        echo " </td>
                <td><input type=\"text\" name=\"name\" value=\"\" size=\"28\" id=\"goal_name\" class=\"inp\"/></td>
            </tr>
            <tr>
                <td style='width:260px;' class=\"first\">";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalIsTriggered")), "html", null, true);
        echo "
                    <select name=\"trigger_type\" class=\"inp\">
                        <option value=\"visitors\">";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhenVisitors")), "html", null, true);
        echo "</option>
                        <option value=\"manually\">";
        // line 18
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Manually")), "html", null, true);
        echo "</option>
                    </select>
                </td>
                <td>
                    <input type=\"radio\" id=\"match_attribute_url\" value=\"url\" name=\"match_attribute\"/>
                    <label for=\"match_attribute_url\">";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_VisitUrl")), "html", null, true);
        echo "</label>
                    <br/>
                    <input type=\"radio\" id=\"match_attribute_title\" value=\"title\" name=\"match_attribute\"/>
                    <label for=\"match_attribute_title\">";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_VisitPageTitle")), "html", null, true);
        echo "</label>
                    <br/>
                    <input type=\"radio\" id=\"match_attribute_event\" value=\"event\" name=\"match_attribute\"/>
                    <label for=\"match_attribute_event\">";
        // line 29
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_SendEvent")), "html", null, true);
        echo "</label>
                    <br/>
                    <input type=\"radio\" id=\"match_attribute_file\" value=\"file\" name=\"match_attribute\"/>
                    <label for=\"match_attribute_file\">";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Download")), "html", null, true);
        echo "</label>
                    <br/>
                    <input type=\"radio\" id=\"match_attribute_external_website\" value=\"external_website\" name=\"match_attribute\"/>
                    <label for=\"match_attribute_external_website\">";
        // line 35
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ClickOutlink")), "html", null, true);
        echo "</label>
                </td>
            </tr>
            </tbody>
            <tbody id=\"match_attribute_section\">
            <tr>
                <td class=\"first\">";
        // line 41
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhereThe")), "html", null, true);
        echo " <span class=\"whereUrl\" id=\"match_attribute_name\"></span><select name=\"event_type\" class=\"whereEvent inp\">
                        <option value=\"event_category\">";
        // line 42
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventCategory")), "html", null, true);
        echo "</option>
                        <option value=\"event_action\">";
        // line 43
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventAction")), "html", null, true);
        echo "</option>
                        <option value=\"event_name\">";
        // line 44
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventName")), "html", null, true);
        echo "</option>
                    </select></td>
                <td>
                    <select name=\"pattern_type\" class=\"inp\">
                        <option value=\"contains\">";
        // line 48
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "")), "html", null, true);
        echo "</option>
                        <option value=\"exact\">";
        // line 49
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "")), "html", null, true);
        echo "</option>
                        <option value=\"regex\">";
        // line 50
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "")), "html", null, true);
        echo "</option>
                    </select>

                    ";
        // line 53
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Pattern")), "html", null, true);
        echo "

                    <input type=\"text\" name=\"pattern\" value=\"\" size=\"16\" class=\"inp\"/>
                    <br/>

                    <div id=\"examples_pattern\" class=\"entityInlineHelp\"></div>
                    <br/>
\t\t\t\t<span style=\"float:right;\">
                    ";
        // line 61
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html", null, true);
        echo " <input type=\"checkbox\" id=\"case_sensitive\"/>
                    <label for=\"case_sensitive\">";
        // line 62
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_CaseSensitive")), "html", null, true);
        echo "</label>
\t\t\t\t</span>
                </td>
            </tr>
            </tbody>
            <tbody id=\"manual_trigger_section\" style=\"display:none;\">
            <tr>
                <td colspan=\"2\" class=\"first\">
                    ";
        // line 70
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhereVisitedPageManuallyCallsJavascriptTrackerLearnMore", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/javascript-tracking/%23toc-manually-trigger-a-conversion-for-a-goal'>", "</a>"));
        echo "
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td class=\"first\"> ";
        // line 76
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AllowMultipleConversionsPerVisit")), "html", null, true);
        echo " </td>
                <td>
                    <input type=\"radio\" id=\"allow_multiple_0\" value=\"0\" name=\"allow_multiple\"/>
                    <label for=\"allow_multiple_0\">";
        // line 79
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultGoalConvertedOncePerVisit")), "html", null, true);
        echo "</label>

                    <div class=\"entityInlineHelp\">
                        ";
        // line 82
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_HelpOneConversionPerVisit")), "html", null, true);
        echo "
                    </div>
                    <br/>

                    <input type=\"radio\" id=\"allow_multiple_1\" value=\"1\" name=\"allow_multiple\"/>
                    <label for=\"allow_multiple_1\">";
        // line 87
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AllowGoalConvertedMoreThanOncePerVisit")), "html", null, true);
        echo "</label>
                    <br/><br/>
            </tr>
            <tr>
            </tbody>
            <tbody>
            <tr>
                <td class=\"first\">";
        // line 94
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultRevenue")), "html", null, true);
        echo "</td>
                <td>";
        // line 95
        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array(" <input type=\"text\" name=\"revenue\" size=\"2\" value=\"0\" class=\"inp\" /> ", (isset($context["idSite"]) ? $context["idSite"] : $this->getContext($context, "idSite"))));
        echo "
                    <div class=\"entityInlineHelp\"> ";
        // line 96
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultRevenueHelp")), "html", null, true);
        echo " </div>
                </td>
            </tr>
            <tr>
            </tbody>
        </table>
        <input type=\"hidden\" name=\"methodGoalAPI\" value=\"\"/>
        <input type=\"hidden\" name=\"goalIdUpdate\" value=\"\"/>
        <input type=\"submit\" value=\"\" name=\"submit\" id=\"goal_submit\" class=\"submit\"/>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Goals/_formAddGoal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 96,  195 => 95,  189 => 94,  179 => 87,  171 => 82,  165 => 79,  159 => 76,  150 => 70,  139 => 62,  135 => 61,  124 => 53,  118 => 50,  114 => 49,  110 => 48,  103 => 44,  99 => 43,  95 => 42,  91 => 41,  82 => 35,  76 => 32,  70 => 29,  64 => 26,  58 => 23,  50 => 18,  46 => 17,  41 => 15,  34 => 11,  26 => 6,  19 => 1,);
    }
}

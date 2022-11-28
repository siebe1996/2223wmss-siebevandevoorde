<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* home.twig */
class __TwigTemplate_fe97111e8c5197b51b9e5b38ac132228 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pageContent' => [$this, 'block_pageContent'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "main.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("main.twig", "home.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_pageContent($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"col-sm-offset-2 col-sm-8\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                Nieuwe taak
            </div>
            <div class=\"panel-body\">
                ";
        // line 9
        if (($context["errors"] ?? null)) {
            // line 10
            echo "                <!-- Display Validation Errors -->
                ";
            // line 11
            $this->loadTemplate("errors.twig", "home.twig", 11)->display($context);
            // line 12
            echo "                ";
        }
        // line 13
        echo "                <!-- New Task Form -->
                <form action=";
        // line 14
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo " method=\"POST\" class=\"form-horizontal\">
                    <!-- Task Name -->
                    <div class=\"form-group\">
                        <label for=\"what\" class=\"col-sm-3 control-label\">Taak</label>
                        <div class=\"col-sm-9\">
                            <input type=\"text\" name=\"what\" id=\"what\" class=\"form-control\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["what"] ?? null), "html", null, true);
        echo "\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"priority\" class=\"col-sm-3 control-label\">Prioriteit</label>
                        <div class=\"col-sm-9\">
                            <select name=\"priority\" id=\"priority\" class=\"form-control\">
                                ";
        // line 26
        if ((twig_length_filter($this->env, ($context["priorities"] ?? null)) < 0)) {
            // line 27
            echo "                                    <option value=\"wrong\">something went wrong</option>
                                ";
        }
        // line 29
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["priorities"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 30
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\"  ";
            if (($context["value"] == ($context["priority"] ?? null))) {
                echo " selected=\"selected\" ";
            }
            echo " >";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "                            </select>
                        </div>
                    </div>
                    <input type=\"hidden\" name=\"moduleAction\" value=\"add\" />
                    <!-- Add Task Button -->
                    <div class=\"form-group\">
                        <div class=\"col-sm-offset-3 col-sm-6\">
                            <button type=\"submit\" class=\"btn btn-default\">
                                <i class=\"fa fa-btn fa-plus\"></i>Voeg taak toe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Current Tasks -->
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                Huidige taken
            </div>
            <div class=\"panel-body\">

                <table class=\"table table-striped task-table\" >
                    <thead>
                    <tr>
                        <th class=\"col-sm-8\">Taak</th>
                        <th class=\"col-sm-2\">&nbsp;</th>
                        <th class=\"col-sm-2\">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tasks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 65
            echo "
                        <tr>
                            <td class=\"table-text\">
                                <div class=\"item ";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "priority", [], "any", false, false, false, 68), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "name", [], "any", false, false, false, 68), "html", null, true);
            echo "</div>
                            </td>
                            <td>
                                <a class=\"btn btn-primary\" href=";
            // line 71
            echo twig_escape_filter($this->env, ((($context["edit"] ?? null) . "?id=") . twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 71)), "html", null, true);
            echo " role=\"button\">
                                    <i class=\"fa fa-btn fa-pencil\"></i>Wijzigen
                                </a>
                            </td>
                            <td>
                                <a class=\"btn btn-danger\" href=";
            // line 76
            echo twig_escape_filter($this->env, ((($context["delete"] ?? null) . "?id=") . twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 76)), "html", null, true);
            echo " role=\"button\">
                                    <i class=\"fa fa-btn fa-trash\"></i>Verwijderen
                                </a>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 82,  174 => 76,  166 => 71,  158 => 68,  153 => 65,  149 => 64,  115 => 32,  100 => 30,  95 => 29,  91 => 27,  89 => 26,  79 => 19,  71 => 14,  68 => 13,  65 => 12,  63 => 11,  60 => 10,  58 => 9,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home.twig", "/var/www/resources/templates/home.twig");
    }
}

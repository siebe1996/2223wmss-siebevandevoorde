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

/* edit2.twig */
class __TwigTemplate_11be021c1c833c69f42aec1d8b52a7d3 extends Template
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
        return "main2.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("main2.twig", "edit2.twig", 1);
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
                Taak wijzigen
            </div>
            <div class=\"panel-body\">
                ";
        // line 9
        if (($context["errors"] ?? null)) {
            // line 10
            echo "                    <!-- Display Validation Errors -->
                    ";
            // line 11
            $this->loadTemplate("errors.twig", "edit2.twig", 11)->display($context);
            // line 12
            echo "                ";
        }
        // line 13
        echo "                <!-- Task Edit Form -->
                <form action=";
        // line 14
        echo twig_escape_filter($this->env, ($context["edit"] ?? null), "html", null, true);
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
                    <input type=\"hidden\" name=\"moduleAction\" value=\"edit\" />
                    <input type=\"hidden\" name=\"id\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" />
                    <!-- Add Task Button -->
                    <div class=\"form-group\">
                        <div class=\"col-sm-offset-3 col-sm-6\">
                            <button type=\"submit\" class=\"btn btn-default\">
                                <i class=\"fa fa-btn fa-pencil\"></i>Taak wijzigen
                            </button>
                        </div>
                    </div>
                </form>
                <p class=\"text-left\"><a href=";
        // line 46
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo ">Annuleren en terug naar overzicht</a></p>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "edit2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 46,  121 => 36,  115 => 32,  100 => 30,  95 => 29,  91 => 27,  89 => 26,  79 => 19,  71 => 14,  68 => 13,  65 => 12,  63 => 11,  60 => 10,  58 => 9,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "edit2.twig", "/var/www/resources/templates/edit2.twig");
    }
}

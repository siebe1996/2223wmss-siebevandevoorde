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

/* delete.twig */
class __TwigTemplate_9ecdb6ae5ff5e8d6dbde4dc0f71b2d78 extends Template
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
        $this->parent = $this->loadTemplate("main.twig", "delete.twig", 1);
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
                Taak verwijderen
            </div>
            <div class=\"panel-body\">
                <!-- Task Delete Form -->
                <form action=";
        // line 10
        echo twig_escape_filter($this->env, ($context["delete"] ?? null), "html", null, true);
        echo " method=\"POST\" class=\"form-horizontal\">
                    <!-- Task Name -->
                    <div class=\"form-group\">
                        <div class=\"col-sm-12\">
                            <p>Weet je zeker dat je taak <strong>";
        // line 14
        echo twig_escape_filter($this->env, ($context["what"] ?? null), "html", null, true);
        echo "</strong> wil verwijderen?</p>
                        </div>
                    </div>
                    <input type=\"hidden\" name=\"moduleAction\" value=\"delete\" />
                    <input type=\"hidden\" name=\"id\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" />
                    <!-- Add Task Button -->
                    <div class=\"form-group\">
                        <div class=\"col-sm-12\">
                            <button type=\"submit\" class=\"btn btn-default\" id=\"btn-delete\">
                                <i class=\"fa fa-btn fa-trash\"></i>Taak verwijderen
                            </button>
                        </div>
                    </div>
                </form>
                <p class=\"text-left\"><a href=\"";
        // line 28
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo "\">Annuleren en terug naar overzicht</a></p>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "delete.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 28,  73 => 18,  66 => 14,  59 => 10,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "delete.twig", "/var/www/resources/templates/delete.twig");
    }
}

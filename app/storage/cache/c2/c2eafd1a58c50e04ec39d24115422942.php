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

/* login2.twig */
class __TwigTemplate_cef7bcd9bc0b309b9796d1153ff5223c extends Template
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
        $this->parent = $this->loadTemplate("main2.twig", "login2.twig", 1);
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
                Inloggen
            </div>
            <div class=\"panel-body\">
                ";
        // line 9
        if (($context["errors"] ?? null)) {
            // line 10
            echo "                    <!-- Display Validation Errors -->
                    ";
            // line 11
            $this->loadTemplate("errors.twig", "login2.twig", 11)->display($context);
            // line 12
            echo "                ";
        }
        // line 13
        echo "                <!-- Task Edit Form -->
                <form action=\"login.php\" method=\"POST\" class=\"form-horizontal\">
                    <!-- Task Name -->
                    <div class=\"form-group\">
                        <label for=\"username\" class=\"col-sm-3 control-label\">Gebruikernaam</label>
                        <div class=\"col-sm-9\">
                            <input type=\"text\" name=\"username\" id=\"username\" class=\"form-control\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"password\" class=\"col-sm-3 control-label\">Paswoord</label>
                        <div class=\"col-sm-9\">
                            <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\" value=\"\">
                        </div>
                    </div>
                    <input type=\"hidden\" name=\"moduleAction\" value=\"login\" />
                    <!-- Add Task Button -->
                    <div class=\"form-group\">
                        <div class=\"col-sm-offset-3 col-sm-6\">
                            <button type=\"submit\" class=\"btn btn-default\">
                                Inloggen
                            </button>
                        </div>
                    </div>
                </form>
                <p class=\"text-left\">";
        // line 38
        echo twig_escape_filter($this->env, ($context["lastLogin"] ?? null), "html", null, true);
        echo "</p>
                <a href=\"register.php\">Register here</a> if you don't have an account yet
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "login2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 38,  76 => 19,  68 => 13,  65 => 12,  63 => 11,  60 => 10,  58 => 9,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login2.twig", "/var/www/resources/templates/login2.twig");
    }
}

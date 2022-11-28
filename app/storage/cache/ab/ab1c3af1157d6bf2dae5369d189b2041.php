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

/* main2.twig */
class __TwigTemplate_7d44b508656005736fb143347ace6e20 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'pageContent' => [$this, 'block_pageContent'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"nl\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Mijn takenlijst</title>
    <!-- Fonts -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css\" rel='stylesheet' type='text/css'>
    <link href=\"https://fonts.googleapis.com/css?family=Lato:100,300,400,700\" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"css/tasks.css\" rel=\"stylesheet\">
</head>
<body id=\"app-layout\">
<nav class=\"navbar navbar-default\">
    <div class=\"container\">
        <div class=\"navbar-header\"><!-- Just an image -->
            <a class=\"navbar-brand\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo "\"><img src=\"img/ikdoeict.png\" height=\"20\" alt=\"ikdoeict alt logo\"></a>
            <a class=\"navbar-brand\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo "\">Mijn takenlijst</a>
        </div>
        <!-- Weer te geven indien ingelogd -->
        ";
        // line 23
        if (($context["loggedIn"] ?? null)) {
            // line 24
            echo "        <form class=\"navbar-form navbar-right\" method=\"post\" action=\"logout.php\">
            <button type=\"submit\" class=\"btn btn-default\">Uitloggen</button>
        </form>
        ";
        } else {
            // line 28
            echo "        <!-- Weer te geven indien niet ingelogd -->
        <ul class=\"nav navbar-nav navbar-right\">
            <li><a href=\"login.php\">Inloggen</a></li>
        </ul>
        ";
        }
        // line 33
        echo "    </div>
</nav>
<div class=\"container\">
    ";
        // line 36
        $this->displayBlock('pageContent', $context, $blocks);
        // line 39
        echo "</div>
<footer class=\"footer mt-auto py-3\">
    <div class=\"container\">
        <span class=\"text-muted\">&copy; 2020 Odisee &mdash; Opleiding Elektronica-ICT &mdash; Server-side Web Scripting</span>
    </div>
</footer>
<!-- JavaScripts -->
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
<script src=\"js/index.js\"></script>
</body>";
    }

    // line 36
    public function block_pageContent($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        echo "        <p>This is the pageContent</p>
    ";
    }

    public function getTemplateName()
    {
        return "main2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 37,  104 => 36,  90 => 39,  88 => 36,  83 => 33,  76 => 28,  70 => 24,  68 => 23,  62 => 20,  58 => 19,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main2.twig", "/var/www/resources/templates/main2.twig");
    }
}

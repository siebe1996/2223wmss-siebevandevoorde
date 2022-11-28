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

/* main.twig */
class __TwigTemplate_ab7293d23f7d8150fa1018fb4d79c3cf extends Template
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
            <a class=\"navbar-brand\" href=";
        // line 19
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo "><img src=\"img/ikdoeict.png\" height=\"20\" alt=\"ikdoeict alt logo\"></a>
            <a class=\"navbar-brand\" href=";
        // line 20
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo ">Mijn takenlijst</a>
        </div>
        <!-- Weer te geven indien niet ingelogd -->
        <ul class=\"nav navbar-nav navbar-right\">
            <li><a href=\"login.php\">Inloggen</a></li>
        </ul>
    </div>
</nav>
<div class=\"container\">
    ";
        // line 29
        $this->displayBlock('pageContent', $context, $blocks);
        // line 32
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

    // line 29
    public function block_pageContent($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "        <p>This is the pageContent</p>
    ";
    }

    public function getTemplateName()
    {
        return "main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 30,  90 => 29,  76 => 32,  74 => 29,  62 => 20,  58 => 19,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.twig", "/var/www/resources/templates/main.twig");
    }
}

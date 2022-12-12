<?php
require_once ('../../vendor/autoload.php');

$router = new \Bramus\Router\Router();
//$router->setNamespace('\Controllers');

$router = new \Bramus\Router\Router();

$router->get('/', function (){header('Location: companies');});
$router->get('companies', 'DashboardController08@showAll');
/*$router->post('/companies/search', function() {
    $term = (isset($_POST['search'])? $_POST['search'] : '');
    header('Location: search/' . urlencode($term));
    exit();
});*/
$router->get('/companies/search/([A-Za-z0-9+]+)', 'DashboardController08@show');

$router->post('companies/search', 'DashboardController08@showResults');
$router->get('companies/create', 'DashboardController08@form');
$router->post('companies/create', 'DashboardController08@add');
$router->get('companies/save', 'DashboardController08@save');
$router->get('login', 'DashboardController08@showLogin');
$router->post('login', 'DashboardController08@login');
$router->get('logout', 'DashboardController08@logout');
$router->post('register', 'DashboardController08@register');


$router->run();
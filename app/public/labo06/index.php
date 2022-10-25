<?php

/**
 * Lab 06 — Start from this version
 * Tasklist
 * @author <your name>
 */

require_once ('../../vendor/autoload.php');
require_once ('../../config/database.php');
require_once ('../../src/Services/DatabaseConnector.php');

// Fetch database connection

$connectionParams = [
    'host' => DB_HOST,
    'dbname' => DB_NAME,
    'user' => DB_USER,
    'password' => DB_PASS,
    'driver' => 'pdo_mysql',
    'charset' => 'utf8mb4'
];

$conn = \Services\DatabaseConnector::getConnection($connectionParams);

// Bootstrap Twig

$loader = new  \Twig\Loader\FilesystemLoader(__DIR__.'/../../resources/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__.'/../../storage/cache',
    'autoreload' => true
]);


// Initial Values
$priorities = ['low', 'normal', 'high']; // The possible priorities of a task
$formErrors = []; // The encountered form errors

$what = isset($_POST['what']) ? $_POST['what'] : ''; 
$priority = isset($_POST['priority']) ? $_POST['priority'] : 'low';

// Handle action 'add' (user pressed add button)
if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] === 'add')) {

    // check parameters
    // (if an error was encountered, add it to the $formErrors array)

    if (trim($what) === ''){
        array_push($formErrors,'Voer een naam in voor je taak');
    }

    if(!in_array($priority, $priorities)){
        array_push($formErrors, 'Ongeldige prioriteit geselecteerd');
    }

    //  if no errors: insert values into database

    if (sizeof($formErrors) === 0){
        $stmt = $conn->prepare('INSERT INTO tasks (name, priority, added_on) VALUES (?, ?, ?)');
    }

    // @TODO if insert query succeeded: redirect to this very same page

}

// No action to handle: show our page itself

// get all task items from the databases
$tasks = $conn->fetchAllAssociative('SELECT * FROM tasks ORDER BY priority');

// render template and persist $formErrors, $what, $priority and show $tasks

$tpl = $twig->load('home.twig');
echo $tpl->render([
    'what' => $what,
    'tasks' => $tasks,
    'errors' => $formErrors,
    'priorities' => $priorities
]);


<?php

/**
 * Lab 06 — Start from this version
 * Tasklist
 * @author <your name>
 */

require_once ('../../vendor/autoload.php');
require_once ('../../config/database.php');
require_once ('../../src/Services/DatabaseConnector.php');



$conn = \Services\DatabaseConnector::getConnection('tasklist');

// Bootstrap Twig

$loader = new  \Twig\Loader\FilesystemLoader(__DIR__.'/../../resources/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__.'/../../storage/cache',
    'auto_reload' => true
]);

session_start();

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}


// Initial Values
$priorities = ['low', 'normal', 'high']; // The possible priorities of a task
$formErrors = []; // The encountered form errors
if (isset($_GET['formErrors'])){
    $formErrors[] = urldecode($_GET['formErrors']);
}

$what = $_POST['what'] ?? '';
$priority = $_POST['priority'] ?? 'low';

// Handle action 'add' (user pressed add button)
if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] === 'add')) {

    // check parameters
    // (if an error was encountered, add it to the $formErrors array)

    if (trim($what) === ''){
        $formErrors[] = 'Voer een naam in voor je taak';
    }

    if(!in_array($priority, $priorities)){
        $formErrors[] = 'Ongeldige prioriteit geselecteerd';
    }

    //  if no errors: insert values into database

    if (sizeof($formErrors) === 0){
        $stmt = $conn->prepare('INSERT INTO tasks (user_id, name, priority, added_on) VALUES (?, ?, ?, ?)');
        $result = $stmt->executeStatement([(int)[$_SESSION['user']['id']], $what, $priority, (new DateTime()) -> format('y-m-d h:i:s')]);
        $what = '';
        $priority = 'low';
    }

}

// get all task items from the databases
$tasks = $conn->fetchAllAssociative('SELECT * FROM tasks WHERE user_id = ? ORDER BY priority', [$_SESSION['user']['id']]);

// render template and persist $formErrors, $what, $priority and show $tasks

$tpl = $twig->load('home2.twig');
echo $tpl->render([
    'what' => $what,
    'tasks' => $tasks,
    'errors' => $formErrors,
    'priorities' => $priorities,
    'priority' => $priority,
    'index' =>  $_SERVER['PHP_SELF'],
    'edit' => '/../../labo07/edit.php',
    'delete' => '/../../labo07/delete.php',
    'loggedIn' => true
]);


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

$conn = \Services\DatabaseConnector::getConnection('tasklist');

// Bootstrap Twig

$loader = new  \Twig\Loader\FilesystemLoader(__DIR__.'/../../resources/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__.'/../../storage/cache',
    'auto_reload' => true
]);

// Initial Values
$priorities = ['low', 'normal', 'high']; // The possible priorities of a task
$formErrors = []; // The encountered form errors

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0; // The id of the task passed by the URL
$what = isset($_POST['what']) ? $_POST['what'] : ''; // The task that was sent via the form
$priority = isset($_POST['priority']) ? $_POST['priority'] : 'low'; // The priority that was sent via the form
$postId = isset($_POST['id']) ? $_POST['id'] : '';

// Handle action 'edit' (user pressed edit button)
if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'edit')) {

    // check if item exists (use the id from the $_POST array!)


    // @TODO (if error, redirect to index.php)

    // check parameters

    // @TODO (if an error was encountered, add it to the $formErrors array)

    // @TODO if no errors: updates values in the database

    // @TODO if query succeeded: redirect to index.php

}

// No action to handle: show edit page

// Check if the passed id (in $_GET) exists as a task item (if it fails, redirect to index.php)

$stmt = $conn->prepare('SELECT * FROM tasks where id = ?');
$result = $stmt->executeQuery([$id]);
$task = $result->fetchAssociative();
print_r($task);
if ($task['id'] === $id){

    // Get the item from the database
    $what = $task['name'];
    $priority = $task['priority'];
}
else{
    header('Location: index.php');
}

// @TODO If the form has not been sent, overwrite the $what and $priority parameters

// render template and persist $what and $priority

$tpl = $twig->load('edit.twig');
echo $tpl->render([
    'errors' => $formErrors,
    'priorities' => $priorities,
    'what' => $what,
    'priority' => $priority,
    'index' =>  '/../../labo06/index.php',
    'edit' => $_SERVER['PHP_SELF'],
]);


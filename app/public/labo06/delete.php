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

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0; // The id of the task passed by the URL
$postId = isset($_POST['id']) ? (int) $_POST['id'] : 0;

// Handle action 'edit' (user pressed edit button)
if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'delete')) {

    // check if item exists (use the id from the $_POST array!)
    $stmt = $conn->prepare('SELECT * FROM tasks where id = ?');
    $result = $stmt->executeQuery([$postId]);
    $postTask = $result->fetchAssociative();
    if ((int)$postTask['id'] === (int)$postId){
        $stmt = $conn->prepare('DELETE FROM tasks WHERE id = ?');
        $result = $stmt->executeStatement([$postId]);
        header('Location: index.php');
        exit();
    }
    else {
        header('Location: index.php?formErrors='.urlencode('De taak is niet verwijderd'));
        exit();
    }


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
if ((int)$task['id'] === $id){

    // Get the item from the database
    $what = $task['name'];
    $formId = $task['id'];
}
else{
    header('Location: index.php');
    exit();
}
$tpl = $twig->load('delete.twig');
echo $tpl->render([
    'what' => $what,
    'id' => $formId,
    'index' =>  '/../../labo06/index.php',
    'delete' => $_SERVER['PHP_SELF'],
]);

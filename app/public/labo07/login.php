<?php

// Composer's autoloader & DB init
require_once ('../../vendor/autoload.php');
require_once ('../../config/database.php');
require_once ('../../src/Services/DatabaseConnector.php');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../resources/templates');
$twig = new \Twig\Environment($loader, [
        'cache' => __DIR__ . '/../../storage/cache',
        'auto_reload' => true ]
);

// start session (starts a new one, or continues the already started one)
session_start();

// already logged in!
if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}

// var to tell if we have a login error
$formErrors = [];

// extract sent in username & password
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'login')) {

    $conn = \Services\DatabaseConnector::getConnection('tasklist');
    //@toDO handle error
    $user = $conn->fetchAssociative('SELECT * FROM users WHERE username = ?', [$username]);

    if ($user !== false) {

        if (password_verify($password, $user['password'])) {

            // Store the user row in the session
            $_SESSION['user'] = $user;
            header('location: index.php');
            exit();
        } // Invalid login
        else {
            $formErrors[] = 'Ongeldige login-gegevens';
        }
    } // username & password are not valid
    else {
        $formErrors[] = 'Ongeldige login-gegevens';
    }

}

$tpl = $twig->load('login2.twig');
echo $tpl->render([
    'username' => $username,
    'errors' => $formErrors,
    'loggedIn' => false
]);

<?php
require_once ('../../vendor/autoload.php');
require_once ('../../config/database.php');
require_once ('../../src/Services/DatabaseConnector.php');

$conn = \Services\DatabaseConnector::getConnection('tasklist');

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../resources/templates');
$twig = new \Twig\Environment($loader, [
        'cache' => __DIR__ . '/../../storage/cache',
        'auto_reload' => true
    ]
);

session_start();

if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$formErrors = [];

if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] === 'register')) {
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)){
        $formErrors[] = 'Voer een gebruikers naam in';
    }

    if (trim($password) === ''){
        $formErrors[] = 'Voer een password in';
    }

    $user = $conn->fetchAssociative('SELECT * FROM users WHERE username = ?', [$username]);

    if ($user !== false) {
        $formErrors[] = 'Deze gebruiker bestaat al';
    }

    //  if no errors: insert values into database

    if (sizeof($formErrors) === 0){
        // @toDO check errors connection
        $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
        $result = $stmt->executeStatement([$username, password_hash($password, PASSWORD_DEFAULT)]);
        $user = $conn->fetchAssociative('SELECT * FROM users WHERE username = ?', [$username]);
        $_SESSION['user'] = $user;
        setcookie('lastLogin', (new DateTime()) -> format('y-m-d h:i:s'),0,"","",false,true);
        //@toDo redirect to index.php
        header('location: index.php');
        exit();

        //toDo redirect to conformation page;
    }
}





$tpl = $twig->load('register2.twig');
echo $tpl->render([
    'username' => $username,
    'errors' => $formErrors,
    'loggedIn' => false,
]);

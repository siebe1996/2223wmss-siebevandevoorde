<?php
$name = isset($_GET['name']) ? (string) $_GET['name'] : '';
$email = isset($_GET['email']) ? (string) $_GET['email'] : '';

echo 'Bedankt '.$name.', '.$email;
?>

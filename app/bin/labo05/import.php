<?php
require_once('../../vendor/autoload.php');
require_once('../../config/database.php');
require_once('../../src/Services/DatabaseConnector.php');

$connectionParams = [
    'host' => DB_HOST,
    'dbname' => DB_NAME,
    'user' => DB_USER,
    'password' => DB_PASS,
    'driver' => 'pdo_mysql',
    'charset' => 'utf8mb4'
];

$connection = \Services\DatabaseConnector::getConnection($connectionParams);

function showDbError(string $type): void
{
    header('location: error.php?type=db&detail=' . $type);
    exit();
}


try {
    $connection->connect();
} catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
    showDbError('connect');
}


$file = fopen('../../resources/companies.csv', 'r');
$pureData = [];
$companies = [];

$stmt = $connection->prepare('INSERT INTO companies (name, address, zip, city, activity, vat, date_added) VALUES (?, ?, ?, ? ,? ,?, ?)');


$skip = true;
if (($handle = fopen('../../resources/companies.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (!$skip) {
            $result = $stmt->executeStatement([$data[0], $data[1], $data[2], $data[3], $data[4], $data[5], (new DateTime()) -> format('y-m-d h:i:s')]);
        }
        $skip = false;
    }
    fclose($handle);
}

?>

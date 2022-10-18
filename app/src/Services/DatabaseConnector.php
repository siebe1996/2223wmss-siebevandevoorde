<?php

namespace Services;

class DatabaseConnector
{
    static function getConnection() : \Doctrine\DBAL\Connection {
        $connectionParams = [
            'url' => 'mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME
        ];

        try {
            $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
            $connection->connect();
        } catch (\Doctrine\DBAL\Exception $e) {
            echo($e->getMessage() . PHP_EOL);
            exit();
        }
        return $connection;
    }

}
<?php

function bddConnect() {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $dsn = "mysql:host=54.37.8.83;dbname=MAIN;";
    $user = "lux";
    $password = "explosion80";
    $databaseConnection = new PDO($dsn, $user, $password);
    
    return $databaseConnection;
}


?>
<?php


session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./bdd_connexion.php');

$bdd_connect = bddConnect();

$query = $bdd_connect->prepare("SELECT * FROM comments WHERE image = :id");
$query -> execute([
    ":id" => $_GET["id"]
]);

$result = $query -> fetchAll();
echo json_encode($result);










?>
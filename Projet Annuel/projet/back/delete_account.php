<?php

require_once('bdd_connexion.php');
session_start();

$bdd_connexion = bddConnect();

var_dump($_GET["email"]);
var_dump($_SESSION["power"]);

if(isset($_SESSION["power"]) && $_SESSION["power"] === "admin"){
    $query = $bdd_connexion -> prepare("DELETE FROM USER WHERE email = :email;");
    $query -> execute([
    ":email" => $_GET["email"] 
    ]);
}



?>
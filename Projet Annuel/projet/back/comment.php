<?php
   session_start();
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   require_once('./bdd_connexion.php');

   $bdd_connect = bddConnect();

   $query = $bdd_connect->prepare("INSERT INTO comments(auteur, content, image) VALUES(:auteur, :content, :image)");
   $query -> execute([
       ":image" => $_GET["id"],
       ":auteur" => $_SESSION['username'],
       ":content" => htmlspecialchars($_GET["content"])
   ]);
?>
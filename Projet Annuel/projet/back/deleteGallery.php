<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./bdd_connexion.php');

    $bdd_connect = bddConnect();

    $query = $bdd_connect->prepare("SELECT image FROM gallery WHERE id = :id AND email = :email");
    $query -> execute([
        ":id" => $_GET["id"],
        ":email" => $_SESSION['username']
    ]);

    $result = $query -> fetchAll();
    $result = $result[0]['image'];

    unlink("./gallery-upload/".  $result);

    $query = $bdd_connect->prepare("DELETE FROM gallery WHERE id = :id AND email = :email");
    $query -> execute([
        ":id" => $_GET["id"],
        ":email" => $_SESSION['username']
    ]);
    



    //header('Location: ../inc/parameter.php');


?>
<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./bdd_connexion.php');

    $bdd_connect = bddConnect();
    

    $query = $bdd_connect->prepare("SELECT image FROM USER WHERE email = :email");
    $query -> execute([
        ":email" => $_SESSION["username"]
    ]);
    $getImage = $query -> fetchAll();
    $image = $getImage[0][0];
    
    if($image != "default.jpeg"){
        var_dump($image);
        unlink("upload/profil/".$image);
    }
    $query = $bdd_connect->prepare("UPDATE USER SET image = 'default.jpeg' WHERE email = :email");
    $query -> execute([
        ":email" => $_SESSION["username"]
    ]);

    header('Location: ../inc/parameter.php');


?>
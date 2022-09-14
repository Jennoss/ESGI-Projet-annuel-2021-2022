<?php
require("./bdd_connexion.php");

ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

$bdd_connexion = bddConnect();


$password = htmlspecialchars($_POST["password"]);




$query = $bdd_connexion->prepare("SELECT password FROM USER WHERE email = :email");
$query -> execute([
    ":email" => $_SESSION["username"]
]);


$passwordFetch = $query -> fetchAll();

$match = password_verify($password, $passwordFetch[0][0]);


if($match){
    $new_password = password_hash($_POST["new_password"], PASSWORD_BCRYPT);

    if($_POST["new_password"] === $_POST["new_password2"]) {

        $query = $bdd_connexion -> prepare("UPDATE USER SET password = :password WHERE email = :email");
        $query -> execute ([
            ":email" => $_SESSION["username"],
            ":password" => $new_password
        ]);
        
    }  
}

header('Location: ../inc/parameter.php');
?>
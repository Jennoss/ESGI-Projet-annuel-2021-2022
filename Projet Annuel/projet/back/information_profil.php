<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("./bdd_connexion.php");
    session_start();
    $bdd_connexion = bddConnect();

    $age = htmlspecialchars($_POST["age"]);
    $taille = htmlspecialchars($_POST["taille"]);
    $genre = htmlspecialchars($_POST["genre"]);
    $cp = htmlspecialchars($_POST["cp"]);
    $poid = htmlspecialchars($_POST["poid"]);
    $telephone = htmlspecialchars($_POST["telephone"]);



    $query = $bdd_connexion->prepare("SELECT email FROM USER WHERE username = :username");
    $query -> execute([
        ":username" => $_SESSION["image-name"]
    ]);
    $email = $query -> fetchAll();




    $array = [];
    $requete = "UPDATE USER SET ";

    if($_POST["age"] != ""){
        $array["age"] = $_POST["age"];
    };
        
    if($_POST["taille"] != ""){
        $array["taille"] = $_POST["taille"];
    };

    if($_POST["genre"] != ""){
        $array["genre"] = $_POST["genre"];
    };

    if($_POST["cp"] != ""){
        $array["cp"] = $_POST["cp"];
    };

    if($_POST["poid"] != ""){
        $array["poid"] = $_POST["poid"];
    };

    if($_POST["telephone"] != ""){
        $array["telephone"] = $_POST["telephone"];
    };

    foreach($array as $key => $value) {
        switch ($key) {
            case 'age':
            case 'taille':
            case 'cp':
            case 'poid':
                $requete .= $key . " = " . $value . ", ";
                break;
            default: 
                $requete .= $key . " = '" . $value . "', ";
        };
    }

    $requete = substr_replace($requete ," ",-2);

    $requete .= " WHERE email = :email";

    var_dump($requete);

    $request = $bdd_connexion ->prepare($requete);

    $request -> execute([
        ":email" => $_SESSION["username"]
    ]);

   


    header('Location: ../inc/parameter.php');




?>
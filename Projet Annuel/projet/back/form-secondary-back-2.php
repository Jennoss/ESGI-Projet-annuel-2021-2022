<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("./bdd_connexion.php");
    session_start();
    $bdd_connexion = bddConnect();



    $query = $bdd_connexion->prepare("SELECT email FROM USER WHERE username = :username");
    $query -> execute([
        ":username" => $_SESSION["image-name"]
    ]);
    $email = $query -> fetchAll();


    $input_taille = htmlspecialchars((int)$_POST["taille"]);
    $input_genre = htmlspecialchars($_POST["genre"]);
    $input_cp = htmlspecialchars($_POST["cp"]);
    $input_poid = htmlspecialchars((int)$_POST["poid"]);
    $input_telephone = htmlspecialchars($_POST["telephone"]);
    $input_objectif = htmlspecialchars($_POST["objectif"]);
    $input_morphologie = htmlspecialchars($_POST["morphologie"]);
    $input_objectif_physique = htmlspecialchars($_POST["objectif_physique"]);
    $input_zone_corp = htmlspecialchars($_POST["zone_corp"]);
    $input_cadence = htmlspecialchars($_POST["cadence"]);
    $input_materiel = htmlspecialchars($_POST["materiel"]);
    $input_pompes = htmlspecialchars($_POST["pompes"]);
    $input_poidCible = htmlspecialchars((int)$_POST["poidCible"]);


    $array = [];
    $requete = "UPDATE USER SET ";

    if($_POST["materiel"] != ""){
        $array["materiel"] = $_POST["materiel"];
    };

    if($_POST["taille"] != ""){
        if((strlen($input_taille) <= 3) && (is_string($input_taille) == false)){
            $array["taille"] = $_POST["taille"];
        } else {
            $_SESSION["taille_error"] = "Taille invalide";
        }
        
    };

    if($_POST["pompes"] != ""){
        $array["pompes"] = $_POST["pompes"];
    };

    if($_POST["poidCible"] != ""){
        if(is_string($input_poidCible) == false && strlen($input_poidCible) <= 3) {
            $array["poid_cible"] = $_POST["poidCible"];
        } else {
            $_SESSION["poidCible_error"] = "Objectif de poids invalide";
        }
    };


    if($_POST["objectif"] != ""){
        $array["objectif"] = $_POST["objectif"];
    };

    if($_POST["morphologie"] != ""){
        $array["morphologie"] = $_POST["morphologie"];
    };

    if($_POST["objectif_physique"] != ""){
        $array["objectif_physique"] = $_POST["objectif_physique"];
    };

    if($_POST["zone_corp"] != ""){
        $array["zone_corp"] = $_POST["zone_corp"];
    };

    if($_POST["cadence"] != ""){
        $array["cadence"] = $_POST["cadence"];
    };
        
    if($_POST["genre"] != ""){
        $array["genre"] = $_POST["genre"];
    };

    if($_POST["cp"] != ""){
        if(preg_match('/^[0-9]{5}$/', $input_cp) != false){
            $array["cp"] = $_POST["cp"];
        }else {
            $_SESSION["cp_error"] = "Code postale invalide";
        }

    };

    if($_POST["poid"] != ""){
        if(is_string($input_poid) == false && strlen($input_poid) <= 3){
            $array["poid"] = $_POST["poid"];
        }
    };

    if($_POST["telephone"] != "" && preg_match('/^[0-9]{10}$/', $_POST["telephone"])) {
        if(strlen($input_telephone) == 10){
            $array["telephone"] = $_POST["telephone"];
        } else {
            $_SESSION["telephone_error"] = "Numéro de téléphone invalide";
        }
    };

    foreach($array as $key => $value) {
        switch ($key) {
            //Case int
            case 'taille':
            case 'poid':
            case 'poidCible':
                $requete .= $key . " = " . $value . ", ";
                break;
            //case string
            default: 
                $requete .= $key . " = '" . $value . "', ";
        };
    }

    $requete = substr_replace($requete ," ",-2);

    $requete .= " WHERE email = :email";

    $request = $bdd_connexion ->prepare($requete);

    $request -> execute([
        ":email" => $_SESSION["username"]
    ]);

    header('Location: ../inc/parameter.php');




?>
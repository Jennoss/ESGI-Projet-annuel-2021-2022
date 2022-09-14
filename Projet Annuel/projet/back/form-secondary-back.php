<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function bddConnect() {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $dsn = "mysql:host=54.37.8.83;dbname=MAIN;";
    $user = "lux";
    $password = "explosion80";
    $databaseConnection = new PDO($dsn, $user, $password);
    
    return $databaseConnection;
}


$bdd_connexion = bddConnect();

$query = $bdd_connexion->prepare("SELECT compte_information FROM USER WHERE email=:email");
$query -> execute ([
    ":email" => $_SESSION["username"]
]);

$account_information = $query -> fetchAll();
$accountValid = $account_information[0][0];


if($accountValid == 1) {
    header('Location: ../inc/album.php');
}




$input_taille = (int)$_POST["taille"];
$input_genre = htmlspecialchars($_POST["genre"]);
$input_cp = htmlspecialchars($_POST["cp"]);
$input_poid = (int)$_POST["poid"];
$input_telephone = htmlspecialchars($_POST["telephone"]);
$input_objectif = htmlspecialchars($_POST["objectif"]);
$input_morphologie = htmlspecialchars($_POST["morphologie"]);
$input_objectif_physique = htmlspecialchars($_POST["objectif_physique"]);
$input_zone_corp = htmlspecialchars($_POST["zone_corp"]);
$input_cadence = htmlspecialchars($_POST["cadence"]);
$input_materiel = htmlspecialchars($_POST["materiel"]);
$input_pompes = htmlspecialchars($_POST["pompes"]);
$input_poidCible = (int)$_POST["poidCible"];
$accountInformation = 1;


if(!empty($_POST)){

    if(
        !empty($input_taille) && !empty($input_genre) && !empty($input_cp) && 
        !empty($input_poid) && !empty($input_telephone) && !empty($input_objectif) && 
        !empty($input_morphologie) && !empty($input_objectif_physique) && !empty($input_zone_corp) && 
        !empty($input_cadence) && !empty($input_materiel) && !empty($input_pompes) && !empty($input_poidCible)) {

        if((strlen($input_taille)) <= 3 && (is_string($input_taille) == false)) {

            if(preg_match('/^[0-9]{5}$/', $input_cp) != false){
                
                if(is_string($input_poid) == false && strlen($input_poid) <= 3) {

                    if(strlen($input_telephone) == 10){
                                                                                    
                        if(!empty($input_poidCible) && is_string($input_poidCible) == false && strlen($input_poidCible) <= 3) {

                            $query = $bdd_connexion->prepare("UPDATE USER SET taille = :taille, genre = :genre, cp = :cp, poid = :poid, 
                            telephone = :telephone, objectif = :objectif, morphologie = :morphologie, objectif_physique = :objectif_physique, zone_corp = :zone_corp, 
                            cadence = :cadence, materiel = :materiel, pompes = :pompes, poid_cible = :poid_cible WHERE email = :email");
                            if($query -> execute ([
                                ":taille" => $input_taille,
                                ":genre" => $input_genre,
                                ":cp" => $input_cp,
                                ":poid" => $input_poid,
                                ":telephone" => $input_telephone,
                                ":objectif" => $input_objectif,
                                ":morphologie" => $input_morphologie,
                                ":objectif_physique" => $input_objectif_physique,
                                ":zone_corp" => $input_zone_corp,
                                ":cadence" => $input_cadence,
                                ":materiel" => $input_materiel,
                                ":pompes" => $input_pompes,
                                ":poid_cible" => $input_poidCible,
                                ":email" => $_SESSION["username"]
                            ])){
                                $account_check = $bdd_connexion -> prepare("UPDATE USER SET compte_information = 1 WHERE email = :email");
                                $account_check -> execute ([
                                    ":email" => $_SESSION["username"]
                                ]);
                                header("Location: ../inc/album.php");
                            } else {
                                $_SESSION["Bdd_error"] = "La requête à la base de données à échoué, réessayer";
                            }
                        } else {var_dump('6');}
                    } else {var_dump('5');}
                } else {var_dump('4');}
            } else {var_dump('3');}
        } else {var_dump('2');}
    } else {var_dump('1');}
} 


?>
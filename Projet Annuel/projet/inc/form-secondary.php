<?php require('./navbarConnected.php');
session_start();

if($_SESSION["power"] === "admin"){
    header("Location: ./admin.php");
    }
if(!isset($_SESSION["username"])) {
    header('Location: ./logout.php');
}

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

$query = $bdd_connexion->prepare("SELECT compte_information FROM USER WHERE email = :email");
$query -> execute ([
    ":email" => $_SESSION["username"]
]);

$account_information = $query -> fetchAll();
$accountValid = $account_information[0][0];

if($accountValid == 1) {
    header('Location: ./mon_espace.php');
}    

?>

<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/form-secondary.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formulaire</title>
</head>
<body>
    <div class="container container-form">
        <div class="container-description">
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div id="presentation-form">
                <img class="logo mt-4" src="../src/img/header/logo.png" alt="">
                <h2 class="text-center">Coach'In</h2>
                <p class="text-center mt-4">Pour pouvoir commencer à utiliser notre plateform, nos coach on besoin de plus d'informations vous concernant. Vous pourrez les changers à nimporte quelle moment via vos paramètre de compte.</p>
            </div>

            <div class="line-container">

            </div>    
        </div>

        <form action="../back/form-secondary-back.php" method="post">

            <div id="question1" class="question">
                <h3 class="text-center title mt-5">Combien mesures-tu ? (en cm)</h3>
                <input class="input-value mt-5" type="number" id="taille" name="taille">
                <div class="d-flex flex-row-reverse">
                    <input class="button d-flex button-text mt-5" type="button" onclick="goToStep(2, 1)" value="Continuer">
                </div>
            </div>

            <div id="question2" class="question">
                <h3 class="text-center title mt-5">Tu es</h3>
                <select class="form-select input-value mt-5" aria-label="Default select example" name="genre" required>
                    <option class="input-value" selected></option>
                    <option name="genre" value="Homme">Homme</option>
                    <option name="genre" value="Femme">Femme</option>
                    <option name="genre" value="Autres">Autres</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(3, 2)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(1, 2)" value="Back">
                </div>

            </div>

            <div id="question3" class="question">
                <h3 class="text-center title mt-5">Quel est ton code postale ?</h3>
                <input class="input-value mt-5" type="number" id="cp" name="cp">
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(4, 3)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(2, 3)" value="Back">
                </div>
            </div>




            <div id="question4" class="question">
                <h3 class="text-center title mt-5">Quel est ton poid ?</h3>
                <input class="input-value mt-5" type="number" id="poid" name="poid">
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(5, 4)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(3, 4)" value="Back">
                </div>
            </div>




            <div id="question5" class="question">
                <h3 class="text-center title mt-5">Indiquez votre numéro de téléphone</h3>
                <input class="input-value mt-5" type="tel" id="telephone" name="telephone">
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(6, 5)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(4, 5)" value="Back">
                </div>
            </div>






            <div id="question6" class="question">
                <h3 class="text-center title mt-5">Quel est ton objectif ?</h3>
                <select class="form-select input-value mt-3" aria-label="Default select example" name="objectif" multiple aria-label="multiple select example">
                    <option name="objectif" value="Étre en forme">Étre en forme</option>
                    <option name="objectif" value="Perdre du poids">Perdre du poids</option>
                    <option name="objectif" value="Se muscler">Se muscler</option>
                    <option name="objectif" value="Être un athlète">Être un athlète</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(7, 6)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(5, 6)" value="Back">
                </div>
            </div>






            <div id="question7" class="question">
                <h3 class="text-center title mt-5">Quelle est ta morphologie</h3>
                <select class="form-select input-value mt-3" aria-label="Default select example" name="morphologie" multiple aria-label="multiple select example">
                    <option name="morphologie" value="Mince">Mince</option>
                    <option name="morphologie" value="Normal">Normal</option>
                    <option name="morphologie" value="Rond">Rond</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(8, 7)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(6, 7)" value="Back">
                </div>
            </div>





            <div id="question8" class="question">
                <h3 class="text-center title mt-5">Quel physique souhaites-tu ?</h3>
                <select class="form-select input-value mt-3" aria-label="Default select example" name="objectif_physique" multiple aria-label="multiple select example">
                    <option name="objectif_physique" value="Physique athlétique">Physique athlétique</option>
                    <option name="objectif_physique" value="Physique Massif">Physique Massif</option>
                    <option name="objectif_physique" value="Physique sec">Physique sec</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(9, 8)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(7, 8)" value="Back">
                </div>
            </div>





            <div id="question9" class="question">
                <h3 class="text-center title mt-5">Quelles zones du corps veux-tu développer</h3>
                <select class="form-select input-value mt-3" aria-label="Default select example" name="zone_corp" multiple aria-label="multiple select example">
                    <option name="zone_corp" value="Épaules">Épaules</option>
                    <option name="zone_corp" value="Bras">Bras</option>
                    <option name="zone_corp" value="Cuisses">Cuisses</option>
                    <option name="zone_corp" value="Mollets">Mollets</option>
                    <option name="zone_corp" value="Dos">Dos</option>
                    <option name="zone_corp" value="Pectoraux">Pectoraux</option>
                    <option name="zone_corp" value="Abdominaux">Abdominaux</option>
                    <option name="zone_corp" value="Fesses">Fesses</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(10, 9)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(8, 9)" value="Back">
                </div>
            </div>






            <div id="question10" class="question">
                <h3 class="text-center title mt-5">Fais-tu du sport ?</h3>
                <select class="form-select input-value mt-3" aria-label="Default select example" name="cadence" multiple aria-label="multiple select example">
                    <option name="cadence" value="0 à 1 fois par semaine">0 à 1 fois par semaine</option>
                    <option name="cadence" value="2 fois par semaine">2 fois par semaine</option>
                    <option name="cadence" value="3 fois par semaine ou plus">3 fois par semaine ou plus</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(11, 10)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(9, 10)" value="Back">
                </div>
            </div>








            <div id="question11" class="question">
                <h3 class="text-center title mt-5">Quel matériel as-tu ?</h3>
                <select class="form-select input-value mt-3" aria-label="Default select example" name="materiel" multiple aria-label="multiple select example">
                    <option name="materiel" value="Aucun matériel">Aucun matériel</option>
                    <option name="materiel" value="Haltères">Haltères</option>
                    <option name="materiel" value="Barre de traction">Barre de traction</option>
                    <option name="materiel" value="Barre de musculation">Barre de musculation</option>
                    <option name="materiel" value="Kettlebell">Kettlebell</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(12, 11)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(10, 11)" value="Back">
                </div>
            </div>







            <div id="question12" class="question">
                <h3 class="text-center title mt-5">Combien de pompes es-tu capable de faire ?</h3>
                <select class="form-select input-value mt-3" aria-label="Default select example" name="pompes" multiple aria-label="multiple select example">
                    <option name="pompes" value="Moins de 10">Moins de 10</option>
                    <option name="pompes" value="Entre 10 et 20">Entre 10 et 20</option>
                    <option name="pompes" value="Plus de 20">Plus de 20</option>
                    <option name="pompes" value="Je ne sais pas">Je ne sais pas</option>
                </select>
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="button" onclick="goToStep(13, 12)" value="Continuer">
                    <input class="button button-text" type="button" onclick="goToStep(11, 12)" value="Back">
                </div>
            </div>






            <div id="question13" class="question">
                <h3 class="text-center title mt-5">Quel est ton poids cible ? (en kg)</h3>
                <input class="input-value mt-5" type="number" id="poidCible" name="poidCible">
                <div class="d-flex flex-row-reverse mt-5">
                    <input class="button button-text" type="submit" onclick="goToStep(14, 13)" value="Terminer">
                    <input class="button button-text" type="button" onclick="goToStep(12, 13)" value="Back">
                </div>
            </div>

        </form>
    </div>




    <script src="../src/js/form-secondary.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

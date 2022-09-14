
<?php

require_once('../back/bdd_connexion.php');
require_once('test.php');

    $bdd_connexion = bddConnect();
    $requete = $bdd_connexion -> prepare("SELECT date_ajout FROM comments WHERE email = :email");
    $requete -> execute([
        ":email" => $_GET['user']
    ]);
    
    $getDate = $requete -> fetchAll();


    $time_ago = timeAgo();
    
    echo json_encode($getDate[0][0]);



    ?>
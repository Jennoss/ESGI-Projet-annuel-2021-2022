
<?php

require_once('../back/bdd_connexion.php');


    $bdd_connexion = bddConnect();
    $requete = $bdd_connexion -> prepare("SELECT username FROM USER WHERE email = :email");
    $requete -> execute([
        ":email" => $_GET['user']
    ]);
    
    $username = $requete -> fetchAll();
    
    echo json_encode($username[0][0]);



    ?>
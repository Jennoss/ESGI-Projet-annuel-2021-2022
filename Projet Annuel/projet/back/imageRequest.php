
<?php

require_once('../back/bdd_connexion.php');


    $bdd_connexion = bddConnect();
    $requete = $bdd_connexion -> prepare("SELECT image FROM USER WHERE email = :email");
    $requete -> execute([
        ":email" => $_GET['user']
    ]);
    
    $image_name = $requete -> fetchAll();
    
    echo json_encode($image_name[0][0]);



    ?>
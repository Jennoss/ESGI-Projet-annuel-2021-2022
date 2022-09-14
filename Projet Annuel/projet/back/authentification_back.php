<?php
    session_start();
    require_once('./bdd_connexion.php');

    $bdd_connexion = bddConnect();

    $key = $bdd_connexion->prepare("SELECT confirmkey FROM USER WHERE email = :email");
    $key -> execute ([
        ":email" => $_SESSION["email_connexion"]
    ]);

    $getKey = $key -> fetchAll();

    $getKey = $getKey[0]["confirmkey"];

    if($_POST["verify"] === $getKey){
        $query = $bdd_connexion->prepare("UPDATE USER SET authentified = 1 WHERE email = :email");
        $query -> execute ([
            ":email" => $_SESSION["email_connexion"]
        ]);
        header('Location: ../inc/email_verify_done_redirection.php');
    } else {
        header('Location: ../inc/authentification.php');
        $_SESSION["wrong_verify_code"] = "invalid confirmation code";
    }

?>
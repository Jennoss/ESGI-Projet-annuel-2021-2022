<?php
    session_start();
    require('./bdd_connexion.php');
    $bdd_connexion = bddConnect();



    $emailRequest = $bdd_connexion->prepare("SELECT * FROM USER WHERE email=:email");
    $emailRequest -> execute ([
    ":email" => $_SESSION["email_connexion"]
]);

$emailVerify = $emailRequest -> fetchAll();


$codeRequest = $bdd_connexion->prepare("SELECT confirmkey FROM USER WHERE email = :email");
$codeRequest -> execute ([
    ":email" => $_SESSION["email_connexion"]
]);

$codeVerify = $codeRequest -> fetchAll();

$key = $codeVerify[0]["confirmkey"];




mail(
    $_SESSION["email_connexion"],
    'Verification email Coachin',
    'Voici votre code de comfirmation : ' . $key
  );

  header('Location: ../inc/authentification.php');
?>
<?php 

require("./bdd_connexion.php");


ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../inc/inscription.php");
    die();
}

$databaseConnection = bddConnect();

$input_email = htmlspecialchars($_POST["email"]);
$input_password = htmlspecialchars($_POST["password"]);



$query = $databaseConnection->prepare("SELECT email, password, authentified FROM USER WHERE email = :email");

$query->execute([
    ":email" => $input_email
]);

$users = $query->fetchAll();

$user = $users[0];
$hashedPassword = $user["password"];
$match = password_verify($input_password, $hashedPassword);


if (count($users) === 0) {
    $_SESSION["error_users_not_exist"] = "Identifiant introuvable";
    // Renvoyer une erreur en session à la page index.php
    header("Location: ../inc/connexion2.php");
    die();

}



if (!$match) {
    $_SESSION["error_wrong_password"] = "Mot de passe incorrect";
    header("Location: ../inc/connexion2.php");
    die();
}

$query = $databaseConnection->prepare("SELECT power FROM USER WHERE email = :email");
$query->execute([
    ':email' => $_SESSION['username']
]);
$getPower = $query -> fetchAll();

$power = $getPower[0][0];

if($match) {
    if($power === "admin"){
        $_SESSION["power"] = 'admin';
    } else {
        $_SESSION["power"] = 'user';
    }
    $_SESSION["username"] = $input_email;
    $_SESSION["connected"] = true;
    header("Location: ../index.php");
}

$_SESSION["authentified"] = intval($user["authentified"]);

if(!$_SESSION["authentified"]) {
    $_SESSION["connected"] = false;
    $_SESSION["email_connexion"] = $input_email;
    header("Location: ../inc/authentification.php");
}
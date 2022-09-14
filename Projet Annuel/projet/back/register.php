<?php

require("./bdd_connexion.php");

ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

// We chack if the request method is POST

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../inc/inscription2.php");
    die();
}



$input_email = htmlspecialchars($_POST["email"]);
$input_password = htmlspecialchars($_POST["password"]);
$input_name = htmlspecialchars($_POST["name"]);
$input_surname = htmlspecialchars($_POST["surname"]);
$input_confirm_password = htmlspecialchars($_POST["confirm_password"]);
$input_username = htmlspecialchars($_POST["username"]);
$input_password = htmlspecialchars($_POST["password"]);
$hashedPassword = password_hash($input_password, PASSWORD_BCRYPT);


$dateNaissance = htmlspecialchars($_POST["naissance"]);
echo $dateNaissance;
$aujourdhui = date("Y-m-d");
$diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
$input_age = $diff->format('%y');

$date_creation = date("Y-m-d", strtotime('now +2 Hour')); 
echo $date_creation;

// the function bddConnect is build in bdd_connexion, it's a connexion to our database
$bdd_connexion = bddConnect();




// ----------------  FORM CHECK -------------------- //

// We check the form



if(empty($_POST["name"])) {
    $_SESSION["error_empty_name"] = "Ce champ est obligatoire";
    header("Location: ../inc/inscription2.php");
    die();
}




if(empty($_POST["surname"])) {
    $_SESSION["error_empty_surname"] = "Ce champ est obligatoire";
    header("Location: ../inc/inscription2.php");
    die();
}



if(empty($_POST["username"])) {
    $_SESSION["error_empty_username"] = "Ce champ est obligatoire";
    header("Location: ../inc/inscription2.php");
    die();
}

// We check if the username size is more than 3 characters



if(strlen($input_username) < 4) {
    $_SESSION["error_size_username"] = "Your username must be minimum 4 characters";
    header("Location: ../inc/inscription2.php");
    die();
}



if(empty($_POST["email"])) {
    $_SESSION["error_empty_email"] = "Veulliez nous renseignez une adresse email valide";
    header("Location: ../inc/inscription2.php");
    die();
}

// We check if the email is valid
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["wrong_email"] = "Adresse email invalide";
    header("Location: ../inc/inscription2.php");
    die();
}

if($input_age < 18){
    $_SESSION["minor"] = "Vous devez avoir au moins 18 ans pour vous inscrire";
    header("Location: ../inc/inscription2.php");
    die();
}




if(empty($_POST["password"])) {
    $_SESSION["error_empty_password"] = "Ce champ est obligatoire";
    header("Location: ../inc/inscription2.php");
    die();
}


if(strlen($_POST["password"]) < 8) {
    $_SESSION["error_size_password"] = "Your username must be 8 characters minimum";
    header("Location: ../inc/inscription2.php");
    die();
}


if(!preg_match('/[A-Z]/', $_POST["password"])){
    $_SESSION["error_uppercase_missing"] = "You need at least 1 uppercase character in your password";
    header("Location: ../inc/inscription2.php");
    die();
}

// We check if both password are the same
if($input_password != $input_confirm_password){
    $_SESSION["error_password_not_same"] = "Le mot de passe dois être identique";
    header("Location: ../inc/inscription2.php");
    die();
}

$keyLength = 10;
$key = "";
for($i = 1; $i < $keyLength; $i++){
    $key .= mt_rand(0, 9);
}
$authentified = 0;




$emailRequest = $bdd_connexion->prepare("SELECT * FROM USER WHERE email=:email");
$emailRequest -> execute ([
    ":email" => $input_email
]);

$emailVerify = $emailRequest -> fetchAll();

$power = "user";



$query = $bdd_connexion->prepare("SELECT * FROM USER WHERE username = :username");
$query -> execute([
    ":username" => $input_username
]);
$username = $query -> fetchAll();

if(!empty($username)) {
    $_SESSION["username_exist"] = "Your username already exist";
    header("Location: ../inc/inscription2.php");
    die();
}

if(empty($emailVerify)) {
    $query = $bdd_connexion->prepare("INSERT INTO USER(name, surname, email, password, username, confirmkey, authentified, age, creation, power) VALUES(:name, :surname, :email, :password, :username, :confirmkey, :authentified, :age, :creation, :power)");
    $query->execute([
        ":email" => $input_email,
        ":name" => $input_name,
        ":surname" => $input_surname,
        ":username" => $input_username,
        ":password" => $hashedPassword,
        ":confirmkey" => $key,
        ":authentified" => $authentified,
        ":age" => $input_age,
        ":creation" => $date_creation,
        ":power" => $power
]);
    
    $_SESSION["connected"] = true;
    mail(
        $input_email,
        'Verification email Coachin',
        'Voici votre code de confirmation : ' . $key
      );
      $_SESSION["authentified"] = false;
      $_SESSION["email_connexion"] = $input_email;
      $_SESSION["username"] = $input_username;
      $_SESSION["name"] = $input_name;
      $_SESSION["surname"] = $input_surname;
      $_SESSION["passwords"] = $hashedPassword;
      header("Location: ../inc/index.php");
}
else{
    $_SESSION["error_email_exist"] = "Email already exist";
    header("Location: ../inc/inscription2.php");
    die();
}




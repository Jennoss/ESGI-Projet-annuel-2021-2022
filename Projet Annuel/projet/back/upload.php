<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();

require('./bdd_connexion.php');

$bdd_connexion = bddConnect();

$query = $bdd_connexion->prepare("SELECT username FROM USER WHERE email = :email");
$query -> execute([
    ":email" => $_SESSION["username"]
]);
$username = $query -> fetchAll();

//basename($_FILES["fileToUpload"]["name"])
$target_dir = "./upload/profil/";

$target_file = $target_dir . $username[0][0];

$uploadOk = 1;



// Check if image file is a actual image or fake image

if(!isset($_POST["submit"])) {

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

      } else {
            $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
            $image_name = $username[0][0] . "." . $imageFileType;
            $query = $bdd_connexion->prepare("UPDATE USER SET image = :image WHERE email = :email");
            $query -> execute([
                ":email" => $_SESSION["username"],
                ":image" => $image_name
            ]);
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file  . "." .  $imageFileType);
            header("Location: ../inc/parameter.php");
        }
    }
?>
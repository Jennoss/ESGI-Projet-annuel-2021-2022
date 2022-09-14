<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();

require('./bdd_connexion.php');
require('./function.php');

$bdd_connexion = bddConnect();

$query = $bdd_connexion->prepare("SELECT username FROM USER WHERE email = :email");
$query -> execute([
    ":email" => $_SESSION["username"]
]);
$username = $query -> fetchAll();

//basename($_FILES["fileToUpload"]["name"])
$target_dir = "./gallery-upload/";

$target_file = $target_dir . $username[0][0];

$uploadOk = 1;



$key = mt_rand(1, 99999);






$query = $bdd_connexion->prepare("SELECT publications FROM USER WHERE email = :email");
$query -> execute([
    ":email" => $_SESSION["username"]
]);
$getPublications = $query -> fetchAll();
$publicationsNbr = intval($getPublications[0][0]);
$publicationsNbr = $publicationsNbr + 1;




if(!isset($_POST["submit"])) {

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

      } else {
            $imageFileType = strtolower(pathinfo($_FILES["galleryUpload"]["name"], PATHINFO_EXTENSION));
            $image_name = $username[0][0] . $key . "." .  $imageFileType;
            $query = $bdd_connexion->prepare("INSERT INTO gallery SET image = :image, email = :email");
            $query -> execute([
                ":email" => $_SESSION["username"],
                ":image" => $image_name
            ]);
            move_uploaded_file($_FILES["galleryUpload"]["tmp_name"], $target_file  .  $key . "." . $imageFileType);

            header('Location: ../inc/album.php?username=' . $_SESSION['username']);
        }
    }
?>
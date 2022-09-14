<?php 
    
    require_once('../back/bdd_connexion.php');

    if(!$_SESSION["connected"]){
        header("Location: ./connexion.php");
    }
    error_reporting(0);

    $bdd_connexion = bddConnect();

    if(isset($_SESSION["power"]) && $_SESSION["power"] === "admin"){
        header("Location: ./admin.php");
    }

    $query = $bdd_connexion->prepare("SELECT username FROM USER WHERE email = :email");
    $query -> execute([
        ":email" => $_SESSION["username"]
    ]);
    $username = $query -> fetchAll();

    

    $_SESSION["image-name"] = basename($username[0][0]);

    $requete = $bdd_connexion -> prepare("SELECT image FROM USER WHERE email = :email");
    $requete -> execute([
        ":email" => $_SESSION["username"]
    ]);

    $image_name = $requete -> fetchAll();
    
    
?>
<head>
    <link rel="stylesheet" href="../src/css/mon_espace.css">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
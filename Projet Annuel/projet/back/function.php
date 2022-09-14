<?php

require_once('../back/bdd_connexion.php');



function getImage($me = false) {
    $bdd_connexion = bddConnect();
    $query = $bdd_connexion->prepare("SELECT username FROM USER WHERE email = :email");
    $query -> execute([
        ":email" => $me ? $_SESSION['username'] : $_GET["username"]
    ]);
    $username = $query -> fetchAll();
    
    
    
    $_SESSION["image-name"] = basename($username[0][0]);
    
    $requete = $bdd_connexion -> prepare("SELECT image FROM USER WHERE email = :email");
    $requete -> execute([
        ":email" => $me ? $_SESSION['username'] : $_GET["username"]
    ]);
    
    $image_name = $requete -> fetchAll();
    
    return $image_name[0][0];
}


function getBannerImage($me = false){
    $bdd_connexion = bddConnect();
    $query = $bdd_connexion->prepare("SELECT username FROM USER WHERE email = :email");
    $query -> execute([
        ":email" => $me ? $_SESSION['username'] : $_GET["username"]
    ]);
    $username = $query -> fetchAll();
    
    
    
    $_SESSION["image-name"] = basename($username[0][0]);
    
    $requete = $bdd_connexion -> prepare("SELECT image_banner FROM USER WHERE email = :email");
    $requete -> execute([
        ":email" => $me ? $_SESSION['username'] : $_GET["username"]
    ]);
    
    $image_name = $requete -> fetchAll();
    
    return $image_name[0][0];
}


function getComments($me = false) {
    $bdd_connexion = bddConnect();
    $query = $bdd_connexion->prepare("SELECT id FROM gallery WHERE email = :email");
    $query -> execute([
        ":email" => $me ? $_SESSION['username'] : $_GET["username"]
    ]);

    $count = 0;
    $images = $query->fetchAll();
    foreach($images as $img) {
        $query = $bdd_connexion->prepare("SELECT COUNT(id) FROM comments WHERE image = :id");
        $query -> execute([
            ":id" => $img["id"]
        ]);
        $result = $query->fetchAll();
        $count += intval($result[0]["COUNT(id)"]);
    }
    return $count;
}

function getLike(){
    return 0;
}

function getPublications(){
    $bdd_connexion = bddConnect();
    $query = $bdd_connexion->prepare("SELECT COUNT(id) FROM gallery WHERE email = :email");
    $query -> execute([
        ":email" => $_GET["username"]
    ]);
    $publications = $query -> fetchAll();

    return $publications[0][0];
}


function getUsername(){
    $bdd_connexion = bddConnect();
    $query = $bdd_connexion->prepare("SELECT username FROM USER WHERE email = :email");
    $query -> execute([
        ":email" => $_GET["username"]
    ]);
    $username = $query -> fetchAll();

    return $username[0][0];
}


function checkGalleryEmpty(){
    $bdd_connexion = bddConnect();
    $query = $bdd_connexion->prepare("SELECT image FROM gallery WHERE email = :email");
    $query -> execute([
        ":email" => $_GET["username"]
    ]);
    $gallery = $query -> fetchAll();

    if(empty($gallery[0][0])){
        return true;
    } else {
        return false;
    } 
}



?>
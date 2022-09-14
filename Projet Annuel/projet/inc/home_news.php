<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/css/home_news.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Actualité</title>
</head>
<body>
    <?php    
    require('./navbar_new.php');
    if(empty($_SESSION["username"])){
        header('Location: index.php');
    }

    require_once('../back/function.php');

    $bdd_connexion = bddConnect(); 
    
    $query = $bdd_connexion -> prepare("SELECT id, email, image FROM gallery ORDER BY id DESC");
    $query -> execute([]);

    $informations = $query -> fetchAll();


    ?>


    <div class="container actu">

    <?php
        for($i = 0; $i < sizeof($informations); $i++){

            $query = $bdd_connexion -> prepare("SELECT image, username FROM USER WHERE email = :email");
            $query -> execute([
                ":email" => $informations[$i]["email"]
            ]);
        
            $getQuery = $query -> fetchAll();
            $image = $getQuery[0]["image"];
            $username = $getQuery[0]["username"];

            $query2 = $bdd_connexion -> prepare("SELECT image FROM gallery WHERE email = :email");
            $query2 -> execute([
                ":email" => $informations[$i]["email"]
            ]);

            $getQuery2 = $query2 -> fetch();


            $imagePost = $informations[$i]["image"];
            
            $email = $informations[$i]['email'];
            $profilRedirection = './album.php?username=' . $email;

    ?>

        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <div class="profil_container">
                    <div class="row row-container">
                        <div class="col-sm-2 nopm d-flex align-items-center justify-content-center">
                            <a class="usernameRedirect" href="<?php echo $profilRedirection ?>">
                                <img class="userIcon" src="../back/upload/profil/<?php echo $image ?>" alt="">
                            </a>
                        </div>
                        <div class="col-sm-8 nopm d-flex align-items-center">
                            <a href="<?php echo $profilRedirection ?>">
                                <span class="username"><?php echo $username ?></span>
                            </a>
                        </div>
                        
                        <div class="col-sm nopm d-flex flex-row-reverse justify-content-center align-items-center">
                            <i class="fa-solid fa-ellipsis"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <img class="img-gallery"  src="../back/gallery-upload/<?php echo $imagePost ?>" alt="" data-toggle="modal" data-target="#exampleModalCenter">
            </div>
        </div>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
        
    <?php } ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
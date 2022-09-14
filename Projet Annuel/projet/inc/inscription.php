<!DOCTYPE html>

<?php session_start(); ?>


<html lang="fr_FR">
<head>
  <link rel="icon" type="image/png" href="/projet/src/img/header/logo.png" />
  <link rel="stylesheet" href="../src/css/inscription.css" />
  <link rel="stylesheet" href="../src/css/connexion.css" />
  <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <?php 

      if($_SESSION["connected"]){
        header("Location: ./index.php");
        die();
      }

      if($_SESSION["power"] === "admin"){
        header("Location: ./admin.php");
      }

      
      require("./navbar.php"); 

      ?>


    <div class="container container-flat container-responsive">
        <div class="right"></div>

        <div class="left">
          <div class="header header-responsive">
            <img class="animation b1" src="../src/img/header/logo.png" alt="">
            <h2 class="mt-3 animation b2">Create Account</h2>
            <h4 class="animation b3">Log in to your account using email and password</h4>
          </div>
          <form class="form" method="POST" action="../back/register.php">
            <input type="name" class="form-field animation b4" placeholder="Prenom" name="name">
            <input type="surname" class="form-field animation b5" placeholder="Nom" name="surname">
            <input type="username" class="form-field animation b6" placeholder="Nom d'utilisateur" name="username">
            <input type="email" class="form-field animation b7" placeholder="Adresse email" name="email">
            <input type="date" class="form-field animation b8" placeholder="Date de naissance" name="naissance">
            <input type="password" class="form-field animation b9" placeholder="Mot de passe" name="password">
            <input type="password" class="form-field animation b10" placeholder="Répéter le mot de passe" name="confirm_password">
            <button type="submit" class=" btn button-inscription mt-3 animation b11">CREATE</button>
            <p class="sign-up text-center animation b12"><a href="./inscription.php" class="hover-link hover-link-header pb-1">You already have an account ?</a></p>
          </form>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

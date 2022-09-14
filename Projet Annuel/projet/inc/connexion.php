<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr_FR">
<head>
  <link rel="icon" type="image/png" href="../src/img/header/logo.png" />
  <link rel="stylesheet" href="../src/css/connexion.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php 

      if($_SESSION["power"] === "admin"){
        header("Location: ./admin.php");
      }

      if($_SESSION["connected"]){
        header("Location: ./index.php");
        die();
      } 
      require("./navbar.php"); 

    
    ?>

    
      <div class="container container-flat container-responsive container-connexion">
        <div class="left">
          <div class="header header-responsive">
            <img class="animation b1" src="../src/img/header/logo.png" alt="">
            <h2 class="animation b2 mt-3">Welcome Back</h2>
            <h4 class="animation b3">Log in to your account using email and password</h4>
          </div>
          <form class="form" method="POST" action="../back/login.php">
            <input type="email" class="form-field animation b4" placeholder="Email Address" name="email" name="username">
            <input type="password" class="form-field animation b5" placeholder="Password" name="password">
            <p class="animation b6 text-center"><a href="#" class="hover-link forgot-password hover-link-header pb-1">Forgot Password</a></p>
            <button type="submit" class="animation b7 btn button-inscription">LOGIN</button>
            <p class="sign-up animation b8 text-center"><a href="./inscription.php" class="hover-link hover-link-header pb-1">You don't have account ?</a></p>
          </form>
        </div>
        <div class="right"></div>
      </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
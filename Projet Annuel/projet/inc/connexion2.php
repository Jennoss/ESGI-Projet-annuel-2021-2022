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
    
    require("./navbar.php"); 
    
    if($_SESSION["power"] === "admin"){
      header("Location: ./admin.php");
    }
    ?>

    
      <div class="container container-flat container-responsive container-connexion">
        <div class="left animation-none">
          <div class="header header-responsive">
            <img class="" src="../src/img/header/logo.png" alt="">
            <h2 class="mt-3">Welcome Back</h2>
            <h4 class="">Log in to your account using email and password</h4>
          </div>
          <form class="form" method="POST" action="../back/login.php">


            <input type="email" class="form-field" placeholder="Email Address" name="email" name="username">

            <?php if (isset( $_SESSION["error_users_not_exist"])): ?>
                <small class="error text-danger mt-1"><?php echo  $_SESSION["error_users_not_exist"]; ?></small>
                <?php unset( $_SESSION["error_users_not_exist"]); ?>
            <?php endif; ?>



            <input type="password" class="form-field" placeholder="Password" name="password">

            <?php if (isset($_SESSION["error_wrong_password"])): ?>
                <small class="error text-danger mt-1"><?php echo  $_SESSION["error_wrong_password"]; ?></small>
                <?php unset($_SESSION["error_wrong_password"]); ?>
            <?php endif; ?>



            <p class="text-center"><a href="#" class="hover-link forgot-password hover-link-header pb-1">Forgot Password</a></p>
            <button type="submit" class="btn button-inscription">LOGIN</button>
            <p class="sign-up text-center"><a href="./inscription.php" class="hover-link hover-link-header pb-1">You don't have account ?</a></p>
          </form>
        </div>
        <div class="right"></div>
      </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
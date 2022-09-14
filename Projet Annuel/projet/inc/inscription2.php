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
    
    require("./navbar.php"); 
    if($_SESSION["connected"]){
      header("Location: ./index.php");
      die();
    }

    if($_SESSION["power"] === "admin"){
        header("Location: ./admin.php");
      }

    
    ?>


    <div class="container container-flat container-responsive">
        
    <div class="right"></div>
        <div class="left animation-none">
          <div class="header header-responsive">
            <img class="" src="../src/img/header/logo.png" alt="">
            <h2 class="mt-3">Create Account</h2>
            <h4 class="">Log in to your account using email and password</h4>
          </div>
          <form class="form" method="POST" action="../back/register.php">

            <input type="name" class="form-field" placeholder="Prenom" name="name">


            <?php if (!empty($_SESSION["error_empty_name"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_empty_name"]; ?></small>
                <?php unset( $_SESSION["error_empty_name"]); ?>
            <?php endif; ?>

            <input type="surname" class="form-field" placeholder="Nom" name="surname">

            <?php if (!empty( $_SESSION["error_empty_surname"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_empty_surname"]; ?></small>
                <?php unset( $_SESSION["error_empty_surname"]); ?>
            <?php endif; ?>




            <input type="username" class="form-field" placeholder="Nom d'utilisateur" name="username">

            <?php if (isset( $_SESSION["error_empty_username"])){ ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_empty_username"]; ?></small>
                <?php unset( $_SESSION["error_empty_username"]); ?>
            <?php } ?>

            <?php if (isset( $_SESSION["error_size_username"])) { ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_size_username"]; ?></small>
                <?php unset( $_SESSION["error_size_username"]); ?>
            <?php } ?>

            <?php if (isset( $_SESSION["username_exist"])) { ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["username_exist"]; ?></small>
                <?php unset( $_SESSION["username_exist"]); ?>
            <?php } ?>





            <input type="email" class="form-field" placeholder="Adresse email" name="email">


            <?php if (!empty( $_SESSION["error_empty_email"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_empty_email"]; ?></small>
                <?php unset( $_SESSION["error_empty_email"]); ?>
            <?php endif; ?>

            <?php if (!empty($_SESSION["wrong_email"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["wrong_email"]; ?></small>
                <?php unset( $_SESSION["wrong_email"]); ?>
            <?php endif; ?>

            <?php if (!empty($_SESSION["error_email_exist"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_email_exist"]; ?></small>
                <?php unset( $_SESSION["error_email_exist"]); ?>
            <?php endif; ?>



            <input type="date" class="form-field" placeholder="Date de naissance" name="naissance">

            <?php if (!empty($_SESSION["minor"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["minor"]; ?></small>
                <?php unset( $_SESSION["minor"]); ?>
            <?php endif; ?>


            <input type="password" class="form-field" placeholder="Mot de passe" name="password">

            <?php if (!empty( $_SESSION["error_empty_password"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_empty_password"]; ?></small>
                <?php unset( $_SESSION["error_empty_password"]); ?>
            <?php endif; ?>

            <?php if (!empty( $_SESSION["error_uppercase_missing"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_uppercase_missing"]; ?></small>
                <?php unset( $_SESSION["error_uppercase_missing"]); ?>
            <?php endif; ?>

            <?php if (!empty( $_SESSION["error_size_password"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_size_password"]; ?></small>
                <?php unset( $_SESSION["error_size_password"]); ?>
            <?php endif; ?>







            <input type="password" class="form-field" placeholder="Répétez le mot de passe" name="confirm_password">


            <?php if (!empty( $_SESSION["error_password_not_same"])): ?>
                <small class="mt-1 text-danger"><?php echo $_SESSION["error_password_not_same"]; ?></small>
                <?php unset( $_SESSION["error_password_not_same"]); ?>
            <?php endif; ?>



            <button type="submit" class=" btn button-inscription mt-3">CREATE</button>
            <p class="sign-up text-center"><a href="./inscription.php" class="hover-link hover-link-header pb-1">You already have an account ?</a></p>
          </form>
        </div>
        
      </div>             
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
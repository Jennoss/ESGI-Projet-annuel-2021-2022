<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="fr_FR">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/connexion.css" />
    <link rel="stylesheet" href="../src/css/authentification.css" />
    <title>Verify email</title>
</head>
<body>
    <div class="container container-flat container-responsive container-connexion  justify-content-center">
        <div class="res text-center">
          <div class="header header-responsive">
            <img class="" src="../src/img/header/logo.png" alt="">
            <h2 class="mt-3">Welcome !</h2>
            <h4 class="">We're excited to have you get started. First, you need to confirm your account. You will receive a confirmation email.</h4>
          </div>

          <i class="mt-4 fa-solid fa-rotate fa-6x fa-spin"></i>
          
          <form class="form mt-4" method="POST" action="../back/authentification_back.php">
            <input type="text" class="form-field text-center" placeholder="Verification code" name="verify" name="verify">
                <?php if (isset($_SESSION["wrong_verify_code"])): ?>
                    <small class="mt-1 text-danger"><?php echo $_SESSION["wrong_verify_code"]; ?></small>
                    <?php unset($_SESSION["wrong_verify_code"]); ?>
                <?php endif; ?>
            <button type="submit" class="btn button-verify mt-4">SUBMIT</button>
          </form>
          <h4 class="mt-5">If you have not received the confirmation email, please check in your SPAM otherwise click on the button below to resend the confirmation email.</h4>
          <form class="form form-2" action="../back/resend_email.php" method="POST">
            <button type="submit" class="btn button-verify resend mt-4">Resend</button>
          </form>
          
        </div>
    </div>
    <script src="../src/js/captcha.js"></script>
  </body>
</html>


<!DOCTYPE html>
<html lang="fr_FR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./src/img/header/logo.png" />
  <link rel="stylesheet" href="./src/css/index.css" >
  <title>Coach'in</title>
</head>
<body>
    <?php 
      session_start();
      
      
      require_once("../back/bdd_connexion.php");

      if(isset($_SESSION["username"]) && isset($_SESSION["power"])){
        $bdd_connexion = bddConnect();
        $query = $bdd_connexion -> prepare ("SELECT power FROM USER WHERE email = :email;");
        $query -> execute ([
          ":email" => $_SESSION["username"]
        ]);
  
        $power = $query -> fetchAll();
        $_SESSION["power"] = $power[0][0];
      }



      if(isset($_SESSION["power"]) && $_SESSION["power"] === "admin"){
        header("Location: ./admin.php");
      }


      if(isset($_SESSION["authentified"]) && $_SESSION["authentified"] === false) {
        $_SESSION["connected"] = false;
        header("Location: ../inc/authentification.php");
        die();
    }
    
      if(isset($_SESSION["connected"]) && $_SESSION["connected"]){
        require("./navbarConnected.php");
      } else {
        require("./navbar.php"); 
      }
      require("./header.php"); 

      

    ?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr_FR">

<head>
  <link rel="icon" type="image/png" href="../src/img/header/logo.png" />
  <link rel="stylesheet" href="../src/css/connexion.css" />
  <link rel="stylesheet" href="../src/css/abonnement.css" />
  <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<?php 
      session_start();

      if($_SESSION["power"] === "admin"){
        header("Location: ./admin.php");
      }

      
      if($_SESSION["connected"]){
        require("./navbarConnected.php");
      } else {
        require("./navbar.php"); 
      }
    ?>

  <div class="abonnement-header">

    <div class="container container-size container-flat justify-content-center align-items-end">
      <div class="d-flex flex-column mb-3">
        <p class="nos_formules text-center">NOS FORMULES</p>
        <p class="apartir">À partir de<span class="price"> 9,90€</span>/mois</p>
        <a href="#" class="text-center"><button class="btnn mb-2"><div class="text img-fluid">J'en profite !</div></button></a>
      </div>
    </div>
  </div>

  <div class="container mt-5 mb-5 abonnement-container">
    <div class="row abonement-box d-flex justify-content-center">


      <div class="col-3 mx-4 d-flex justify-content-center abonnement-item">
        <div class="banner-abonnement">

          <div class="abonnement-title align-middle">
            FREEMIUM
          </div>

          <div class="abonnement-price">
            <div class="text-center pt-3">
              <div class="price-abonnement"><span class="first-number">0</span>,00€/mois</div>
              <div class="engagement">Aucun engagement</div>
              <div class="gratuit">100% Gratuit</div>
            </div>
          </div>

          <div class="text-center button-placement">
            <a href="#" class=""><button type="submit" class="button-freemium"><span class="button-name">J'en
                  profite</span></button></a>
          </div>


          <div class="abonnement-description">
            <div class="pt-5">
              <div class="description-list">
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Accès
                    aux programmes basiques</span></div>
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Aucun
                    engagement</span></div>
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Aucun
                    paiement requis</span></div>
              </div>
            </div>

            <div class="pt-5 pl-2">
              <p class="text-center mt-4 line-container"><span class="line pb-5">Notre mission</span></p>
            </div>

            <div class="mission-container">
              <p class="mission text-center mt-4">Parce que le sport est essentiel COACH’IN s’engage à permettre au plus
                grand nombre de personnes de pratiquer une activité physique</p>
            </div>

          </div>



        </div>
      </div>








      <div class="col-3 mx-4 d-flex justify-content-center abonnement-item">
        <div class="banner-abonnement">

          <div class="abonnement-title align-middle">
            PREMIUM
          </div>

          <div class="abonnement-price">
            <div class="text-center pt-3">
              <div class="price-abonnement"><span class="first-number">9</span>,90€/mois</div>
              <div class="engagement">Aucun engagement</div>
            </div>
          </div>

          <div class="text-center button-placement">
            <a href="#" class=""><button type="submit" class="button-freemium"><span class="button-name">Je m'abonne</span></button></a>
          </div>


          <div class="abonnement-description">
            <div class="pt-5">
              <div class="description-list">
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Accès à tous les programmes premiums</span></div>
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Accès aux programmes basiques</span></div>
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Aucun engagement</span></div>
              </div>
            </div>

            <div class="pt-4 pl-2 mt-3">
              <p class="text-center mt-4 line-container"><span class="line">Starter program</span></p>
              <div class="list-name mb-2 pt-2"><i class="fa-solid fa-check"></i><span class="underline-description">Objectifs personnalisés</span></div>
                <div class="list-name pt-2"><i class="fa-solid fa-check"></i><span class="underline-description">Satisfait ou remboursé</span></div>
            </div>

          </div>
        </div>
      </div>





      <div class="col-3 mx-4 d-flex justify-content-center abonnement-item">
        <div class="banner-abonnement">

          <div class="abonnement-title align-middle">
            PRIME
          </div>

          <div class="abonnement-price">
            <div class="text-center pt-3">
              <div class="price-abonnement"><span class="first-number">19</span>,90€/mois</div>
              <div class="engagement">Aucun engagement</div>
            </div>
          </div>

          <div class="text-center button-placement">
            <a href="#" class=""><button type="submit" class="button-freemium"><span class="button-name">Je m'abonne</span></button></a>
          </div>


          <div class="abonnement-description">
            <div class="pt-5">
              <div class="description-list">
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Accès à TOUS les programmes sportifs</span></div>
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Coaching personnalisé</span></div>
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Tes avantages PRIME exclusifs !</span></div>
                <div class="list-name mb-2"><i class="fa-solid fa-check"></i><span class="underline-description">Aucun engagement</span></div>
              </div>
            </div>

            <div class="pt-3 pl-2">
              <p class="text-center line-container"><span class="line">Starter program</span></p>
              <div class="list-name mb-2 pt-1"><i class="fa-solid fa-check"></i><span class="underline-description">Bilan sportif</span></div>
              <div class="list-name mb-2 pt-1"><i class="fa-solid fa-check"></i><span class="underline-description">Objectifs personnalisés</span></div>
              <div class="list-name mb-2 pt-1"><i class="fa-solid fa-check"></i><span class="underline-description">Satisfait ou remboursé</span></div>
            </div>


          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="background-container mt-5 test">
    <div class="row container">

      <div class="col space-prime mb-5 pt-4">
        <p class="text-center"><span class="line avantages">Tes avantages PRIME</span></p>
      </div>

      <div class="row avantages-list"> 
        <div class="col">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon1.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Experience Coach’In</span></p>
          <p class="text-center text-prime">1 Session avec le coach de ton choix</p>
          <p class="text-little-prime text-center">Tu auras la possibilité de choisir parmi  de nombreux coachs parmi notre sélection</p>
        </div>

        <div class="col">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon2.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Pause vacances</span></p>
          <p class="text-center text-prime">30 jours de suspension / an</p>
          <p class="text-little-prime text-center">Envie de faire une pause ? Pas de panique, tu pourras mettre ton abonnement en Pause quand tu le souhaites !</p>
        </div>

        <div class="col">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon3.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Parrainage</span></p>
          <p class="text-center text-prime">1 mois offert / parrainage</p>
          <p class="text-little-prime text-center">Tu pourras inviter un de t’es proches pour qu’il profite des avantages PRIME avec toi !</p>
        </div>

        <div class="col">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon4.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Programmes exclusifs</span></p>
          <p class="text-center text-prime">Bénéficier de programmes sportifs exclusifs !</p>
          <p class="text-little-prime text-center">Tu aura accés à des programmes sportifs exclusifs conçus par notre équipe de coach !</p>
        </div>
      </div>



      <div class="row d-flex flex-column show-hide test"> 
        <div class="col show-hide">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon1.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Experience Coach’In</span></p>
          <p class="text-center text-prime">1 Session avec le coach de ton choix</p>
          <p class="text-little-prime text-center">Tu auras la possibilité de choisir parmi  de nombreux coachs parmi notre sélection</p>
        </div>

        <div class="col show-hide">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon2.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Pause vacances</span></p>
          <p class="text-center text-prime">30 jours de suspension / an</p>
          <p class="text-little-prime text-center">Envie de faire une pause ? Pas de panique, tu pourras mettre ton abonnement en Pause quand tu le souhaites !</p>
        </div>

        <div class="col show-hide">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon3.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Parrainage</span></p>
          <p class="text-center text-prime">1 mois offert / parrainage</p>
          <p class="text-little-prime text-center">Tu pourras inviter un de t’es proches pour qu’il profite des avantages PRIME avec toi !</p>
        </div>

        <div class="col show-hide">
          <img class="icon-aventages mb-3 img-fluid" src="../src/img/abonnement/icon4.png" alt="">
          <p class="text-center mb-4"><span class="line avantages pt-2">Programmes exclusifs</span></p>
          <p class="text-center text-prime">Bénéficier de programmes sportifs exclusifs !</p>
          <p class="text-little-prime text-center">Tu aura accés à des programmes sportifs exclusifs conçus par notre équipe de coach !</p>
        </div>
      </div>

      

    </div>
  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>
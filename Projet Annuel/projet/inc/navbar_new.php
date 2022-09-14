<head>
    <link rel="stylesheet" href="../src/css/navbar_new.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
</head>

    
<?php

        session_start();
        
        if(empty($_SESSION["username"])){
            header('Location: index.php');
        }
        require_once('../back/bdd_connexion.php');
        $bdd_connexion = bddConnect();
        $query = $bdd_connexion->prepare("SELECT compte_information FROM USER WHERE email=:email");
        $query -> execute ([
            ":email" => $_SESSION["username"]
        ]);
    
        $account_information = $query -> fetchAll();
        $accountValid = $account_information[0][0];
    
        if($accountValid == 0) {
            header('Location: ./form-secondary.php');
        }

        require_once('../back/function.php');
        $profil_image = getImage(true);
        $banner_image = getBannerImage(true);
    ?>
 
 
 <!--Main Navigation-->
    <header class="mb-5">
  <!-- Jumbotron -->




  <div class="p-3 text-center text-white background-navbar fixed-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
          <a href="#!" class="ms-md-2">
            <img src="../src/img/header/logo.png" height="35" />
          </a>
        </div>

        <div class="col-md-4">
          <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
            <input id="searchbar" oninput='search()' autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
            <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search "></i></span>
          </form>
        </div>



        <div class="col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">
            <div class="dropdown">
                <button onclick = "home()" class="text-reset d-flex align-items-center hidden-arrow avatar-toggle house" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="../src/img/navbar_new/home.png" height="28" width="28" alt="" loading="lazy" />
                </button>
            </div>



            <div class="dropdown">
                <button class="text-reset d-flex align-items-center hidden-arrow avatar-toggle house" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="../src/img/navbar_new/heart.png" height="28" width="28" alt=""
                    loading="lazy" />
                </button>
            </div>




            <div class="dropdown">
              <form class="padding-form tesst" action="../back/galleryUpload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="galleryUpload" id="galleryUpload" onchange="form.submit()" hidden>
                <label onclick = "btnClickGallery()" class="" for="customFile"><img class="button-add" src="../src/img/navbar_new/ajouter.png" height="28" width="28" alt="" loading="lazy" /></label>
              </form>
            </div>


            <div class="dropdown">
                <button class="text-reset d-flex align-items-center hidden-arrow avatar-toggle house" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="../src/img/navbar_new/notification.png" class="" height="28" width="28" alt="" loading="lazy" />
                </button>
            </div>

            <div class="dropdown">
              <button class="text-reset d-flex align-items-center hidden-arrow avatar-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../back/upload/profil/<?php echo $profil_image ?>" style="object-fit : cover;" class="rounded-circle" height="32" width="32" alt=""
                  loading="lazy" />
              </button>

              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="./album.php?username=<?php echo $_SESSION['username'] ?>">My profile</a></li>
                <li><a class="dropdown-item" href="./parameter.php">Parametre</a></li>
                <li><a class="dropdown-item" href="../inc/logout.php">Deconnexion</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src='../src/js/searchbar.js'></script>

  
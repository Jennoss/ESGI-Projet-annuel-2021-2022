<head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/header.css">
    <link rel="stylesheet" href="../src/css/main-header.css">
    <link rel="stylesheet" href="../src/css/navbarConnexion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>

</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light header-main">
            <div class="container-fluid">
                <a class="navbar-brand" href="/projet/index.php"><img class="header_logo" src="/projet/src/img/header/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse row" id="navbarNav">
                    <ul class="navbar-nav nav-navbar">

                            <li class="nav-item nav-list">
                                <a class="nav-link hover-link header-text-color" href="/projet/index.php">Accueil</a>
                            </li>
                            <li class="nav-item nav-list">
                                <a class="nav-link hover-link header-text-color" href="/projet/inc/abonnement.php">Abonnement</a>
                            </li>
                            <li class="nav-item nav-list">
                                <a class="nav-link hover-link header-text-color" href="./programmes.php">Programmes</a>
                            </li>

                        <div class="col"></div>

                        <div class="dropdown dropdown-user">
                            <button class="btn btn-secondary user-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <li class="nav-item nav-item-connexion">
                                <i class="fa-solid fa-user fa-xl user align-middle mt-2"></i>
                            </li>
                            </button>
                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="./album.php?username=<?php echo $_SESSION['username'] ?>">Mon espace</a>
                                <a class="dropdown-item" href="./parameter.php?username=<?php echo $_SESSION['username'] ?>">Parametre</a>
                                <a href="./logout.php" class="dropdown-item">Deconnexion</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav> 

        
</body>

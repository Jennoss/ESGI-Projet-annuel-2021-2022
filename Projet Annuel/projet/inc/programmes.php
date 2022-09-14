<?php 
    session_start();

    if($_SESSION["power"] === "admin"){
        header("Location: ./admin.php");
    }



    if($_SESSION["connected"]){
        require("./navbarConnected.php");
    } else {
        header('Location: ./inscription.php');
    }

?>



<head>
    <link rel="stylesheet" href="../src/css/programmes.css">
</head>
<body>
    <div class="background-programmes">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                </div>  
                <div class="col-md space-top text-white">
                    <div class="row">

                        <div class="col-md mt-5">
                            <div class="card text-white bg-dark" >
                                <img src="../src/img/programmes/etirement.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Étirement</h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md mt-5"> 
                            <div class="card text-white bg-dark" >
                                <img src="../src/img/programmes/vitesse.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Vitesse</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md mt-5">
                            <div class="card text-white bg-dark" >
                                <img src="../src/img/programmes/endurance.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Endurance</h5>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row justify-content-md-center">

                        <div class="col-md-4 mt-5">
                            <div class="card text-white bg-dark" >
                                <img src="../src/img/programmes/souplesse.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Souplesse</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-5"> 
                            <div class="card text-white bg-dark" >
                                <img src="../src/img/programmes/renforcement.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Renforcement</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>
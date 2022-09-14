
<head>
    <link rel="stylesheet" href="../src/css/album.css">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
</head>

    
    <?php

        require('./navbar_new.php');
        if(empty($_SESSION["username"])){
            header('Location: index.php');
        }

        require_once('../back/function.php');
        $profil_image = getImage();
        $banner_image = getBannerImage();


        $bdd_connexion = bddConnect();

        $query = $bdd_connexion->prepare("SELECT image, id FROM gallery WHERE email = :email");
        $query -> execute([
            ":email" => $_GET["username"]
        ]);
        $gallery = $query -> fetchAll();

        $query = $bdd_connexion -> prepare("SELECT email FROM USER WHERE email = :email");
        $query -> execute ([
            ":email" => $_SESSION['username']
        ]);
        $username = $query -> fetchAll();
        $getUsername = $username[0][0];


       
    ?>

<body>


    <div class="container body-container mt-5" style="margin-top: 100px!important">
        <div class="container row padding-margin d-flex mx-auto">
            <div class="col-12">
                <div class="profil-banner" style="background-image: url('../back/upload-profil-banner/<?php echo $banner_image; ?>')">
                    <?php if($_GET["username"] == $getUsername){ ?>
                        <form action="../back/upload-profil-banner.php" method="post" enctype="multipart/form-data" id="form-upload" class="d-flex flex-row-reverse">
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="form.submit()" hidden>
                            <label onclick = "btnClick()" class="btn btn-success-soft btn-block submit-banner" for="customFile"><i class="fa-solid fa-pen"></i></label>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <img class="d-flex mx-auto profil-photo" src="../back/upload/profil/<?php echo $profil_image ?>" alt="">
                </div>
            </div>
        </div>

        <div class="container text-center mt-5">
            <div class="row justify-content-md-center">
                <div class="col-4">
                <span class="padding d-flex flex-row-reverse"><?php echo getPublications(); ?> publications</span>
                </div>
                <div class="col-4">
                <span class="padding d-flex align-items-center justify-content-center"><?php echo getComments() ?> commentaires</span>
                </div>
                <div class="col-4">
                <span class="padding d-flex flex-row"><?php echo getLike(); ?> j'aime</span>
                </div>
            </div>
        </div>
        <div class="container text-center mt-5">
            <span class="profil-username"><?php echo getUsername() ?></span>
        </div>

        <div class="container mt-5 line-bottom"></div>

        <div class="container mt-3 text-center test">
            <span class="publications"><i class="fa-solid fa-bars"></i>PUBLICATIONS</span>
        </div>
        <!-- Gallery -->
        <?php if(checkGalleryEmpty() && $_GET["username"] == $getUsername) { ?>
            <div class="row gallery mt-4">
                <div class="col-lg-2 col-md-12 mb-4 mb-lg-0">
                    <img
                    src="https://resize2.prod.docfr.doc-media.fr/rcrop/1200,675,center-middle/img/var/doctissimo/storage/images/fr/www/forme/fitness/666046-110-fre-FR/fitness.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                    />

                    <img
                    src="https://media.istockphoto.com/photos/personal-weight-training-picture-id1088471402?k=20&m=1088471402&s=612x612&w=0&h=bZVbUVY9C1Txhs4VMSPmQnV8SWMzhYJVffrLTUCGwko="
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                    />
                </div>

                <div class="col-lg-2 mb-4 mb-lg-0">
                    <img
                    src="https://media.istockphoto.com/photos/cross-training-fitness-rowing-machine-exercising-picture-id953450470?k=20&m=953450470&s=612x612&w=0&h=wDQKa6FwP4F3wMUmJyDAg9GXOsknZSSQSGGeXLN98uY="
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                    />

                    <img
                    src="https://i0.wp.com/letempledufitness.fr/wp-content/uploads/2020/08/shutterstock_571976104_700x465.jpg?ssl=1"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                    />
                </div>

                <div class="col-lg-2 mb-4 mb-lg-0">
                    <img
                    src="https://www.fitadium.com/conseils/wp-content/uploads/2020/05/tirage-vertical.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                    />

                    <img
                    src="https://us.123rf.com/450wm/tankist276/tankist2761701/tankist276170100121/70675891-guy-bodybuilder-fatigu%C3%A9-assis-dans-une-salle-de-sport-photo-verticale.jpg?ver=6"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                    />
                </div>

                <form action="../back/galleryUpload.php" method="post" enctype="multipart/form-data" class="col-lg-6 col-md-12 mb-lg-0 d-flex align-items-center flex-column">
                    <span class="description-gallery">Commencez à capturer et partager vos évolutions</span>
                    <input type="file" name="galleryUpload" id="galleryUpload" onchange="form.submit()" hidden>
                    <label onclick = "btnClickGallery()" class="btn btn-success-soft btn-block submit-gallery" for="customFile"><i class="fa-solid fa-circle-plus add-gallery fa-3x"></i></label>
                </form>
            </div>
        <?php } ?>
        <?php if((checkGalleryEmpty()) && ($_GET["username"] != $getUsername)){ ?>
        <div id="container-nonuser">
            <img class="img-fluid rounded mx-auto d-block" id="image-no-gallery" src="../src/img/main-article/no-image-gallery.png" alt="">
            <span id="text-no-gallery">Cet utilisateur n'a encore rien publier pour l'instant. Un peu de patience !</span>
        </div>
        <?php } ?>
        
        <div class="container mt-5 mb-5">
            <div class="row">
                <?php for($i = count($gallery) - 1; $i >= 0 ; $i--){ ?>
                    <div class="col-sm-4">
                        <img img-id="<?php echo $gallery[$i]['id']; ?>" data-toggle="modal" data-target=".bd-example-modal-xl" class="img-fluid shadow-1-strong rounded mb-4 image-gallery" src="../back/gallery-upload/<?php echo $gallery[$i][0]; ?>" alt="">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>




        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-md-8 no-padding">
                            <img id="img-modal" src="" alt="">
                        </div>

                        <div class="col-md-4 no-padding height-right">
                        
                            <div class="d-flex flex-column" style="height: 850px;">
                                <div class="p-2 row line">
                                    <div class="col-sm-2">
                                        <img class="profil-modal-photo" src="../back/upload/profil/<?php echo $profil_image ?>" alt="">
                                    </div>
                                    <div class="col-sm">
                                        <label type="text" readonly class="form-control-plaintext"><?php echo getUsername() ?></label>
                                    </div>



                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex">
                                            <span class="span-modal">Voulez-vous vraiment supprimer cet élément ?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button onclick="redirectionDeleteGallery()" type="button" class="btn btn-primary">Confirmer</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-sm">
                                        <i type="button" class="fa-solid fa-trash fa-1x" data-toggle="modal" data-target="#exampleModalCenter"></i>
                                    </div>
                                </div>

                                <div class="comment-container">

                                </div>
                                <div class="mt-auto p-2"><input type="text"  id="comment" class="input-comment">
                            
                                </div>
                            </div>
                        </div>


                        <!-- 
                            <div class="row first-row">
                                <div class="col-sm-2 no-padding">
                                    
                                </div>
                                <div class="col-sm-10">
									
                                </div>
                            </div>

                            <div class="line-username"></div>


                            <div class="row commentaires">
                                <div class="col-12">Yo</div>
                            </div> -->





                    </div>
                </div>
            </div>
        </div>
        
        
    <script src="../src/js/profil_page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>



<?php 


ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

require('./navbar_new.php');
require('./mon_espace.php');


if(isset($_SESSION["power"]) && $_SESSION["power"] === "admin"){
    header("Location: ./admin.php");
  }

  

$query = $bdd_connexion->prepare("SELECT email FROM USER WHERE username = :username");
$query -> execute([
    ":username" => $username[0][0]
]);
$email = $query -> fetchAll();

$query = $bdd_connexion->prepare("SELECT username, name, surname, age, taille, cp, poid, telephone, genre, creation, objectif, morphologie, objectif_physique, zone_corp, cadence, materiel, pompes, poid_cible FROM USER WHERE username = :username");
$query -> execute([
    ":username" => $username[0][0]
]);
$account = $query -> fetchAll();  

$query = $bdd_connexion->prepare("SELECT date_format(creation, '%d/%m/%Y') FROM USER WHERE username = :username");
$query -> execute([
    ":username" => $username[0][0]
]);
$date = $query -> fetchAll();


$username = $account[0][0];
$name = $account[0][1];
$surname = $account[0][2];
$age = $account[0][3];
$taille = $account[0][4];
$cp = $account[0][5];
$poid = $account[0][6];
$telephone = $account[0][7];
$genre = $account[0][8];

$date = $date[0][0];

$objectif = $account[0][10];
$morphologie = $account[0][11];
$objectif_physique = $account[0][12];
$zone_corp = $account[0][13];
$cadence = $account[0][14];
$materiel = $account[0][15];
$pompes = $account[0][16];
$poid_cible = $account[0][17];
        
$adresse_email = $email[0][0];


?>

<head>
    <link rel="stylesheet" href="../src/css/parameter.css">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
</head>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<body>

<div class="container">
<div class="row">
		<div class="col-12">
			<!-- Page title -->
			<div class="my-5">
				<h3>My Profile</h3>
				<hr>
			</div>
			<!-- Form START -->
			<form class="file-upload">
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Contact detail</h4>
								<!-- First Name -->
								<div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Nom</label>
									<label type="text" readonly class="form-control-plaintext"><?php echo $name; ?></label>
								</div>


								<!-- Last name -->
								<div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Prenom</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo  $surname; ?></label>
								</div>

								<div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Nom d'utilisateur</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $username ?></label>
								</div>

								<!-- Phone number -->
								<div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Date de creation</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo  $date; ?></label>
								</div>
								<!-- Mobile number -->
								<div class="col-md-4">
                                    <label for="staticEmail" class="col-sm-5 col-form-label name-profil">Age</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $age . " ans"; ?></label>
								</div>
								<!-- Email -->
								<div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Taille</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo  $taille . " cm"; ?></label>
								</div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Genre</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $genre; ?></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Code postale</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo  $cp; ?></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Poid</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $poid . " kg"; ?></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Telephone</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $telephone; ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Objectif</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $objectif ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Physique voulu</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $objectif_physique; ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Morphologie</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $morphologie; ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Zone du corp à travailler</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $zone_corp; ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Cadence</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $cadence; ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Materiel</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $materiel; ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Pompes</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $pompes; ?></label>
                                </div>

                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-form-label name-profil">Objectif de poid</label>
                                    <label type="text" readonly class="form-control-plaintext"><?php echo $poid_cible . " kg"; ?></label>
                                </div>

							</div> <!-- Row END -->
						</div>
					</div>
					<!-- Upload profile -->
					<div class="col-xxl-4 text-center">
						<div class="bg-secondary-soft px-4 py-5 rounded container-photo d-flex">
							<div class="row">
								<h4 class=" mt-2">Upload your profile photo</h4>
								<div class="text-center align-photo align-self-center align-items-center">
                                        <div class="square position-relative display-2 mb-5">
                                            <img id="img_profil" class="mx-auto d-block text-center" src="../back/upload/profil/<?php echo $image_name[0][0] ?>" alt="">
                                        </div>


									<!-- Button -->
                                    </form>
                                    <form id="form-upload" action="../back/upload.php" method="post" enctype="multipart/form-data" >
                                        <input type="file" name="fileToUpload" id="fileToUpload" hidden>
                                        <label onclick = "btnClick()" class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                                        <button onclick="if (confirm('Voulez vraiment supprimer votre image de profil ?')){location='../back/delete_file.php'}" type="button" class="btn btn-danger-soft">Remove</button>
                                    </form>
                                    
                                        
                                        <!-- Content -->
									<p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- Row END -->

				<!-- Social media detail -->
        
					<!-- change password -->
				<div class="col-xxl-12">
                    <form action="../back/change_password.php" class="form-password-change mt-3" method="post">
						<div class="bg-secondary-soft px-4 py-3 rounded">
                                <div class="row g-3">
                                    <h4 class="">Change Password</h4>
                                    <!-- Old password -->
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Mot de passe actuel</label>
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe" name="password">
                                    </div>
                                    <!-- New password -->
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Nouveau mot de passe" name="new_password">
                                    </div>
                                    <!-- Confirm password -->
                                    <div class="col-md-12">
                                        <label for="inputPassword" class="form-label">Confirmer le mot de passe</label>
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Confirmez le mot de passe" name="new_password2">
                                    </div>
							    </div>
						    </div>
					    </div>
				</div> <!-- Row END -->  
				<!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="button" class="btn btn-danger btn-lg">Delete profile</button>
                        <button type="button" class="btn btn-primary btn-lg">Update profile</button>
                    </div>
			</form> <!-- Form END -->
		</div>
	</div>
	</div>





<div class="container-fluid col-10">
    
    </div>
    </div>

        <form action="../back/form-secondary-back-2.php" class="mt-5 form-modify-profil" method="post">
            <h2 class="text-center mt-5">MODIFIER DES INFORMATIONS</h3>
            <div class="form-group container">

                <div class="row justify-content-md-center">
                    <div id="question1" class="question col-5">
                        <h3 class="text-center title mt-5">Combien mesures-tu ? (en cm)</h3>
                        <input class="input-value mt-5" type="number" id="taille" name="taille">
                    </div>
                    <div class="col-1"></div>
                    <div id="question2" class="question col-5">
                        <h3 class="text-center title mt-5">Tu es</h3>
                        <select class="form-select input-value mt-5" aria-label="Default select example" name="genre">
                            <option class="input-value" selected></option>
                            <option name="genre" value="Homme">Homme</option>
                            <option name="genre" value="Femme">Femme</option>
                            <option name="genre" value="Autres">Autres</option>
                        </select>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div id="question3" class="question col-5">
                        <h3 class="text-center title mt-5">Quel est ton code postale ?</h3>
                        <input class="input-value mt-5" type="number" id="cp" name="cp">
                    </div>
                    <div class="col-1"></div>
                    <div id="question4" class="question col-5">
                        <h3 class="text-center title mt-5">Quel est ton poid ?</h3>
                        <input class="input-value mt-5" type="number" id="poid" name="poid">
                    </div>
                </div>



                <div class="row justify-content-md-center">
                    <div id="question5" class="question col-5">
                        <h3 class="text-center title mt-5">Indiquez votre numéro de téléphone</h3>
                        <input class="input-value mt-5" type="tel" id="telephone" name="telephone">
                    </div>
                    <div class="col-1"></div>
                    <div id="question6" class="question col-5">
                        <h3 class="text-center title mt-5">Quel est ton objectif ?</h3>
                        <select class="form-select input-value mt-3" aria-label="Default select example" name="objectif" multiple aria-label="multiple select example">
                            <option name="objectif" value="Étre en forme">Étre en forme</option>
                            <option name="objectif" value="Perdre du poids">Perdre du poids</option>
                            <option name="objectif" value="Se muscler">Se muscler</option>
                            <option name="objectif" value="Être un athlète">Être un athlète</option>
                        </select>
                    </div>
                </div>





                <div class="row justify-content-md-center">
                    <div id="question7" class="question col-5">
                        <h3 class="text-center title mt-5">Quelle est ta morphologie</h3>
                        <select class="form-select input-value mt-3" aria-label="Default select example" name="morphologie" multiple aria-label="multiple select example">
                            <option name="morphologie" value="Mince">Mince</option>
                            <option name="morphologie" value="Normal">Normal</option>
                            <option name="morphologie" value="Rond">Rond</option>
                        </select>
                    </div>
                    <div class="col-1"></div>
                    <div id="question8" class="question col-5">
                        <h3 class="text-center title mt-5">Quel physique souhaites-tu ?</h3>
                        <select class="form-select input-value mt-3" aria-label="Default select example" name="objectif_physique" multiple aria-label="multiple select example">
                            <option name="objectif_physique" value="Physique athlétique">Physique athlétique</option>
                            <option name="objectif_physique" value="Physique Massif">Physique Massif</option>
                            <option name="objectif_physique" value="Physique sec">Physique sec</option>
                        </select>
                    </div>
                </div>



                <div class="row justify-content-md-center">
                    <div id="question9" class="question col-5">
                        <h3 class="text-center title mt-5">Quelles zones du corps veux-tu développer</h3>
                        <select class="form-select input-value mt-3" aria-label="Default select example" name="zone_corp" multiple aria-label="multiple select example">
                            <option name="zone_corp" value="Épaules">Épaules</option>
                            <option name="zone_corp" value="Bras">Bras</option>
                            <option name="zone_corp" value="Cuisses">Cuisses</option>
                            <option name="zone_corp" value="Mollets">Mollets</option>
                            <option name="zone_corp" value="Dos">Dos</option>
                            <option name="zone_corp" value="Pectoraux">Pectoraux</option>
                            <option name="zone_corp" value="Abdominaux">Abdominaux</option>
                            <option name="zone_corp" value="Fesses">Fesses</option>
                        </select>
                    </div>
                    <div class="col-1"></div>
                    <div id="question10" class="question col-5">
                        <h3 class="text-center title mt-5">Fais-tu du sport ?</h3>
                        <select class="form-select input-value mt-3" aria-label="Default select example" name="cadence" multiple aria-label="multiple select example">
                            <option name="cadence" value="0 à 1 fois par semaine">0 à 1 fois par semaine</option>
                            <option name="cadence" value="2 fois par semaine">2 fois par semaine</option>
                            <option name="cadence" value="3 fois par semaine ou plus">3 fois par semaine ou plus</option>
                        </select>
                    </div>
                </div>






                <div class="row justify-content-md-center">
                    <div id="question11" class="question col-5">
                        <h3 class="text-center title mt-5">Quel matériel as-tu ?</h3>
                        <select class="form-select input-value mt-3" aria-label="Default select example" name="materiel" multiple aria-label="multiple select example">
                            <option name="materiel" value="Aucun matériel">Aucun matériel</option>
                            <option name="materiel" value="Haltères">Haltères</option>
                            <option name="materiel" value="Barre de traction">Barre de traction</option>
                            <option name="materiel" value="Barre de musculation">Barre de musculation</option>
                            <option name="materiel" value="Kettlebell">Kettlebell</option>
                        </select>
                    </div>
                    <div class="col-1"></div>
                    <div id="question12" class="question col-5">
                        <h3 class="text-center title mt-5">Combien de pompes es-tu capable de faire ?</h3>
                        <select class="form-select input-value mt-3" aria-label="Default select example" name="pompes" multiple aria-label="multiple select example">
                            <option name="pompes" value="Moins de 10">Moins de 10</option>
                            <option name="pompes" value="Entre 10 et 20">Entre 10 et 20</option>
                            <option name="pompes" value="Plus de 20">Plus de 20</option>
                            <option name="pompes" value="Je ne sais pas">Je ne sais pas</option>
                        </select>
                    </div>
                </div>



                <div class="row justify-content-md-center">
                    <div id="question13" class="question col-5">
                        <h3 class="text-center title mt-5">Quel est ton poids cible ? (en kg)</h3>
                        <input class="input-value mt-5" type="number" id="poidCible" name="poidCible">
                    </div>
                </div>

                <button type="submit" class="btn save mt-5">Sauvegarder</button>

        </form>


        

        

</div>







    </div>

    <div class="col-1"></div>
</div>

<script src="../src/js/profil_page.js"></script>

</body>

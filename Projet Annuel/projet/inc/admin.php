<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>

<?php

    session_start();


    function bddConnect() {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $dsn = "mysql:host=54.37.8.83;dbname=MAIN;";
        $user = "lux";
        $password = "explosion80";
        $databaseConnection = new PDO($dsn, $user, $password);
        
        return $databaseConnection;
    }

    $bdd_connexion = bddConnect();

    $query = $bdd_connexion->prepare("SELECT name, surname, email, power, creation, username FROM USER");
    $query->execute();
    $account = $query -> fetchAll();

?>
<body>
    <a href="./logout.php">Disconnect</a>
    

    <table class="table container">
        <thead class="thead-dark">
            <tr class="text-center">
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Power</th>
            <th scope="col">Date de création</th>
            <th scope="col">Username</th>
            <th class="col-3 text-center" scope="col">Modifier</th>
            </tr>
        </thead>

        <tbody>
            <?php for($i = 0; $i < sizeof($account); $i++){ ?>
                <tr class="text-center">
                    
                    <?php for($j = 0; $j < 6; $j++) { ?>
                    <?php if($j === 3){ ?>
                    <td>
                    <select class="form-select" aria-label="Default select example" name="power">
                        <option class="input-value" selected><?php echo $account[$i][$j]; ?></option>

                        <?php if($account[$i][$j] != "admin") {?>
                        <option name="power" value="admin">admin</option>
                        <?php } ?>

                        <?php if($account[$i][$j] != "coach") {?>
                        <option name="power" value="coach">coach</option>
                        <?php } ?>

                        <?php if($account[$i][$j] != "user") {?>
                        <option name="power" value="user">user</option>
                        <?php } ?>

                    </select>
                    </td>
                    <?php } ?>

                    <?php if($j != 3) { ?>
                        <td><?php echo $account[$i][$j] ?></td>
                        <?php } ?>

                    <?php } ?>
                        <!-- <form action="" method=""> -->
                            <td class="text-center">
                                <button><i class="fa-solid fa-floppy-disk"></i></button>
                                <button><i class="fa-solid fa-message"></i></button>
                                <button onclick="deleteAccount('<?php echo $account[$i][2]; ?>')"><i class="fa-solid fa-xmark"></i></button>
                            </td>
                        <!--</form> -->

                </tr>
            <?php } ?>
            
        </tbody>
    </table>

    <script>

            function deleteAccount(name){
                if(confirm("Voulez-vous vraiment supprimer " + name)){
                    document.location.href = '../back/delete_account.php?email=' + name;
                    alert('Le compte ' + name + ' a été supprimé avec succès !');
                    location.reload();
                }
            }

    </script>
    <script src="../src/js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
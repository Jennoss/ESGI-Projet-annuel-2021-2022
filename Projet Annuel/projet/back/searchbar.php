<?php

require_once('./bdd_connexion.php');

$bdd_connect = bddConnect();

$query = $bdd_connect->prepare("SELECT image, username, email FROM USER WHERE username LIKE :search");
$query -> execute([
    ':search' => $_GET['searched'] . '%'
]);

$result = $query -> fetchAll();

echo json_encode($result);



?>
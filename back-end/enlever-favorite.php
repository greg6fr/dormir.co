<?php

session_start();
require('../class/database.php');

// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

//delete($pdo, $table, $champ_id,$array, $numero)
$array = [
    $_GET["id_ad"],
    $_SESSION['id_user']
];
$champs=['id_ad','id_user'];
$where=['?','?'];

$delete = $database->deleteTwoParams($pdo, "favorite", $champs,$array,$where);

if ($delete == false) {
    $verif->setArray(["Erreur de suppression"]);
}else {
//     echo $_GET["id_ad"].'<br>';
//     echo $_SESSION["id_user"].'<br>';
//   echo 'données supprimées';
}

header('Location: http://localhost/voir-mes-annonces.php'); 


?>
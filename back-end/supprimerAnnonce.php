<?php

session_start();
require('../class/verification.php');
require('../class/database.php');
$verif = new Verification();

// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

//delete($pdo, $table, $champ_id,$array, $numero)
$array = [
    $_GET["id_ad"]
];

$delete = $database->delete($pdo, "ad", "id_ad",$array,'?');

if ($delete == false) {
    $verif->setArray(["Erreur de suppression"]);
}else {
    echo $_GET["id_ad"].'<br>';
  echo 'données supprimées';
}


?>
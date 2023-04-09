<?php

session_start();
require('../class/verification.php');
require('../class/database.php');
$verif = new Verification();

// Verifier l'identifiant
$verif->Id($_GET['id_ad'],'id_ad');
// Verifier l'identifiant
$verif->Id($_SESSION['id_user'],'id_user');


if (count($verif->getArray()) > 0) {
    return header('Location: http://localhost/add-annonce.php/?error='.$verif->getIndexError(0).'&id_user='.$_SESSION['id_user'].'&id_ad='.$_GET['id_ad']);
}
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

// enregistrer la demande
$array = [
    $_SESSION['id_user'],
   $_GET["id_ad"]
 ];

//$champs = "title=?, description=?, price=?, phone=?, address=?, date_updated=?, id_ville_france=?";
$champs = "id_user, id_ad";
$pi = "?,?";

//$pdo, $champs, $table, $array, $pi
$insert = $database->insert($pdo,$champs,'favorite',$array, $pi);

//var_dump($insert);

if ($insert == false) {
    //$verif->setArray(["Erreur d'enregistrement"]);
 //  echo $_SESSION['id_ad'];
}else {
//  echo 'données insérées ';
  //echo   '"'.$_SESSION["id_user"].'"' ." ".
  //$_GET["id_ad"]." ";
}

if (count($verif->getArray()) > 0) {
  //  return header('Location: http://localhost/?error='.$verif->getIndexError(0).'&nom='.$_POST['nom'].'&prenom='.$_POST['prenom'].'&email='.$_POST['email'].'&telephone='.$_POST['telephone']);
  return header('Location: http://localhost/add-annonce.php/?success=yes');
}

//$_SESSION['email'] = $_POST['email'];
header('Location: http://localhost/voir-mes-favories.php'); 

?>
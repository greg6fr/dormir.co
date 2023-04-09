<?php

session_start();
require('../class/verification.php');
require('../class/database.php');
$verif = new Verification();
// Verifier le titre 
$verif->Texte($_POST['title'], 'title');
// Verifier la description
$verif->TexteArea($_POST['description'], 'description');
// Verifier le prix
$verif->Prix($_POST['price'],'price'); 
// Verifier le téléphone
$verif->Phone($_POST['phone'],'phone');
// Verifier l'adresse
$verif->Texte($_POST['address'],'address');
// Verifier la ville
$verif->Id($_POST['ville'],'ville');


if (count($verif->getArray()) > 0) {
    return header('Location: http://localhost/add-annonce.php/?success=yes');
}
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

// enregistrer la demande
$array = [
  $_POST["title"],
  $_POST["description"],
 $_POST["price"],
  $_POST["phone"],
 $_POST["address"],
 $_POST["ville"],
 $_SESSION['id_user']

];

$insert = $database->insert($pdo, "title, description, price, phone, address,id_ville_france,id_user", "ad",$array, '?,?,?,?,?,?,?');

if ($insert == false) {
    //$verif->setArray(["Erreur d'enregistrement"]);
   echo $_SESSION['id_user'];
}else {
  $verif->setArray(["Votre annonce a été correctement insérée..."]);
 // echo 'données enregistrées';
}

if (count($verif->getArray()) > 0) {
  //  return header('Location: http://localhost/?error='.$verif->getIndexError(0).'&nom='.$_POST['nom'].'&prenom='.$_POST['prenom'].'&email='.$_POST['email'].'&telephone='.$_POST['telephone']);
  //return header('Location: http://localhost/add-annonce.php/?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['phone'].'&address='.$_POST['address'].'&ville='.$_POST['ville']);
  header('Location: http://localhost/voir-mes-annonces.php/?success='.$verif->getIndexError(0));
}

//$_SESSION['email'] = $_POST['email'];
//header('Location: http://localhost/search.php'); 


?>
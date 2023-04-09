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
$verif->Texte($_POST['price'],'price'); 
// Verifier le téléphone
$verif->Phone($_POST['phone'],'phone');
// Verifier l'adresse
$verif->Texte($_POST['address'],'address');
// Verifier la ville
$verif->Id($_POST['ville'],'ville');
// Verifier l'identifiant
$verif->Id($_POST['id_ad'],'id_ad');


if (count($verif->getArray()) > 0) {
    return header('Location: http://localhost/add-annonce.php/?error='.'yes'.'');
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
 //"CURRENT_TIMESTAMP"
 $_POST["ville"]
 ];

//$champs = "title=?, description=?, price=?, phone=?, address=?, date_updated=?, id_ville_france=?";
$champs = "title=?, description=?, price=?, phone=?, address=?,id_ville_france=?";
$where = ["id_ad",$_POST['id_ad'],"id_user",$_SESSION['id_user']];


$update = $database->update($pdo,$champs,'ad',$array, $where);

//var_dump($update);

if ($update == false) {
    //$verif->setArray(["Erreur d'enregistrement"]);
 //  echo $_SESSION['id_ad'];
}else {
  echo 'données modifiées ';
  
}

if (count($verif->getArray()) > 0) {
  //  return header('Location: http://localhost/?error='.$verif->getIndexError(0).'&nom='.$_POST['nom'].'&prenom='.$_POST['prenom'].'&email='.$_POST['email'].'&telephone='.$_POST['telephone']);
  return header('Location: http://localhost/add-annonce.php/?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['phone'].'&address='.$_POST['address'].'&ville='.$_POST['ville']);
}

//$_SESSION['email'] = $_POST['email'];
//header('Location: http://localhost/search.php'); 

?>
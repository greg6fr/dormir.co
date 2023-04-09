<?php 
session_start();
require('../class/verification.php');
require('../class/database.php');
$verif = new Verification();
// Verifier le nom 
$verif->Texte($_POST['nom'], 'nom');
// Verifier le prenom 
$verif->Texte($_POST['prenom'], 'prenom');
// Verifier l'email et vérifier en base de donnée si il l'existe
$verif->Email($_SESSION['email']); 
// Verifier le téléphone
$verif->Phone($_POST['telephone']);
// Verifier le mot de passe
// Verifier le mot de passe et que le confirme mot de passe soit identique
$hash = $verif->Password($_POST['password'], $_POST['password2']);

if (count($verif->getArray()) > 0) {
  return header('Location: http://localhost/voir-profil.php?success=yes');
}
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, '*', 'user', ['id_user', $_SESSION['id_user']]);
// formalisation du résultat
$result = $result->fetchAll();
// Verfier si l'email de l'utilisateur existe 
if (count($result) > 0) {
   // $verif->setArray(["L'utilisateur a déjà un compte"]);
    // enregistrer la demande
$array = [
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['telephone'],
    $hash
];

$where= ['id_user',$_SESSION['id_user'],'1','1'];
// $pdo, $champs, $table,$array,$wher
$update = $database->update($pdo, " lastname=?, firstname=?, phone=?, password=? ", " user ", $array,$where);
//var_dump($update);
if ($update == true) {
   // $verif->setArray(["Vous n'avez pas pu mettre à jour vos informations. Veuillez rééssayer."]);
   $verif->setArray(["Vos informations ont été correctement mises à jour..."]);
   echo 'Données modifiées avec succès';
} else {
   // echo 'Données modifiées avec succès';
  // $verif->setArray(["Vos informations ont été correctement mises à jour..."]);
}

if (count($verif->getArray()) > 0) {
   header('Location: http://localhost/voir-profil/?success='.$verif->getIndexError(0));
}
} ?>
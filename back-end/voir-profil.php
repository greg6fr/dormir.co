<?php 
//session_start();
require('./class/verification.php');
//require('./class/database.php');
$verif = new Verification();
// init object class database
$database = new Database();
// connexion bdd
 $pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);
// formalisation du résultat
$result = $result->fetchAll();
// Verfier si l'email de l'utilisateur existe 
//var_dump($result);
if (count($result) > 0) {
    $verif->setArray(["L'utilisateur n'a pas de compte"]);
}
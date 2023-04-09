<?php
require_once('./composant/header.php');
require_once('./composant/navbar.php');
require('./class/database.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/login.php?error=Merci de vous connecter');
}

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete

//SELECT * FROM `ad` left join user on ad.id_user=user.id_user where ad.id_user=1;

$clause []= 'user.email='.$_SESSION['email'].'';

$result = $database->selectAllAd($pdo, '*', 'ad','user', 'ad.id_user=user.id_user',$clause);

$result = $result->fetchAll();
// Verfier si l'email de l'utilisateur existe 
if (count($result) <= 0) {
    $verif->setArray(["Vos ne disposez d'aucune annonces."]);
}
//var_dump($clause);
//var_dump($_SESSION['email']);
//var_dump($result);

require_once('./composant/footer.php');
?>
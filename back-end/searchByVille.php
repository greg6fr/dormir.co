<?php

require_once('./composant/header.php');
require_once('./composant/navbar.php');
require_once    ('./class/database.php');
require_once    ('./class/verification.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/login.php?error=Merci de vous connecter');
}
$verif = new Verification();
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete

//SELECT * FROM `ad` left join user on ad.id_user=user.id_user where ad.id_user=1;

$where= ['ad.id_user',$_SESSION['id_user']];
//select($pdo, $search, $table, $where)
$result = $database->select($pdo, '*', 'ad',$where);

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
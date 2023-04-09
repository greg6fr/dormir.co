<?php
require_once('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./class/database.php');
require('./class/verification.php');
$verif = new Verification();
if (!isset($_SESSION['id_user'])) {
    return header('Location: http://localhost/login.php?error=Merci de vous connecter');
}

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete

//SELECT * FROM `ad` left join user on ad.id_user=user.id_user where ad.id_user=1;

//$pdo, $champs, $table,$table2, $fusion, $where
//selectLeftJoinWhere
$where=['ad.id_user',$_SESSION['id_user']];
$result = $database->selectLeftJoinWhere($pdo, 'ad.*, favorite.*', 'ad','favorite', 'ad.id_user=favorite.id_user and ad.id_ad=favorite.id_ad',$where,"HAVING favorite.id_ad IS NOT NULL");

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
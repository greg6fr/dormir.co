<?php
require('./class/database.php');

$database = new Database();
// connexion bdd
 $pdo = $database->connectDb();
// create select requete

//SELECT * FROM `ad` left join user on ad.id_user=user.id_user where ad.id_user=1;
$where =['ad.id_ad',$_GET['id_ad']];

$result = $database->select($pdo, '*', 'ad',$where);

$result = $result->fetchAll();
// Verfier si l'email de l'utilisateur existe 
if (count($result) <= 0) {
   // $verif->setArray(["Vos ne disposez d'aucune annonces."]);
}
//var_dump($result);

?>
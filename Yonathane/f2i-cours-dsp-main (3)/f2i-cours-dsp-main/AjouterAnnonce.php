<?php


if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $unTitre=$_POST["title"];
  $uneDescription=$_POST["description"];
  $unPrix=$_POST["price"];
  $unTelephone=$_POST["phone"];
  $uneAdresse=$_POST["address"];
  AjouterAnnonce($unTitre, $uneDescription ,$unPrix, $unTelephone,  $uneAdresse, $tabErreurs);
}



function AjouterAnnonce($unTitre, $uneDescription ,$unPrix, $unTelephone, $uneAdresse, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  
    
  // Créer la requête d'ajout 
  $requete="insert into ad"
  ."(title, description, price, phone, address) values ('"
  .$unTitre."','"
  .$uneDescription."','"
  .$unPrix."','"
  .$unTelephonel."',"
  .$uneAdresse.");";
  
  // Lancer la requête d'ajout 
 
  
  // Si la requête a réussi
  if ($ok)
  {
    $message = "L'annonce' a été correctement ajouté";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, l'ajout de l'annonce a échoué !!!";
    ajouterErreur($tabErr, $message);
  } 

}

function ajouterErreur(&$tabErr,$msg) {
    $tabErr[count($tabErr)]=$msg;
}


?>
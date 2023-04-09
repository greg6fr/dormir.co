<?php

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  supprimerAnnonce($unId, $tabErreurs);
  if (nbErreurs($tabErreurs)==0)
  {
    $reussite = 1;
    $messageActionOk = "L'annonce a bien été supprimé";
  }

}

function supprimerAnnonce($unId, &$tabErr)
{
  

  $verif = $connexion->query(" select id_ad from dormicro where id_ad='" . $unId . "';");

  if ($annonce) 
    $requete = "delete from ad";
    $requete = $requete . " where id_ad='" . $unId . "';";

    // Lancer la requête supprimer
    

    // Si la requête a réussi
    if ($ok) {
      $message = "L'annonce' a été correctement supprimé";
      ajouterErreur($tabErr, $message);
    } else {
      $message = "Attention, la suppression de l'annonce a échoué !";
      ajouterErreur($tabErr, $message);
    }
  } else // n'existe pas
  {
    $message = "L'annonce n'existe pas";
    ajouterErreur($tabErr, $message);
  }



?>
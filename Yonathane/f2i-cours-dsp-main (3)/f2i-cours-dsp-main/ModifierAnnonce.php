<?php
if (count($_POST)==0)
{
    $etape = 1;
}
else
{
    $etape = 2;
    $unId=$_POST['Id'];
    $uneMarque=$_POST['Marque'];
    $unModele=$_POST["Modele"];
    $uneDimension=$_POST["Dimension"];
    $unType=$_POST["Type"];
    modifierMateriel($unId,$uneMarque,$unModele,$uneDimension,$unType,$tabErreurs);
    // Message de r�ussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le materiel a été correctement modifié";
    }
  
}

function nbErreurs($tabErr) {
    return count($tabErr);
}

function modifierAnnonce($unId,$unTitre,$uneDescription,$unPrix,$unTelephone,$uneAdresse,$tabErreurs)
{
    
    // Ouvrir une connexion au serveur mysql en s'identifiant
    
    //
    if($unTitre==""||$uneDescription==""||$unPrix==""||$unTelephone=="")
    {
      $message = "Des données sont incomplètes";
      ajouterErreur($tabErreurs, $message);
    }
    // Cr�er la requ�te de modification 
   else
   {

    $requete= "UPDATE ad SET
    title = '$unTitre',
    description = '$uneDescription',
    price = '$unPrix',
    phone = '$unTelephone',
    address = '$uneAdresse' WHERE Id='$unId';";      
    // Lancer la requ�te d'ajout 
    
    
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Les données ont été correctement modifiées";
      ajouterErreur($tabErreurs, $message);
    }
    else
    {
      $message = "Attention, les modifications ont echouée !";
      ajouterErreur($tabErreurs, $message);
    } 
  }
}
?>
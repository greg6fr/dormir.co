<?php
require('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./class/form.php');
require_once('./back-end/searchByVille.php');
require_once('./back-end/searchAdByVille.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/login.php?error=Merci de vous connecter');
}

$form = new Form();

?>

<div class="container">
<?php 
    if(isset($_GET['success']) && !empty($_GET['success']) && $_GET['success']!='yes') {
     echo '<div data-bs-dismiss="3000" class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Succès!</strong> '.$_GET['success'].'
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
    }
    
    if (isset($_GET['success']) && $_GET['success']=='yes'){
     echo '<div data-bs-dismiss="3000" class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Error!</strong> Veuillez remplir tous les champs de saisie
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>'; 
  }

  if (isset($_GET['success']) && empty($_GET['success'])){
    '<div data-bs-dismiss="3000" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>'; 
 }
              

                         
            ?>
    <form action="/searchAdByVille.php" method="POST">
        <div class="card mt-5 p-3">
            <div class="row">
                <div class="col-md-8">
                <?= $form->Input("12", "ville", "Votre ville", "text", "Entrer une ville",''); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->Input("12 mt-3 pt-3", "submit", "Votre recherche", "submit", "", 'valider'); ?>
                </div>
            </div>
        </div>
    </form>
   <?php echo isset($_GET['text']) ? '<div class="card mt-5"><div class="card-header"> Vos annonces : ' : ""; ?>
        
        <?php 
        
            if (!isset($_GET['text'])) {
                echo'    <div class="row row-cols-1 row-cols-md-2 g-4 mt-2">';
          foreach ($result as $key => $value) {
          echo'
  <div class="col">
    <div class="card">
      
      <div class="card-body">
      <img src="../assets/images/image_'.rand(1,20).'".jpg" class="card-img-top"
              alt="Dormir.co" width="640" height="360" />
        <h5 class="card-title">'.$value['title'].' -|- '.$value['price'].' €'.'</h5>
        <p class="card-text">
        '.substr($value['description'],0,100).'
        </p>
        <p class="card-text">
        <a href="http://localhost/voir-detail-annonce.php?id_ad='.$value['id_ad'].'" class="btn btn-info">Voir +</a>
        <a href="http://localhost/update-ad.php?id_ad='.$value['id_ad'].'" class="btn btn-primary">Editer</a>
        <a href="http://localhost/back-end/supprimerAnnonce.php?id_ad='.$value['id_ad'].'" class="btn btn-secondary">Supprimer</a>
        <a href="http://localhost/back-end/add-favorite.php?id_ad='.$value['id_ad'].'" class="btn btn-danger">Ajouter en favoris</a>
        </p>
      </div>
    </div>
  </div>';}
  
 echo' </div>
';
            
        }
        ?>
        
    </div>
</div>


<?php 
require_once('./composant/footer.php');
?>
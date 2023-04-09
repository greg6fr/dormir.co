<?php
require('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./class/form.php');
require_once('./back-end/voir-les-annonces.php');

$form = new Form();

?>

<div class="container">
<form action="/searchAdByVille.php" method="POST">
        <div class="card mt-5 p-3">
            <div class="row">
                <div class="col-md-8">
                    <?= $form->Input("12", "ville", "Votre ville", "text", "Entrer une ville", ''); ?>
                </div>
                <div class="col-md-2">
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
      <img src="../assets/images/image_'.rand(1,10).'".jpg" class="card-img-top"
              alt="Dormir.co" width="640" height="360" />
        <h5 class="card-title">'.$value['title'].' -|- '.$value['price'].' €'.'</h5>
        <p class="card-text">
        '.substr($value['description'],0,100).'
        </p>
        <p class="card-text">';?>
        <?= (!isset($_SESSION['id_user']) ? '<a href="http://localhost/login.php" class="btn btn-info">Voir +</a>' : '<a href="http://localhost/voir-detail-annonce.php?id_ad='.$value['id_ad'].'" class="btn btn-info">Voir +</a>') ?>
        
       <?php echo' </p>
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
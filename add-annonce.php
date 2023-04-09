<?php 
    require('./class/form.php');
    require('./composant/navbar.php');
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container bg-success p-3 mt-5">
            
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
              <h1 class="text-light">Ajouter une annonce</h1>
            <form class="row" action="/back-end/AjouterAnnonce.php" method="post">
                <?php 
                echo $form->Input("4","title","Le titre","text","Entrer un titre", '');
                echo $form->Input("4", "description", "La description","text", "Entrer une description", '');
                echo $form->Input("4", "price", "Le prix", "number", "Entrer un prix", '');
                echo $form->Input("4", "phone", "Votre téléphone", "tel", "Entrer un téléphone",'');
                echo $form->Input("4", "address", "Votre adresse", "text", "Entrer une adresse",'');
                echo $form->select("4","","");
                echo $form->Input("4", "Envoyer", "Envoyer", "submit", "", 'Envoyer');
                ?>
            </form>
    </div>    
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
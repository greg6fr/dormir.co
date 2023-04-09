<?php 

require('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./class/form.php');
    
    require('./back-end/voir-profil.php');
  //  $database = new Database();
    // connexion bdd
    //  $pdo = $database->connectDb();
    // $form = new Form();
    foreach ($result as $key => $value){
       $first =$value['firstname'];
       $last =$value['lastname'];
       $email =$value['email'];
        $phone=$value['phone'];
        $date_created=$value['date_created'];
    }

    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dormico|Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-3 mt-5">
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
    echo '<div data-bs-dismiss="3000" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> </strong>
   
  </div>'; 
 }
              

                         
            ?>
    <table class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Date subscription</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?= ucwords(strtolower($first)) ?></td>
      <td><?= ucwords(strtolower($last)) ?> </td>
      <td><?= strtolower($email) ?></td>
      <td><?= strtolower($phone) ?></td>
      <td><?= strtolower($date_created) ?></td>
    </tr>
  </tbody>
</table><?php
echo '<a href="http://localhost/update-profil.php?id='.$_SESSION['id_user'].'" class="btn btn-success">Mettre à jour</a>'; ?>
    </div>    
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
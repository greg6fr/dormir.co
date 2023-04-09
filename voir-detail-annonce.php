<?php 
    require('./composant/navbar.php');
  //  require('./class/form.php');
    require('./back-end/voir-detail-annonce.php');
  
  foreach ($result as $key => $value){
   // echo $value['date_created'];
   $whereUser =['id_user',$value['id_user']];

$resultUser = $database->select($pdo, '*', 'user',$whereUser);

$resultUser = $resultUser->fetchAll();
// Verfier si l'email de l'utilisateur existe 
if (count($result) <= 0) {
   // $verif->setArray(["Vos ne disposez d'aucune annonces."]);
}
  }
   
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="./script.css">
</head>
  <body>
  
<div class="container bg-dark p-3 mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0"><?php foreach ($resultUser as $keyUser => $valueUser){echo  $valueUser['firstname']." ".$valueUser['lastname'];}?></h6> <span><?php echo ($value['date_created']==$value['date_updated']) ?  '<em> Publiée le :'.$value['date_created'].' : </em>' : '<em> modifiée le :'.$value['date_updated'].' </em>' ;?></span>
                        </div>
                    </div>
                    <div class="badge"> <span>Design</span> </div>
                </div>
                <div class="mt-3">
            <?php    echo '<img src="../assets/images/image_'.rand(1,20).'".jpg" class="card-img-top"
              alt="Dormir.co" width="640" height="360" />'; ?>
                    <h3 class="heading"><?= $value['title'].' | '.$value['price'].' €'; ?></h3>
                    <p class="heading"><?= $value['description']; ?></p>
                    <p class="heading"><?= $value['address']; ?></p>

                    <a href="#" class="btn btn-success ml-5">Répondre</a>
                    <a href="http://localhost/voir-les-annonces.php" class="btn btn-danger ml-5">Autres annonces</a>
                    <div class="mt-3">
                            <div class="progress">
                        
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="mt-3"> <span class="text1"><?php echo rand(10,100).' ' ;?><span class="text2">vues</span></span> </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

</div>    
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
<?php 
    require('./class/form.php');
    require('./composant/navbar.php');
   // require('./class/database.php');

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

    foreach ($result as $key => $value){
        // echo $value['date_created'];
        //SELECT * FROM `ad` left join user on ad.id_user=user.id_user where ad.id_user=1;
    $whereVille =['ville_id',$value['id_ville_france']];
    
    $resultVille = $database->select($pdo, 'ville_id,ville_slug,ville_nom', 'villes_france',$whereVille);
    
    $resultVille = $resultVille->fetchAll();
    // Verfier si l'email de l'utilisateur existe 
    if (count($result) <= 0) {
       // $verif->setArray(["Vos ne disposez d'aucune annonces."]);
    } else {
        foreach ($resultVille as $keyVille => $valueVille) {

        }
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
  </head>
  <body>
    <div class="container bg-warning p-3 mt-5">
            
              <h1>Modifier une annonce</h1>
            <form class="row" action="/back-end/update-ad.php" method="post">
                <?php 
                
                echo $form->Input("4","title","Le titre","text",$value['title'], $value['title']);
                echo $form->Input("4", "description", "La description","text", "Entrer une description", $value['description']);
                echo $form->Input("4", "price", "Le prix", "number", "Entrer un prix", $value['price']);
                echo $form->Input("4", "phone", "Votre téléphone", "tel", "Entrer un téléphone",$value['phone']);
                echo $form->Input("4", "address", "Votre adresse", "text", "Entrer une adresse",$value['address']);
                echo $form->select("4",$valueVille['ville_id'],$valueVille['ville_nom']);
                echo $form->Input("4","id_ad","","hidden",$value['id_ad'], $value['id_ad']);
                echo $form->Input("4", "Mettre à jour", "Mettre à jour", "submit", "", 'Mettre à jour');
                ?>
            </form>
    </div>    
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
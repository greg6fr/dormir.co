<?php 
    require('./class/form.php');
    require('./composant/navbar.php');
    $form = new Form();
    $database = new Database();
    // connexion bdd
     $pdo = $database->connectDb();
    // create select requete
    
    //SELECT * FROM `ad` left join user on ad.id_user=user.id_user where ad.id_user=1;
    $where =['user.id_user',$_SESSION['id_user']];
    
    $result = $database->select($pdo, '*', 'user',$where);
    
    $result = $result->fetchAll();
    // Verfier si l'email de l'utilisateur existe 
    if (count($result) <= 0) {
       // $verif->setArray(["Vos ne disposez d'aucune annonces."]);
    }
    //var_dump($result);
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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container bg-success p-3 mt-5">
            
            <h1 class="text-light">Mise à jour de votre profil</h1>
            <form class="row" action="/back-end/update-profil.php" method="post">
                <?php 
                echo $form->Input("4", "nom", "Votre nom", "text", "Entrer un nom",ucwords(strtolower($last)));
                echo $form->Input("4", "prenom", "Votre prenom", "text", "Entrer un prenom", ucwords(strtolower($first)));
                echo $form->InputDisabled("4", "email", "Votre email", "email", "Entrer un email", strtolower($_SESSION['email']));
                echo $form->Input("4", "telephone", "Votre téléphone", "tel", "Entrer un téléphone", $phone);
                echo $form->Input("4", "password", "Votre mot de passe", "password", "Entrer un mot de passe", '');
                echo $form->Input("4", "password2", "Votre confirmation de mot de passe", "password", "Entrer un mot de passe", '');
                echo $form->Input("4", "Envoyer", "Envoyer", "submit", "", 'Envoyer');
                ?>
            </form>
    </div>    
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
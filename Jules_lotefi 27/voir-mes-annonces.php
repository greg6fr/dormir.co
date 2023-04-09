<?php
require('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./class/form.php');
require('./back-end/searchByVille.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/login.php?error=Merci de vous connecter');
}

$form = new Form();

?>

<div class="container">
    <form action="/search" method="get">
        <div class="card mt-5 p-3">
            <div class="row">
                <div class="col-md-8">
                    <?= $form->Input("12", "text", "Votre ville", "text", "Entrer une ville", ''); ?>
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
                echo '<div class="card-body">
                            <div class="row">';
                foreach ($result as $key => $value) {
                    echo '<div class="col-md-4">
                        <div class="card">'
                            .'<h1 class="m-2">'.$value['title'].'</h1>'
                            .'<h6 class="m-2">'.$value['description']. '</h6>'.
                            '<p class="text-danger m-5">'.
                                $value['price']. ' € 
                            </p>' .   
                            
                            '<p class="text-success m-5">'.
                                $value['id_ville_france']. ' 
                            </p>' .   
                        '</div>
                    </div>';
                }
                echo '</div>
                 </div>';
            }
        ?>
        
    </div>
</div>


<?php 
require_once('./composant/footer.php');
?>
<?php
require('./class/database.php');



$form = new Form();

    class Form {


        public function Input($size, $name, $label, $type, $placeholder, $value) {
            $un = '<div class="col-md-'.$size.'">
                        <div class="mb-3">';
            $deux = '';
            $trois =  '<input text-white value="'.$value.'" type="'.$type.'" name="'.$name.'" class="form-control" id="'.$name.'" placeholder="'.$placeholder.'">
                        </div>
                    </div>';
    
            if ($type != 'submit') {
    
                $deux = '<label for="'.$name.'" class="form-label text-white">'.$label.'</label>';
            }
    
            return $un.$deux.$trois;            
        }

        public function InputDisabled($size, $name, $label, $type, $placeholder, $value) {
            $un = '<div class="col-md-'.$size.'">
                        <div class="mb-3">';
            $deux = '';
            $trois =  '<input value="'.$value.'" type="'.$type.'" name="'.$name.'" class="form-control" id="'.$name.'" placeholder="'.$placeholder.'" disabled>
                        </div>
                    </div>';
    
            if ($type != 'submit') {
    
                $deux = '<label for="'.$name.'" class="form-label">'.$label.'</label>';
            }
    
            return $un.$deux.$trois;            
        }

        public function select($size,$id_ville,$selected) {

                    // init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

// create select requete
$where= ["1","1"];
$result = $database->select($pdo, 'ville_nom,ville_id', 'villes_france',$where );
// formalisation du résultat
//$smt = $result->fetchAll();
 
?>

          <div class="col-md-4">
           <div class="mb-3 mt-4">
           <select class="form-select" aria-label="Default select example" name="ville">" 
           <option>Choisissez une ville</option>
        
          <?php        

           // Verfier si la ville existe 
if (count($result) <= 0) {
    $verif->setArray(["Il n\'y a pas de ville"]);

} else {

  
    while($row=$result->fetch(PDO::FETCH_ASSOC)) {
        if ($row['ville_nom']==$selected) {
            echo '<option selected value="'.$row['ville_id'].'">'.$row['ville_nom'].'</option>';
              } else {
       ?>
       
     
    <option value="<?= $row['ville_id']; ?>"><?= $row['ville_nom']; ?></option>

    <?php
              }
     }
    ?>
    </select> </div>
    </div>
    <?php 
}

  
                       
        }
     }
?>
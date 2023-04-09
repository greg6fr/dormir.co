<?php
class Database {
    
    private $host = 'localhost';
    private $db = 'dormirco';
    private $user = 'root';
    private $password = '';
    private $port = 3306;

    public function connectDb() {
        try {
            $pdo = new PDO(
                'mysql:host='.
                $this->host
                .';port='.
                $this->port
                .';dbname='.
                $this->db
                .'', 
                $this->user, 
                $this->password);
            $pdo->exec("SET CHARACTER SET utf8");
            return $pdo;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } 

    // select function pdo object, recherche, table et le filtre where 
    public function select($pdo, $search, $table, $where) {
        // requete sql
        $sql = "SELECT ".$search." FROM ".$table."";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0]."= ?";
            // la valeur dans le tableau pour execute
            $array = [$where[1]];
        }
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }
    
    public function insert($pdo, $champs, $table, $array, $pi){
        try {
            $sql = "INSERT INTO ";
            $sql = $sql.$table." ( ".$champs." ) VALUES (".$pi.");";
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        } catch (Exception $e) {
            return false;
        }
    }

  //  UPDATE `ad` SET `description` = 'Plusse vous propose un charmant appartement meublé de 50 m2 situé au 35 rue Rachais dans le 7eme arrondissement de Lyon. Idéalement placé, vous serez proche de toutes commodités !' WHERE `ad`.`id_ad` = 1;
    
 // UPDATE `ad` SET `title` = 'jhvhhkhkhha', `description` = 'knknlklkkkkkla', `price` = '251002.00', `address` = '2 Rue Hubert Mouchele' WHERE `ad`.`id_ad` = 6;public function update($pdo, $champs, $table, $array, $pi){
    public function update($pdo, $champs, $table,$array,$where){
    try {
            $sql = "UPDATE ";
            $sql = $sql.$table." SET ".$champs;
            $sql=$sql." WHERE ".$where[0]."=".$where[1]." and ".$where[2]."=".$where[3]." ;";
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        } catch (Exception $e) {
            return false;
        }
    }
    //DELETE FROM `ad` WHERE `ad`.`id_ad` = 1 » ?
    public function delete($pdo, $table, $champ_id,$array, $numero){
        try {
            $sql = "DELETE ";
            $sql = $sql." FROM ".$table." WHERE ".$table.".".$champ_id."=".$numero.";";
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteTwoParams($pdo, $table, $champs,$array, $where){
        try {
            $sql = "DELETE ";
            $sql = $sql." FROM ".$table." WHERE ".$table.".".$champs[0]."=".$where[0]." and ".$champs[1]."=".$where[1].";";
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        } catch (Exception $e) {
            return false;
        }
    }

    public function selectLeftJoinWhereLike($pdo, $champs, $table,$table2, $fusion, $where) {
        // requete sql
        $sql = "SELECT ".$champs." FROM ".$table." LEFT JOIN ".$table2." ON ".$fusion." ";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0]." LIKE ?";
            // la valeur dans le tableau pour execute
            $array = [$where[1]];
        }
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }

    public function selectLeftJoinWhere($pdo, $champs, $table,$table2, $fusion, $where,$tri) {
        // requete sql
        $sql = "SELECT ".$champs." FROM ".$table." LEFT JOIN ".$table2." ON ".$fusion." ";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0]."=".$where[1]." ".$tri;
         
        }
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }

    public function selectAllAd($pdo, $champs, $table,$table2, $fusion, $where) {
        // requete sql
        $sql = "SELECT ".$champs." FROM ".$table." LEFT JOIN ".$table2." ON ".$fusion." ";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0];
            // la valeur dans le tableau pour execute
         //   $array = [$where[1]];
         array_push($array,$_SESSION['email']);
        }
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }
}
?>
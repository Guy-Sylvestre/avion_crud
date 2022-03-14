<?php

class Database {
    private $dsn = 'mysql:host=localhost;dbname=avion_crud';
    private $user = "root";
    private $pass = "";
    public $conn;
    
    // constructeur
    public function __construct(){
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->pass);
            // echo "Successfully Connected!";
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }


    // Fonction d'insetion (enregistrement) d'un avion dans la base de donnee (MySQL)
    public function insert_avion($navion, $p_internte_img, $d_siege_img, $p_cabine_img, $p_pilotage_img, $c_amenagement_intern, $e_vitre, $lampes_temoin) {
            $sql = "INSERT INTO `avion` (`id`, `nom`, `plan_internte_image`, `disposition_siege_image`, `plan_cabine_image`, `plan_pilotage_image`, `couleur_amenagement_interne`, `epaisseur_vitre`, `lampes_temoin_hors_circuit`, `creer`) 
                VALUES (NULL, :navion, :p_internte_img, :d_siege_img, :p_cabine_img, :p_pilotage_img, :c_amenagement_intern, :e_vitre, :lampes_temoin, current_timestamp());";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['navion'=>$navion, 'p_internte_img'=>$p_internte_img, 'd_siege_img'=>$d_siege_img,
                'p_cabine_img'=>$p_cabine_img, 'p_pilotage_img'=>$p_pilotage_img, 'c_amenagement_intern'=>$c_amenagement_intern,
                'e_vitre'=>$e_vitre, 'lampes_temoin'=>$lampes_temoin]);

            // if ($stmt) {
            //     echo 'reussi';
            // }else {
            //     echo 'echoue';
            // }
            return true;
    }


    // Fonction de lecture des donnees de l'avion dans la base de donnes (MySQL) avec PDO
    public function read_avion() {
        $data = array();
        $sql = "SELECT * FROM `avion`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $data[] = $row;
        }

        return $data;
    }


    // Fonction pour recuperer l'id de l'avion
    public function get_avion_id($id) {
        $sql = "SELECT * FROM `avion` WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    // Mettre a jour les informations relatives a l'avion indexe dans la base de donnee (MySQL)
    public function update_avion($navion, $p_internte_img, $d_siege_img, $p_cabine_img, $p_pilotage_img, $c_amenagement_intern, $e_vitre, $lampes_temoin) {
        $sql = "UPDATE `avion` SET `nom` = :navion, `plan_internte_image` = :p_internte_img, `disposition_siege_image` = :d_siege_img, `plan_cabine_image` = :p_cabine_img,
            `plan_pilotage_image` = :p_pilotage_img, `couleur_amenagement_interne` = :c_amenagement_intern, `epaisseur_vitre` = :e_vitre, `lampes_temoin_hors_circuit` = :lampes_temoin,  current_timestamp() WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['navion'=>$navion, 'p_internte_img'=>$p_internte_img, 'd_siege_img'=>$d_siege_img,
            'p_cabine_img'=>$p_cabine_img, 'p_pilotage_img'=>$p_pilotage_img, 'c_amenagement_intern'=>$c_amenagement_intern,
            'e_vitre'=>$e_vitre, 'lampes_temoin'=>$lampes_temoin]); //'id' => $id
        return true;
    }


    // Suprimer les informations renseignees sur l'avion dans la base de deonne (MySQL)
    public function delete_avion($id) {
        $sql = "DELETE FROM `avion` WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        return true;
    }


    // Conter le nombre de ligne d'enregistrement des avions inseres dans la base de donne (MySQL)
    public function total_row_count() {
        $sql = "SELECT * FROM `avion`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $t_rows = $stmt->rowCount();

        return $t_rows;
    }
}

$ob = new Database();
// print_r($ob->read_avion());
// echo $ob->total_row_count();
?>


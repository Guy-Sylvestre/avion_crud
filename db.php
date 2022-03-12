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

}

$ob = new Database();
// print_r($ob->read_avion());
// echo $ob->total_row_count();
?>


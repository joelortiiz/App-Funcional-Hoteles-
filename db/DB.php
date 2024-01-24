<?php


class DB {

    private $pdo;

    public function __construct() {
      //  include $_SERVER['DOCUMENT_ROOT'] . 'hoteles/db/DB.php';
        try {
             require ($_SERVER['DOCUMENT_ROOT'] . '/hoteles/config/Config.php');

           // $pwd = hash("SHA256", $pwd);
            // Crea una instancia de PDO para conectarse a la base de datos
            $this->pdo = new PDO("mysql:dbname=$dbname;host=127.0.0.1", $usuario, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    // Obtiene una instancia de PDO
    public function getPDO() {
        return $this->pdo;
    }
    
    public function cerrarBD() {
         $this->pdo = null;
    }

}
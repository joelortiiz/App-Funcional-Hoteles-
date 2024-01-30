<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/lib/class/Habitacion.php';

class HabitacionModel {

    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $bd;
    private $pdo;

    public function __construct() {
        // $this->pdo = new PDO('mysql:host=localhost;dbname=ejemplo10_tema6','root', '');
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

    // Recupera la lista de tareas de la base de datos
    public function getHabitacionesDeHotel($id, $nombre) {
        try {
        // Ejecuta una consulta para recuperar todas las tareas de la tabla "tareas"
        $stmt = $this->pdo->prepare('SELECT * FROM habitaciones WHERE id_hotel = ?');
        $stmt->execute(array($id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Habitacion');
            
            if ($stmt) {
                //Guardamos TODAS las filas recibidas por la consulta.
                $habijationesObject = $stmt->fetchAll();
                
                $this->bd->cerrarBD();
                return $habijationesObject;
            } else {
                throw new Exception('Este hotel no tiene habitaciones');
                return false;
            }
            } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

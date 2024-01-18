<?php

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
    public function getTareas() {
        // Ejecuta una consulta para recuperar todas las tareas de la tabla "tareas"
        $stmt = $this->pdo->prepare('SELECT * FROM tareas');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

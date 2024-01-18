<?php

//tendre que usar getPDO() para obtener la conexion a la base de datos
include $SERVER['DOCUMENT_ROOT'] . '/hoteles/db/DB.php';

/* * *******************USUARIOS********************* */

class UsuarioModel extends Usuario {

    private $bd;
    private $pdo;

    public function __construct($bd, $pdo, $id, $nombre, $contrasenia, $fecha_registro, $rol) {
        parent::__construct($id, $nombre, $contrasenia, $fecha_registro, $rol);
        $this->bd = new DB();
        try {
            $this->pdo = $this->bd->getPDO();
            if ($this->db->getPDO() == null) {
                echo "Error en la conexión con la base de datos";
                exit;
            }
        } catch (Exception $ex) {
            
        }
    }

    public function getBd() {
        return $this->bd;
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function setBd($bd): void {
        $this->bd = $bd;
    }

    public function setPdo($pdo): void {
        $this->pdo = $pdo;
    }

    public function getUsuario($nombre) {
        try {
            $sql = "SELECT * FROM usuarios WHERE nombre = ?";
            $stmt = $this->db->getPDO()->prepare($sql);
            $stmt->execute([$nombre]);

            $usuario = $stmt->fetchObject('Usuario');
            return $usuario; // Devuelve un objeto Usuario
            //cierro la conexion
            $this->db->cierroBD();
        } catch (Exception $ex) {
            echo '<p class="error">Detalles: ' . $ex->getMessage() . '</p>';
            return null;
        }
    }
}

<?php

//namespace Hoteles\Models;

//tendre que usar getPDO() para obtener la conexion a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/hoteles/db/DB.php';

/* * *******************USUARIOS********************* */

//use Hoteles\Clase\Usuario;

//class UsuarioModel extends Usuario {
class UsuarioModel  {

    private $bd;
    private $pdo;
    private $id;
    private $nombre;
    private $contrasenia;
    private $fecha_registro;
    private $rol;

    public function __construct($objeto = null) {
      //  parent::__construct($id, $nombre, $contrasenia, $fecha_registro, $rol);
        $this->bd = new DB();
        try {
            $this->pdo = $this->bd->getPDO();
            throw new Exception('Error en la Base de Datos');
        } catch (Exception $ex) {
                $ex->getMessage();
        }
         if ($objeto) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->contrasenia = $contrasenia;
            $this->fecha_registro = $fecha_registro;
            $this->rol = $rol;
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
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function getFecha_registro() {
        return $this->fecha_registro;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setContrasenia($contrasenia): void {
        $this->contrasenia = $contrasenia;
    }

    public function setFecha_registro($fecha_registro): void {
        $this->fecha_registro = $fecha_registro;
    }

    public function setRol($rol): void {
        $this->rol = $rol;
    }

    public function __destruct() {
        
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

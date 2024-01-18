<?php

//namespace Hoteles\Models;
//tendre que usar getPDO() para obtener la conexion a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/hoteles/db/DB.php';

/* * *******************USUARIOS********************* */

//use Hoteles\Clase\Usuario;
//class UsuarioModel extends Usuario {
class HotelModel {

    private $bd;
    private $pdo;
    private $id;
    private $nombre;
    private $direccion;
    private $ciudad;
    private $pais;
    private $num_habitaciones;
    private $descripcion;
    private $foto;

    public function __construct($bd, $pdo, $id, $nombre, $direccion, $ciudad, $pais, $num_habitaciones, $descripcion, $foto) {
        $this->bd = new DB();
        try {
                  
            $this->pdo = $this->bd->getPDO();
             if ($this->bd->getPDO() == null) {
                echo "Error en la conexión con la base de datos";
                exit;
            }
        } catch (Exception $ex) {
            
        }
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->num_habitaciones = $num_habitaciones;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
    }
    public function getBd() {
        return $this->bd;
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getNum_habitaciones() {
        return $this->num_habitaciones;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setBd($bd): void {
        $this->bd = $bd;
    }

    public function setPdo($pdo): void {
        $this->pdo = $pdo;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setCiudad($ciudad): void {
        $this->ciudad = $ciudad;
    }

    public function setPais($pais): void {
        $this->pais = $pais;
    }

    public function setNum_habitaciones($num_habitaciones): void {
        $this->num_habitaciones = $num_habitaciones;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setFoto($foto): void {
        $this->foto = $foto;
    }

    
        public function getHoteles($nombre) {
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

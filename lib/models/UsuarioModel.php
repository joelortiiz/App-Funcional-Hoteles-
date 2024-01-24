<?php

//namespace Hoteles\Models;
//tendre que usar getPDO() para obtener la conexion a la base de datos
include_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/db/DB.php';



//use Hoteles\Clase\Usuario;
//class UsuarioModel extends Usuario {
class UsuarioModel {

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
        $this->pdo = $this->bd->getPDO();
        if($objeto){
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

   
    function comprobarUsuarioDB($user, $password) {
        $password = hash('SHA256', $password);
        //echo $password;
        $sql = "SELECT * from Usuarios WHERE nombre = ? and contraseña = ?";
        //echo '<br>' .$sql;
        $stmt = $this->pdo->prepare($sql);
        
        
        $stmt->execute(array($user, $password));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioModel');
        if ($stmt) {
            $userObject = $stmt->fetch();
            $this->bd->cerrarBD();
            return $userObject;
        } else {
            return false;
        }
    
}
}

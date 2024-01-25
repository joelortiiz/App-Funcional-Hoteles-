<?php

//namespace Hoteles\Models;
//tendre que usar getPDO() para obtener la conexion a la base de datos
include_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/db/DB.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/lib/class/Usuario.php';

//use Hoteles\Clase\Usuario;
//class UsuarioModel extends Usuario {
class UsuarioModel {

    private $bd;
    private $pdo;

    public function __construct() {
        //  parent::__construct($id, $nombre, $contrasenia, $fecha_registro, $rol);
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
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

    function comprobarUsuarioDB($user, $password) {
        try {
            $password = hash('SHA256', $password);
            //echo $password;
            $sql = "SELECT * from Usuarios WHERE nombre = ? and contraseña = ?";
            //echo '<br>' .$sql;
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute(array($user, $password));
           // $stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            //foreach ($stmt as $value) {
            //   $usuario = new Usuario($value['id'], $value['nombre'], $value['contraseña'], $value['fecha_registro'], $value['rol']);
            //}
            if ($stmt) {
                $userObject = $stmt->fetch();
                $this->bd->cerrarBD();
                return $userObject;
            } else {
                throw new Exception('El usuario no existe en la base de datos');
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}

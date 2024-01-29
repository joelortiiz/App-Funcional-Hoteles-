<?php

//namespace Hoteles\Models;
//tendre que usar getPDO() para obtener la conexion a la base de datos
include_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/db/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/lib/class/Usuario.php';

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
            //$stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            
            if ($stmt->rowCount()>0) {
                foreach ($stmt as $user) {
                    $userObject = new Usuario($user['id'], $user['nombre'], $user['contraseña'], $user['fecha_registro'], $user['rol']);
                }
                
                //$userObject = $stmt->fetchAll();
                
                $_SESSION['id'] = $userObject->getId();
                //He tenido problemas para almacenar la id del usuario en la sesión así que utilizo una cookie como último recurso.
                setcookie("id", $userObject->getId(), time() + 20 * 2400);

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

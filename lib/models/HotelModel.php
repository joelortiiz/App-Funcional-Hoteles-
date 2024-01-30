<?php

//namespace Hoteles\Models;
//tendre que usar getPDO() para obtener la conexion a la base de datos
include_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/db/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/hoteles/lib/class/Hotel.php';

/* * *******************USUARIOS********************* */

//use Hoteles\Clase\Usuario;
//class UsuarioModel extends Usuario {
class HotelModel {

    private $bd;
    private $pdo;

    public function __construct(/* , $id, $nombre, $direccion, $ciudad, $pais, $num_habitaciones, $descripcion, $foto */) {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

    public function getHoteles() {
        try {

            $sql = "SELECT * from hoteles";
            $hoteles = $this->pdo->prepare($sql);
            $hoteles->execute();
            $hoteles->setFetchMode(PDO::FETCH_CLASS, 'Hotel');
            
            if ($hoteles) {
                $hotelesObject = $hoteles->fetchAll();
             //   print_r($userObject);
              //  echo $userObject[0]->getNombre();
                $this->bd->cerrarBD();
                return $hotelesObject;
            } else {
                throw new Exception('El usuario no existe en la base de datos');
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}

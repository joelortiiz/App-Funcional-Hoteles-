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

            print_r("<br>");
            print_r("<br>");

            print_r("<br>");

            print_r("<br>");

            print_r("<br>");

            $hoteles->execute();
            $hoteles->setFetchMode(PDO::FETCH_CLASS, 'Hotel');
            
            if ($hoteles) {
                $userObject = $hoteles->fetchAll();
             //   print_r($userObject);
              //  echo $userObject[0]->getNombre();
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

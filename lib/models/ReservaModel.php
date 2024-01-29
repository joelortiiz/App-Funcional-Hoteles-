<?php

// Definición de una clase llamada ReservaModel
class ReservaModel {

    // Propiedades privadas de la clase
    private $bd;
    private $pdo;

    // Constructor de la clase
    public function __construct() {
        try {
            // Intenta crear una instancia de la clase BD y obtener la conexión PDO
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        } catch (Exception $e) {
            // En caso de error, captura la excepción y muestra el mensaje de error
            echo $e->getMessage();
        }
    }

    // Método para obtener reservas según el id de hotel y el id de habitación
    public function getReserva($id_hotel, $id_habitacion) {
        try {
            // Consulta SQL para selecionar todas las reservas de una habitación en un hotel
            $sql = "SELECT * FROM habitaciones WHERE id_hotel = ? AND id = ?;";

            // Preparar y ejecutar la consulta con los parámetros proporcionados
            $reservas = $this->pdo->prepare($sql);
            $reservas->execute(array($id_hotel, $id_habitacion));

            // Obtener todas las reservas como un array asociativo
            $allReservas = $reservas->fetchAll();

            // Retornar el array de reservas
            return $allReservas;

            // Lanzar una excepción en caso de error (sin efecto en el flujo actual)
            throw new Exception('Hay un error con los datos recibidos.');
        } catch (Exception $e) {
            // En caso de error, capturar la excepción y mostrar el mensaje de error
            echo $e->getMessage();
        }
    }

    // Método para obtener todas las reservas de un usuario según su id
    public function getReservasUser($id) {
        try {
            // Consulta SQL para seleccionar todas las reservas de un usuario
            $sql = "SELECT * FROM reservas WHERE id_usuario = ?;";

            // Preparar y ejecutar la consulta con el parámetro proporcionado
            $reservasUser = $this->pdo->prepare($sql);
            $reservasUser->execute(array($id));

            // Obtener todas las reservas como un array asociativo
            $todasReservas = $reservasUser->fetchAll();

            // Retornar el array de reservas
            return $todasReservas;

            // Lanzar una excepción en caso de error (sin efecto en el flujo actual)
            throw new Exception('No se han podido encontrar las reservas');
        } catch (Exception $e) {
            // En caso de error, capturar la excepción y mostrar el mensaje de error
            echo $e->getMessage();
        }
    }

    // Método para verificar si la reserva es correcta
    public function comprobarReservaCorrecta($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida) {
        try {
            // Consulta SQL para contar las reservas que se superponen con la nueva reserva
            $sql = "SELECT COUNT(*) FROM reservas WHERE id_hotel = "
                    . ":id_hotel AND id_habitacion = :id_habitacion AND NOT (fecha_entrada >= :fecha_salida OR fecha_salida <= :fecha_entrada);";
            
            // Preparar y ejecutar la consulta con los parámetros proporcionados
            $reservasExistentes = $this->pdo->prepare($sql);
            $reservasExistentes->execute(array('id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));
            
            // Obtener el resultado de la consulta (número de reservas que se superponen)
            $reservasExistentes = $reservasExistentes->fetchColumn();

            // Verificar si hay reservas que se superponen
            if ($reservasExistentes > 0) {
                return false;
                throw new Exception("Reserva incorrecta");
            } else {
                // Si no hay superposición, verificar la validez de las fechas
                if ($this->comrpobarFechaReserva($fecha_entrada, $fecha_salida)) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            // En caso de error, capturar la excepción y mostrar el mensaje de error
            echo $e->getMessage();
        }
    }

    // Método para verificar si la fecha de salida es posterior a la fecha de entrada
    public function comrpobarFechaReserva($fecha_entrada, $fecha_salida) {
        // Verificar si la fecha de salida es posterior a la fecha de entrada
        if (strtotime($fecha_salida) > strtotime($fecha_entrada)) {
            return true;
        }
    }

    // Método para insertar una nueva reserva
    public function insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida) {
        try {
            // Consulta SQL para obtener el próximo ID disponible para la reserva
            $sqlId = "SELECT MAX(id) FROM reservas";
            $idbd = $this->pdo->prepare($sqlId);
            $idbd->execute();
            $id = $idbd->fetch(PDO::FETCH_ASSOC);
            $idnuevo = $id['MAX(id)'] + 1;

            // Consulta para insertar la nueva resreva
            $sql = "INSERT INTO reservas (id, id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) "
                    . "VALUES(:id, :id_usuario, :id_hotel, :id_habitacion,"
                    . " :fecha_entrada, :fecha_salida);";
            
            // Preparar y ejecutar la consulta con los parámetros proporcionados
            $insertReserva = $this->pdo->prepare($sql);
            $insertReserva->execute(array('id' => $idnuevo, 'id_usuario' => $_COOKIE['id'], 'id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));

            // Redirigir a la página de visualización de reservas después de la inserción
            header('Location: index.php?controller=Reservas&action=mostrarReservas&idHotel=' . $id_hotel . '&idHabitacion=' . $id_habitacion . '&success');
        } catch (Exception $e) {
            // En caso de error, capturar la excepción y mostrar el mensaje de error
            echo $e->getMessage();
        }
    }

    
}

?>

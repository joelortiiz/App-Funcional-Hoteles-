<?php

// Incluye los archivos de las clases ReservaModel y reservasView
include './lib/models/ReservaModel.php';
include './views/reservasView.php';

// Definición de la clase ReservasController
class ReservasController {

    // Propiedades privadas para las instancias de ReservaModel y reservasView
    private $model;
    private $view;

    // Constructor de la clase ReservasController
    public function __construct() {
        $this->model = new ReservaModel();  // Instancia un objeto de la clase ReservaModel
        $this->view = new reservasView();   // Instancia un objeto de la clase reservasView
    }

    // Método para mostrar las reservas
    public function mostrarReservas() {
        // Obtiene los parámetros de la URL
        $id_hotel = $_GET['idHotel'];
        $id_habitacion = $_GET['idHabitacion'];

        // Inicia la sesión
        session_start();

        // Obtiene el ID de usuario de las cookies
        $idUser = $_COOKIE['id'];

        // Redirecciona a la página de inicio si el usuario no ha iniciado sesión
        if (!$_SESSION['user']) {
            header('Location: ./index.php');
        }

        // Obtiene las reservas según el hotel y la habitación
        $reservas = $this->model->getReserva($id_hotel, $id_habitacion);
        
        // Obtiene las reservas del usuario actual
        $reservasUser = $this->model->getReservasUser($idUser);

        // Muestra las reservas utilizando la vista
        $this->view->mostrarReservas($reservas, $reservasUser, null);
    }

    // Método para comprobar y realizar una reserva
    public function comprobarReserva() {
        // Inicia la sesión
        session_start();

        // Redirige a la página de inicio si el usuario no ha iniciado sesión
        if (!$_SESSION['user']) {
            header('Location: ./index.php');
        }

        // Obtiene los datos de la reserva desde el formulario POST
        $id_hotel = $_POST['id_hotel'];
        $id_usuario = $_POST['id_usuario'];
        $id_habitacion = $_POST['id_habitacion'];
        $fecha_entrada = $_POST['fecha_entrada'];
        $fecha_salida = $_POST['fecha_salida'];

        // Comprueba si la reserva es válida utilizando el modelo
        $reservaCorrecta = $this->model->comprobarReservaCorrecta($id_hotel, $id_habitacion, $fecha_entrada, $fecha_salida);

        // Si la reserva es válida la inserta en la base de datos
        if ($reservaCorrecta == true) {
            $this->model->insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida);
        } else {
            // Si la reserva es inválida muestra un mensaje y las reservas actuales
            $resultadoReserva = "fallida";
            $reservas = $this->model->getReserva($id_hotel, $id_habitacion);
            $reservasUser = $this->model->getReservasUser($id_usuario);

            $this->view->mostrarReservas($reservas, $reservasUser, $resultadoReserva);
        }
    }
}

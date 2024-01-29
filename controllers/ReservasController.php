<?php

include './lib/models/ReservaModel.php';
include './views/reservasView.php';

class ReservasController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ReservaModel();
        $this->view = new reservasView();
    }

    public function mostrarReservas() {
        $id_hotel = $_GET['idHotel'];
        $id_habitacion = $_GET['idHabitacion'];
        session_start();
        $idUser = $_COOKIE['id'];
        if (!$_SESSION['user']) {
            header('Location: ./index.php');
        }

        $reservas = $this->model->getReserva($id_hotel, $id_habitacion);
        $reservasUser = $this->model->getReservasUser($idUser);
        $this->view->mostrarReservas($reservas, $reservasUser, null);
    }

    public function comprobarReserva() {
        session_start();

        if (!$_SESSION['user']) {
            header('Location: ./index.php');
        }
        $id_hotel = $_POST['id_hotel'];

        $id_usuario = $_POST['id_usuario'];
        $id_habitacion = $_POST['id_habitacion'];
        $fecha_entrada = $_POST['fecha_entrada'];
        $fecha_salida = $_POST['fecha_salida'];

        $reservaCorrecta = $this->model->comprobarReservaCorrecta($id_hotel, $id_habitacion, $fecha_entrada, $fecha_salida);
        if ($reservaCorrecta == true) {
            $this->model->insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida);
        } else {
            $resultadoReserva = "fallida";
            $reservas = $this->model->getReserva($id_hotel, $id_habitacion);
            $reservasUser = $this->model->getReservasUser($id_usuario);

            $this->view->mostrarReservas($reservas, $reservasUser,$resultadoReserva);
        }
    }
}

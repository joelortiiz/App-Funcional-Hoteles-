<?php

include './lib/models/HabitacionModel.php';
include './views/habitacionesView.php';

class HabitacionesController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new HabitacionModel();
        $this->view = new habitacionesView();
    }

    public function mostrarHabitacionesHotel() {
        session_start();
        if (!$_SESSION['user']) {
            header('Location: ./index.php');
        }
        if (isset($_POST['id_hotel']) && isset($_POST['nombre_hotel'])) {
            
            $id = $_POST['id_hotel'];
            $nombre = $_POST['nombre_hotel'];

            $habitaciones = $this->model->getHabitacionesDeHotel($id, $nombre);
            $this->view->mostrarHabitaciones($habitaciones);
        }
    }
}

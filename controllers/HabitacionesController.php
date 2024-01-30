<?php

// Incluye los archivos de las clases HabitacionModel y habitacionesView
include './lib/models/HabitacionModel.php';
include './views/habitacionesView.php';

// Definición de la clase HabitacionesController
class HabitacionesController {

    // Propiedades privadas para las instancias de HabitacionModel y habitacionesView
    private $model;
    private $view;

    // Constructor de la clase HabitacionesController
    public function __construct() {
        $this->model = new HabitacionModel();   // Instancia un objeto de la clase HabitacionModel
        $this->view = new habitacionesView();   // Instancia un objeto de la clase habitacionesView
    }

    // Método para mostrar las habitaciones de un hotel
    public function mostrarHabitacionesHotel() {
        // Inicia la sesión
        session_start();

        // Redirecciona a la página de inicio si el usuario no ha iniciado sesión
        if (!$_SESSION['user']) {
            header('Location: ./index.php');
        }

        // Verifica si se han enviado los datos del formulario (id_hotel y nombre_hotel) por POST
        if (isset($_POST['id_hotel']) && isset($_POST['nombre_hotel'])) {
            // Obtiene los valores del formulario
            $id = $_POST['id_hotel'];
            $nombre = $_POST['nombre_hotel'];

            // Obtiene las habitaciones del hotel utilizando el modelo
            $habitaciones = $this->model->getHabitacionesDeHotel($id, $nombre);

            // Muestra las habitaciones utilizando la vista
            $this->view->mostrarHabitaciones($habitaciones);
        }
    }
}

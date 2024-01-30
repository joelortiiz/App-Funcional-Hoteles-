<?php

// Incluye los archivos de las clases HotelModel y hotelesView
include './lib/models/HotelModel.php';
include './views/hotelesView.php';

// Definición de la clase HotelesController
class HotelesController {
    
    // Propiedades privadas para las instancias de HotelModel y hotelesView
    private $model;
    private $view;

    // Constructor de la clase HotelesController
    public function __construct() {
        $this->model = new HotelModel();  // Instancia un objeto de la clase HotelModel
        $this->view = new hotelesView();  // Instancia un objeto de la clase hotelesView
    }

    // Método para mostrar la lista de hoteles
    public function mostrarHoteles() {
        // Inicia la sesión
        session_start();

        // Redirecciona a la página de inicio si el usuario no ha iniciado sesión
        if (!$_SESSION['user']) {
            header('Location: ./index.php');
        }

        // Obtiene la lista de hoteles utilizando el modelo
        $hoteles = $this->model->getHoteles();

        // Muestra la lista de hoteles utilizando la vista
        $this->view->mostrarHoteles($hoteles);
    }
}

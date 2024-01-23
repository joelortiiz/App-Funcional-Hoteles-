<?php

 class HotelesController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HotelModel();
        $this->view = new hotelesView();
    }

    public function mostrarHoteles() {
        
         $this->view->mostrarFormulario();
    }
    // Muestra la lista de tareas
    public function listar() {
        // Recupera la lista de tareas del modelo
        $tareas = $this->model->getTareas();
        // Muestra la vista de la lista de tareas
        $this->view->mostrarLista($tareas);
    }
}
<?php

    class usuariosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HotelModel();
        $this->view = new usuariosView();
    }

    public function mostrarUsuarios() {
        
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

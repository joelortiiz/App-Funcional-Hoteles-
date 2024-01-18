<?php

// Incluye los archivos de modelo, vista y controlador
include './lib/models/HotelModel.php.php';
include './views/LoginView.php';
include './controllers/LoginController.php';
// Crea una instancia del controlador de tareas
$tareasController = new TareasController();
// Ejecuta la acción de listar tareas
$tareasController->listar();

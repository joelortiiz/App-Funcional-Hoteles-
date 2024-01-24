<?php
include './lib/models/UsuarioModel.php';
include './views/usuariosView.php';

 class UsuariosController {
    private $model;
    private $view;
    
    public function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new usuariosView();
    }

    public function mostrarUsuarios() {
        
         $this->view->mostrarFormulario();
    }
    public function mostrarErrorForm() {
        
         $this->view->mostrarFormulario();
    }
    // Muestra la lista de tareas
    public function comprobarLogin() {

        if (isset($_POST['usuario']) && isset($_POST['password'])) {
            
            $userPost = $_POST['usuario'];
            $passPost = $_POST['password'];
            
            
            $user = $this->model->comprobarUsuarioDB($userPost, $passPost);
          
            if ($user != false) {
                //echo 'login correcto';
                
                $this->correctoLogin($user);
                
            } else {
                $this->errorLogin();
            }
        }
        
    }
    
        function errorLogin() {
        header('Location:' . $_SERVER['PHP_SELF'] . '?controller=usuarios&action=mostrarErrorForm&error');
    }
      function correctoLogin($user) {
        $this->createSessionUser($user);
        header('Location:' . $_SERVER['PHP_SELF'] . '?controller=Hotel&action=listHotels');
    }
}
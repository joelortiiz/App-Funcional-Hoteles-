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
            $_SESSION['id'] = $user->getId();
            
            if ($user != false) {
                

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
        $this->iniciarSesionUsuario($user);
        header('Location:' . $_SERVER['PHP_SELF'] . '?controller=Hoteles&action=mostrarHoteles');
    }

    function iniciarSesionUsuario($user) {
        session_start();

        $_SESSION['user'] = $user->getNombre();
        $this->createSessionCookie($_SESSION['user']);
    }

    function cerrarSesionUsuario() {
        session_start();
//Destruimos las sesiones

        $_SESSION = array();
        session_destroy();

//Redirigimos al inicio con las sesiones cerradas
        header('Location: ./index.php?controller=usuarios&action=mostrarErrorForm&logout'
);
    }

    /**
     * Function to create session expiration cookie for a specific user
     * 
     * @param Usuario $user especific Usuario object on session
     */
    public function createSessionCookie($user) {
        setcookie(hash('sha256', $user), 'sessionCookie', time() + 2400, '/');
    }
}

<?php

include './lib/models/UsuarioModel.php';
include './views/usuariosView.php';

// Definición de la clase UsuariosController

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
            //Guardamos los datos recibidos por el formulario.
            $userPost = $_POST['usuario'];
            $passPost = $_POST['password'];
            //comprobamos que el usuario y contraseña sean correctos
            $user = $this->model->comprobarUsuarioDB($userPost, $passPost);
            //Si es correcto:
            if ($user != false) {
                $_SESSION['id'] = $user->getId();
                //Llamamos a la función que se encarga de redirigir al usuario a ver los hoteles.
                $this->correctoLogin($user);
                //Si el usuario no es correcto
            } else {
                //función que hace que evita al cliente intruso o avisa que los datos no son correctos.
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

        //Redirigimos al inicio con todas las sesiones destruidas
        header('Location: ./index.php?controller=usuarios&action=mostrarErrorForm&logout'
        );
    }

    //Creamos cookies
    public function createSessionCookie($user) {
        if (!isset($_COOKIE["conexion"])) {
            $fecha_actual = date("d/m H:i");
            setcookie("conexion", $fecha_actual, time() + 3600 * 24, "/");
        } else {
            setcookie("conexion", $fecha_actual, time() - 60, "/");
            $fecha_actual = date("d/m H:i");
            setcookie("conexion", $fecha_actual, time() + 3600 * 24, "/");
        }
        setcookie(hash('sha256', $user), 'sessionCookie', time() + 2400, '/');
    }
}

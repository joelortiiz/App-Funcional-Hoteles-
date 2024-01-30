<?php

include './lib/models/HotelModel.php';
include './views/hotelesView.php';

 class HotelesController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HotelModel();
        $this->view = new hotelesView();
    }

    public function mostrarHoteles() {
        session_start();
        if(!$_SESSION['user']) {
            header('Location: ./index.php');
        }
        
            $hoteles = $this->model->getHoteles();
         $this->view->mostrarHoteles($hoteles);
         
   
    }
   
}
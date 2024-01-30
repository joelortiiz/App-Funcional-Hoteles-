<?php

// Obtiene una instancia del modelo y de la vista de tareas
class usuariosView {

    // Muestra la lista de tareas
    public function mostrarFormulario() {
   
        ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Mi aplicación de hoteles</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
 <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form class="card-body p-5 text-center" method="POST" action="./index.php?controller=usuarios&action=comprobarLogin" >

            <h3 class="mb-5">Entrar</h3>
            <?php
            if (isset($_GET["error"])) {
                    echo "<p class='text-danger'>Datos incorrectos</p>";
                }
                if (isset($_GET["logout"])) {
                    echo "<p class='text-success'>Sesión cerrada correctamente </p>";
                }
                ?>
            <div class="form-outline mb-4">
              <input type="text" id="typeEmailX-2" name="usuario" class="form-control form-control-lg" >
              <label class="form-label" for="typeEmailX-2">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" >
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" >
              <label class="form-check-label" for="form1Example3">  Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            
          </form>
          <hr class="my-4">
        </div>
      </div>
    </div>
  </div>
</section>');
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

 <?php
     }
 
}


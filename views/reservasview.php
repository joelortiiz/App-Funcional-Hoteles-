<?php

class reservasView {

    function mostrarReservas($reservas, $reservasUser, $resultadoReserva) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <!-- comment -->
            <head>
                <meta charset="utf-8">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">

                <title>Sailor Bootstrap Template - Index</title>
                <meta content="" name="description">
                <meta content="" name="keywords">

                <!-- Favicons -->
                <link href="assets/img/favicon.png" rel="icon">
                <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

                <!-- Google Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

                <!-- Vendor CSS Files -->
                <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
                <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
                <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
                <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
                <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
                <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

                <link href="assets/css/style.css" rel="stylesheet">
            </head>

            <body>

                <!-- ======= Header ======= -->
                <header id="header" class="fixed-top d-flex align-items-center">
                    <div class="container d-flex align-items-center">

                        <h1 class="logo me-auto"><a href="index.php?controller=usuarios&action=mostrarFormulario">Joel O.</a></h1>
                        <!-- Uncomment below if you prefer to use an image logo -->
                        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                        <nav id="navbar" class="navbar">
                            <ul>
                                <li><a href="index.php?controller=Hoteles&action=mostrarHoteles" class="active">Home</a></li>

                                <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="testimonials.html">Testimonials</a></li>

                                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                            <ul>
                                                <li><a href="#">Deep Drop Down 1</a></li>
                                                <li><a href="#">Deep Drop Down 2</a></li>
                                                <li><a href="#">Deep Drop Down 3</a></li>
                                                <li><a href="#">Deep Drop Down 4</a></li>
                                                <li><a href="#">Deep Drop Down 5</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="blog.html">Blog</a></li>

                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="./index.php?controller=usuarios&action=cerrarSesionUsuario&error" class="getstarted">Cerrar Sesión</a></li>
                            </ul>
                            <i class="bi bi-list mobile-nav-toggle"></i>
                        </nav><!-- .navbar -->

                    </div>
                </header><!-- End Header -->

                <!-- ======= Hero Section ======= -->


                <main id="main">

                    <!-- ======= About Section ======= -->
                    <section id="about" class="about ">
                        <div class="container ">

                            <div class="row content ">
                                <div class="col-lg-12 text-center">
                                    <h2 class="p-4">Zona de Reserva</h2>

                                    <?php
                                    if ($resultadoReserva == 'fallida') {
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                        echo 'Reserva no disponible o errónea. Cambia la fecha.';
                                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                        echo '</div>';
                                    }
                                    if (isset($_GET['success'])) {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                        echo 'La Reserva ha sido realizada con éxito.';
                                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                                    <h3>Detalles de la reserva</h3>
                                    <div class="text-center text-danger m-4">

                                        <?php
                                        //Recorremos los valores de la reserva que vamos a hacer.
                                        foreach ($reservas as $value) {
                                            echo '<p>Tipo de habitación:' . $value['tipo'] . '</p>';
                                            echo '<p>Precio Final: ' . $value['precio'] . '€</p>';
                                            echo '<p>Nº Habitaciones: ' . $value['num_habitacion'] . '</p>';
                                            echo '<p>Desc: ' . $value['descripcion'] . '</p>';
                                            ?>

                                        </div>
                                        <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                                            <h3>Confirma tu reserva</h3>
                                            <form action="index.php?controller=Reservas&action=comprobarReserva" class="mt-4" method="post">
                                                <?php ?>
                                                <input type="hidden"  name="id_usuario" value="<?php echo $_COOKIE['id'] ?>" >
                                                <input type="hidden"  name="id_hotel" value="<?php echo $value['id_hotel'] ?>" >
                                                <input type="hidden"  name="id_habitacion" value="<?php echo $value['id'] ?>" >
                                                <div class="mb-3">
                                                    <label for="fecha_entrada" class="form-label">Fecha de Entrada:</label>
                                                    <input type="date" id="fecha_entrada" name="fecha_entrada" class="form-control" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fecha_salida" class="form-label">Fecha de Salida:</label>
                                                    <input type="date" id="fecha_salida" name="fecha_salida" class="form-control" >
                                                </div>

                                                <button type="submit" class="btn btn-danger">Enviar Reserva</button>
                                            </form>

                                        </div> 
                                        <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </section><!-- End About Section -->
                    <!--Services Section-->
                    <section id="services" class="services">
                        <div class="container">

                            <div class="row p-4 mb-4">
                                <?php
                                if (!$reservasUser == null) {
                                    ?>
                                    <div class="col-md-12 mt-4 mt-md-0 d-flex flex-column justify-content-center align-items-center">
                                        <h2> Tus Reservas, <?php echo ucfirst($_SESSION['user']); ?></h2>
                                    </div>
                                    <?php
                                    echo "<table class='text-center m-2'>
                                                <tr>
                                                  <th>Detalles</th>
                                                  <th>Fecha Entrada</th>
                                                  <th>Fecha Salida</th>
                                                    </tr>";
                                    foreach ($reservasUser as $reserva) {
                                        // Cabecera de la tabla
                                        ?>

                                        <?php
                                        echo "<tr>";
                                        ?>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle m-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Mostrar
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#"><?php echo "ID Reserva: " . $reserva['id']; ?></a>
                                                    <a class="dropdown-item" href="#"><?php echo "ID Usuario: " . $reserva['id_usuario']; ?></a>
                                                    <a class="dropdown-item" href="#"><?php echo "ID Habitación: " . $reserva['id_habitacion']; ?></a>
                                                </div>
                                            </div>
                                        </td>
                                        <?php
                                        echo "<td>" . $reserva['fecha_entrada'] . "</td>";
                                        echo "<td>" . $reserva['fecha_salida'] . "</td>";
                                        echo "</tr>";
                                    }

//                                       Cerrar la tabla
                                    echo "</table>";
                                    ?>
                                    <?php
                                } else {
                                    ?>

                                    <div class="col-md-12 mt-4 mt-md-0 d-flex flex-column justify-content-center align-items-center">
                                        <h2> No tienes Reservas</h2>
                                        <div class="col-md-12 mt-4 mt-md-0 d-flex flex-column justify-content-center align-items-center">

                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                    </section><!-- End Services Section -->


                </main><!-- End #main -->

                <!--  Footer  -->
                <footer id="footer" class="mt-4">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="footer-info">
                                        <h3>Sailor</h3>
                                        <p>
                                            A108 Adam Street <br>
                                            NY 535022, EE. UU.<br><br>
                                            <strong>Teléfono:</strong> +1 5589 55488 55<br>
                                            <strong>Email:</strong> info@example.com<br>
                                        </p>
                                        <div class="social-links mt-3">
                                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-6 footer-links">
                                    <h4>Enlaces útiles</h4>
                                    <ul>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Acerca de nosotros</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Términos de servicio</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Política de privacidad</a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-3 col-md-6 footer-links">
                                    <h4>Nuestros Servicios</h4>
                                    <ul>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Diseño web</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo web</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Gestión de productos</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="#">Diseño gráfico</a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-4 col-md-6 footer-newsletter">
                                    <h4>Nuestro Boletín</h4>
                                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                                    <form method="post">
                                        <input type="email" name="email"><input type="submit" value="Suscribirse">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="copyright">
                            &copy; Derechos de autor <strong><span>Sailor</span></strong>. Todos los derechos reservados
                        </div>

                    </div>
                </footer>

                <!-- End Footer -->
                <script src="assets/js/main.js"></script>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </body>

        </html>
        <?php
    }
}

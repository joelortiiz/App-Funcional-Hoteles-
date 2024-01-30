<?php

class habitacionesView {

    function mostrarHabitaciones($habitaciones) {
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
                    <section id="about" class="about">
                        <div class="container">

                            <div class="row content">
                                <div class="col-lg-12 text-center">
                                    <h2>Habitaciones</h2>
                                    <h3>Disponibles para reservar</h3>
                                </div>

                            </div>

                        </div>
                    </section><!-- End About Section -->
                    <!-- ======= Services Section ======= -->
                    <section id="services" class="services">
                        <div class="container">

                            <div class="row">
                                <?php
                                foreach ($habitaciones as $habitacion) {
                                    ?>

                                    <div class="col-md-12 mt-4 mt-md-0 d-flex flex-column justify-content-center align-items-center">
                                        <h2> Habitación</h2>
                                        <div class="col-md-12 mt-4 mt-md-0 d-flex flex-column justify-content-center align-items-center">

                                            <img src="assets/img/habitaciones/habitacion1.jpg" class="img-fluid rounded" alt="alt">
                                        </div>
                                        <div class="icon-box mt-4" >

                                            <div class="d-flex flex-column">
                                                <h4>
                                                    <img src="assets/img/hoteles/cama.png" class="m-2" style="width: 25px" alt="alt">                                               
                                                    <?php echo ucfirst($habitacion->getTipo()) . ' | ' . $habitacion->getPrecio() . ' €'; ?></h4>

                                                    <?php echo $habitacion->getDescripcion() ?>
                                               
                                                <div class="text-center">
                                                    <form class="form" action="<?= $_SERVER['PHP_SELF'] . '?controller=Reservas&action=mostrarReservas&idHotel=' . $habitacion->getId_hotel() . '&idHabitacion=' . $habitacion->getId(); ?>" method="POST">
                                                        <input type="hidden" name="id_hotel" value="<?php echo $habitacion->getId() ?>">
                                                        <input type="hidden" name="nombre_hotel" value="<?php echo $habitacion->getNum_habitacion() ?>">
                                                        <button class="btn bg-danger text-light" type="submit">Reservar</button>
                                                    </form>
                                                </div>
                                            </div>
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
                <footer id="footer">
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

                <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

                <!-- Vendor JS Files -->
                <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
                <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
                <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
                <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
                <script src="assets/vendor/php-email-form/validate.js"></script>

                <!-- Template Main JS File -->
                <script src="assets/js/main.js"></script>

            </body>

        </html>
        <?php
    }
}

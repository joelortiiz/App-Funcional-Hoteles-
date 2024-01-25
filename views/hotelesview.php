<?php

class hotelesView {

    public function mostrarHoteles($hoteles) {


        foreach ($hoteles as $value) {
            //echo $value ;
        }
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
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

                <!-- Vendor CSS Files -->
                <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
                <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
                <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
                <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
                <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
                <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

                <!-- Template Main CSS File -->
                <link href="assets/css/style.css" rel="stylesheet">

                <!-- =======================================================
                * Template Name: Sailor
                * Updated: Jan 09 2024 with Bootstrap v5.3.2
                * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
                * Author: BootstrapMade.com
                * License: https://bootstrapmade.com/license/
                ======================================================== -->
            </head>

            <body>

                <!-- ======= Header ======= -->
                <header id="header" class="fixed-top d-flex align-items-center">
                    <div class="container d-flex align-items-center">

                        <h1 class="logo me-auto"><a href="index.html">Joel O.</a></h1>
                        <!-- Uncomment below if you prefer to use an image logo -->
                        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                        <nav id="navbar" class="navbar">
                            <ul>
                                <li><a href="index.html" class="active">Home</a></li>

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
                <section id="hero">
                    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                        <div class="carousel-inner" role="listbox">

                            <!-- Slide 1 -->
                            <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
                                <div class="carousel-container">
                                    <div class="container">
                                        <h2 class="animate__animated animate__fadeInDown">Bienvenido a <span>Hotel Joel</span></h2>
                                        <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
                                <div class="carousel-container">
                                    <div class="container">
                                        <h2 class="animate__animated animate__fadeInDown">Motomamis Readyss</h2>
                                        <p class="animate__animated animate__fadeInUp">Okay, motomami
                                            Pesa mi tatami
                                            Hit a lo tsunami
                                            Oh
                                            Okay, motomami
                                            Fina, un origami
                                            Cruda a lo sashimi
                                            Oh
                                            A cada copia que ves
                                            Tú dale tu bendición
                                            Y yo no quiero competir</p>
                                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
                                <div class="carousel-container">
                                    <div class="container">
                                        <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                                        <p class="animate__animated animate__fadeInUp">
                                            Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. 
                                            Occaecati alias dolorem mollitia ut. Similique ea voluptatem. 
                                            Esse doloremque accusamus repellendus deleniti vel. 
                                            Minus et tempore modi architecto.</p>
                                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                        </a>

                        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                        </a>

                    </div>
                </section><!-- End Hero -->

                <main id="main">

                    <!-- ======= About Section ======= -->
                    <section id="about" class="about">
                        <div class="container">

                            <div class="row content">
                                <div class="col-lg-12 text-center">
                                    <h2>Hoteles Joel</h2>
                                    <h3>Tenemos disponibles los siguientes hoteles</h3>
                                </div>

                            </div>

                        </div>
                    </section><!-- End About Section -->
                    <!-- ======= Services Section ======= -->
                    <section id="services" class="services">
                        <div class="container">

                            <div class="row">
                                <?php
                                foreach ($hoteles as $hotel) {
                                    ?>

                                    <div class="col-md-12 mt-4 mt-md-0 d-flex flex-column justify-content-center align-items-center">
                                        <h2><?php echo $hotel->getNombre() ?></h2>
                                        <div class="col-md-12 mt-4 mt-md-0 d-flex flex-column justify-content-center align-items-center">

                                            <img src="assets/img/hoteles/hotel1.jpg" alt="alt">
                                        </div>
                                        <div class="icon-box mt-4" >

                                            <div class="d-flex flex-column">
                                                <h4><?php echo $hotel->getDireccion() . ' ' . $hotel->getCiudad() . ' , ' . $hotel->getPais(); ?></h4>
                                                <p>
                                                    <img src="assets/img/hoteles/cama.png" style="width: 25px" alt="alt"/> <?php echo " " . $hotel->getNum_habitaciones(); ?>                                                </p>
                                                <p>

                                                    <?php echo $hotel->getDescripcion() ?>
                                                </p>
                                                <div class="text-center">
                                                    <form class="" action="<?= $_SERVER['PHP_SELF'] . '?controller=Habitaciones&action=listHabitacionesByHotel' ?>" method="post">
                                                        <input type="hidden" name="hotel_id" value="<?php $hotel->getId() ?>">
                                                        <input type="hidden" name="hotel_name" value="<?php $hotel->getNombre() ?>">
                                                        <button class="btn bg-danger text-light" type="submit">Ver habitaciones</button>
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
                                    <form action="" method="post">
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
                        <div class="credits">
                            <!-- Todos los enlaces en el pie de página deben permanecer intactos. -->
                            <!-- Puedes eliminar los enlaces solo si compraste la versión pro. -->
                            <!-- Información de licencia: https://bootstrapmade.com/license/ -->
                            <!-- Compra la versión pro con formulario de contacto PHP/AJAX funcional: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
                            Diseñado por <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

    public
            function hoteles() {
        
    }
}

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sitio web </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">

                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <a href="?controlador=Default&accion=accionDefault"><img src="assets/img/logo/logo.png" height="60" width="60" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="?controlador=Default&accion=mostrarAgregarAtractivo">Crear atractivo</a></li>
                                            <li><a href="?controlador=Default&accion=mostrarActualizarAtractivo">Actualizar atractivo</a></li>
                                            <li><a href="?controlador=Default&accion=mostrarAgregarRuta">Crear ruta</a></li>
                                            <li><a href="?controlador=Default&accion=mostrarActualizarRuta">Actualizar ruta</a></li>
                                            <li><a href="?controlador=Default&accion=accionDefault">Cerrar sesión</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>

        <!-- slider Area Start-->

        <!-- slider Area End-->
        <!-- Our Services Start -->
        <div class="our-services servic-padding" id="Busqueda">
            <div class="container">
                <div class="section-tittle text-center">
                    <h3>Cargar ruta</h3>
                </div>
                <div class="section-top-border">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <center>
                                <div class="single-element-widget" style="width: 50% !important;">
                                    <h5 class="mb-30">Lista de rutas</h5>
                                    <div class="default-select" id="default-select"">
                                        <form action=" ?controlador=Default&accion=cargarRutaActualizar" method="POST">
                                        <select id="idRuta" name="idRuta">
                                            <?php foreach ($vars['rutas'] as $ruta) { ?>
                                                <option value=" <?php echo $ruta['id'] ?>"><?php echo $ruta['nombre'] ?></option>

                                            <?php } ?>
                                        </select>
                                        <center>
                                            <button type="submit" style="  background-color: gray;">
                                                <h4>Cargar ruta</h4>
                                            </button>
                                        </center>
                                        </form>
                                    </div>
                                </div>
                            </center>

                        </div>
                    </div>
                </div>
                <br><br><br>
                <?php if ($vars['actualizar']) { ?>
                    <div class="section-tittle text-center" id="actualizar">
                        <h2>Actualizar ruta</h2>
                        <br>
                        <form action="?controlador=Default&accion=actualizarRuta" method="POST">
                            <center>
                                <h3>Nombre de la ruta</h3>
                                <input type="text" id="nombre" name="nombre" value="<?php echo $vars['rutaSeleccionada']['nombre'] ?>">
                            </center>
                    </div>
                    <div class="section-top-border">

                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <center>
                                    <div class="single-element-widget" style="width: 50% !important;">
                                        <h3 class="mb-30">Tipo de Precio</h3>
                                        <div class="default-select" id="default-select"">
                                    <select id=" precio" name="precio">
                                            <option value="<?php echo $vars['rutaSeleccionada']['precio'] ?>" selected><?php echo $vars['nombrePrecio'] ?></option>
                                            <option value=" 1">Economico</option>
                                            <option value="2">Regular</option>
                                            <option value="3">Premium</option>
                                            </select>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <center>
                                    <div class="single-element-widget" style="width: 50% !important;">
                                        <h3 class="mb-30">Tipo de turistas</h3>
                                        <div class="default-select" id="default-select"">
                                    <select id=" tipoTurista" name="tipoTurista">
                                            <option value="<?php echo $vars['rutaSeleccionada']['tipoTurista'] ?>" selected><?php echo $vars['nombreTipoTurista'] ?></option>
                                            <option value=" 1">Niños</option>
                                            <option value="2">Adultos</option>
                                            <option value="3">Todo Publico</option>
                                            </select>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <center>
                                    <div class="single-element-widget" style="width: 50% !important;">
                                        <h3 class="mb-30">Tipo de actividad</h3>
                                        <div class="default-select" id="default-select"">
                                    <select id=" tipoActividad" name="tipoActividad">
                                            <option value="<?php echo $vars['rutaSeleccionada']['tipoActividad'] ?>" selected><?php echo $vars['nombreTipoActividad'] ?></option>
                                            <option value=" 1">Turismo cultural</option>
                                            <option value="2">Turismo de aventura</option>
                                            <option value="3">Turismo de playa</option>
                                            </select>
                                        </div>
                                    </div>
                                </center>
                                <br><br>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <center>
                                    <div class="single-element-widget" style="width: 50% !important;">
                                        <h3 class="mb-30">Lista de atractivos</h3>
                                        <div class="default-select" id="default-select">
                                            <table>
                                                <?php foreach ($vars['atractivos'] as $atractivo) { ?>
                                                    <tr>
                                                        <td>◙ <?php echo $atractivo['nombre'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>

                                    </div>
                                </center>

                            </div>
                        </div>
                        <input type="hidden" id="id" name="id" value="<?php echo $vars['rutaSeleccionada']['id'] ?>">
                        <center>
                            <button type="submit" style="background-color: black;">Actualizar ruta</button>
                        </center>
                        </form>

                    </div>
                <?php } ?>
            </div>
        </div>
        <br><br><br><br>
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding footer-bg" data-background="assets/img/service/footer_bg.jpg">
            <div class="container">
                <div class="row d-flex justify-content-between">

                </div>
                <!-- Footer bottom -->
                <div class="row pt-padding">
                    <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="footer-copy-right">

                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5">


                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>
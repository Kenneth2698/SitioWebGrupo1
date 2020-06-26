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
            <?php if (isset($vars['mensaje'])) { ?>
                <center>
                    <h3 style="color: red;"><?php echo $vars['mensaje'] ?> correctamente</h3>
                </center>
                <br>
            <?php } else { ?>

                <center>
                 <h3>Lista de atractivos</h3>
                </center>
                <br>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del atractivo</th>
                        <th>Descripcion del atractivo</th>
                        <th>Imagen</th>
                        <th>Video</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vars['atractivos'] as $atractivo) { ?>
                        <tr>
                            <form action="?controlador=Default&accion=actualizarAtractivo" method="POST">
                                <input type="hidden" id="id" name="id" value="<?php echo $atractivo['id'] ?>">
                                <th><?php echo $atractivo['id'] ?></th>
                                <td><input type="text" id="nombre" name="nombre" value="<?php echo $atractivo['nombre'] ?>"></td>
                                <td> <textarea name="descripcion" id="descripcion" cols="70" rows="5"> <?php echo $atractivo['descripcion'] ?></textarea> </td>
                                <th>
                                    <select size="1" name="imagen" id="imagen">
                                        <option selected value=" <?php echo $atractivo['imagen'] ?>">Imagen <?php echo $atractivo['imagen'] ?> </option>
                                        <option value="1">Imagen 1</option>
                                        <option value="2">Imagen 3</option>
                                        <option value="3">Imagen 4</option>
                                        <option value="4">Imagen 5</option>
                                        <option value="5">Imagen 6</option>
                                        <option value="6">Imagen 6</option>
                                        <option value="7">Imagen 7</option>
                                        <option value="8">Imagen 8</option>
                                        <option value="9">Imagen 9</option>
                                        <option value="10">Imagen 10</option>
                                        <option value="11">Imagen 11</option>
                                        <option value="12">Imagen 12</option>
                                        <option value="13">Imagen 13</option>
                                        <option value="14">Imagen 14</option>
                                        <option value="15">Imagen 15</option>
                                        <option value="16">Imagen 16</option>
                                        <option value="17">Imagen 17</option>
                                        <option value="18">Imagen 18</option>
                                        <option value="19">Imagen 19</option>
                                        <option value="20">Imagen 20</option>
                                        <option value="21">Imagen 21</option>
                                        <option value="22">Imagen 22</option>
                                        <option value="23">Imagen 23</option>
                                        <option value="24">Imagen 24</option>
                                        <option value="25">Imagen 25</option>
                                        <option value="26">Imagen 26</option>
                                        <option value="27">Imagen 27</option>
                                        <option value="28">Imagen 28</option>
                                        <option value="29">Imagen 29</option>
                                        <option value="30">Imagen 30</option>
                                    </select>
                                </th>
                                <th>
                                    <select size="1" name="video" id="video">
                                        <option selected value=" <?php echo $atractivo['video'] ?>">Video <?php echo $atractivo['video'] ?> </option>
                                        <option value="1">Video 1</option>
                                        <option value="2">Video 2</option>
                                        <option value="3">Video 3</option>
                                        <option value="4">Video 4</option>
                                        <option value="5">Video 5</option>
                                        <option value="6">Video 6</option>
                                        <option value="7">Video 7</option>
                                        <option value="8">Video 8</option>
                                        <option value="9">Video 9</option>
                                        <option value="10">Video 10</option>
                                    </select>
                                </th>
                                <td><button class="btn-warning">Actualizar</button></td>
                            </form>
                            <form action="?controlador=Default&accion=eliminarAtractivo" method="POST">
                                <input type="hidden" id="id" name="id" value="<?php echo $atractivo['id'] ?>">
                                <td><button class="btn-danger">Eliminar</button></td>
                            </form>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
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
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
                                <a href="?controlador=Default&accion=accionDefault"><img src="assets/img/logo/logo.png" height="60" width="60"  alt=""></a>
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
                    <h2>Estos son los atractivos recomendados para la ruta que creaste!</h2>
                </div>
                <div class="section-top-border">
                    <center>
                    <div class="single-element-widget" style="width: 50% !important;">
                        <h3 class="mb-30">Lista de atractivos</h3>
                        <div >
                            <select id="atractivo" name="atractivo">
                            <?php foreach ($vars['atractivos'] as $atractivo) { ?>
                                <option value="<?php echo $atractivo['id'] ?>"><?php echo $atractivo['nombre'] ?></option>
                            <?php  } ?>
                                </select>
                            <center>
                            <input type="button" class="genric-btn primary e-large" href="javascript:;" onclick="agregarAtractivoRuta($('#atractivo').val());return false;" value="Agregar">
                            </center>
                        </div>
                        </center>
                    </div>
                    
                </div>

                <center>
                <form action="?controlador=Default&accion=registrarAtractivoRuta" method="POST">
                    <button type="submit" class="genric-btn primary e-large">Registrar ruta</button>
                </form>
                </center>
            </div>
            </div>
        </div>
        <br><br><br>
        <center>
            <p style="color: green" id="mensaje"></p>
            </center>
        <br><br><br><br><br><br>
    </main>

<script>

function agregarAtractivoRuta(id) {
    var parametros = {
        "id": id
    };
    $.ajax(
        {
            data: parametros,
            url: '?controlador=Default&accion=agregarAtractivoRuta',
            type: 'post',
            beforeSend: function () {
                $("#mensaje").html("Procesando, \n\ espere por favor...");
            },
            success: function (response) {
                $("#mensaje").html(response);
            }
        }
    );
}

</script>


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
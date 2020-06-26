<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sitio web </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24"></script>

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
                                            <li><a href="?controlador=Default&accion=accionDefault#Busqueda">Ingresar criterios</a></li>
                                            <li><a href="?controlador=Default&accion=mostrarLogin">Iniciar sesión</a></li>
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
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/contact_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <h2><?php echo $vars['nombreRuta'] ?> </h2>
                    </div>
                </div>
            </div>



            <style>
                .modal {

                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    /* Stay in place */
                    z-index: 1;
                    /* Sit on top */
                    padding-top: 100px;
                    /* Location of the box */
                    left: 0;
                    top: 0;
                    width: 100%;
                    /* Full width */
                    height: 100%;
                    /* Full height */
                    overflow: auto;
                    /* Enable scroll if needed */
                    background-color: rgb(0, 0, 0);
                    /* Fallback color */
                    background-color: rgba(0, 0, 0, 0.4);
                    /* Black w/ opacity */
                    cursor: auto;
                }

                /* Modal Content */
                .modal-content {
                    -webkit-transition: display 0.8s ease;
                    -moz-transition: display 0.8s ease;
                    -o-transition: display 0.8s ease;
                    -ms-transition: display 0.8s ease;
                    transition: display 0.8s ease;

                    background-color: rgba(34, 18, 0, 0.589);
                    margin: auto;
                    padding: 20px;
                    border: 1px solid #888;
                    width: 50%;
                }

                .modal-content h4 {
                    padding: 10px;
                    color: white;
                }

                /* The Close Button */
                .close {
                    color: #ffffff;
                    float: inline-end;
                    font-size: 35px;
                    font-weight: bold;
                }

                .close:hover,
                .close:focus {
                    color: rgb(247, 11, 11);
                    text-decoration: none;
                    cursor: pointer;
                }
            </style>
            <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
            <script>
                var myMap;
                var myLatlng = new google.maps.LatLng(<?php echo $vars['latitudRuta'] ?>, <?php echo $vars['longitudRuta'] ?>);

                function initialize() {
                    var mapOptions = {
                        zoom: 17,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: true
                    }
                    myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: myMap,
                        title: 'Ruta',
                        icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
                    });
                }
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>


            <div class="section-top-border" id="galeria">
                <h3>Atractivos pertenecientes a la ruta <?php echo $vars['nombreRuta'] ?></h3>
                <div class="row gallery-item">
                    <?php foreach ($vars['atractivos'] as $atractivo) { ?>
                        <div class="col-md-4">
                            <a class="#galeria" onclick="modal('<?php echo $atractivo['descripcion'] ?>','<?php echo $atractivo['video'] ?>',<?php echo $atractivo['imagen'] ?>)">
                                <div class="single-gallery-image" style="background: url(view/assets/img/imagenes/i<?php echo $atractivo['imagen'] . ".jpg" ?>);"></div>
                                <p><?php echo $atractivo['nombre'] ?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>`
            </div>
            <center>
                <div class="col-md-10" id="map" style="width:100%; height: 300px;"></div>
            </center>
            <div class="favourite-place place-padding">
                <div class="container">
                    <div class="section-tittle text-center">
                        <h2>También te puede interesar ▼</h2> 
                    </div>
                    <div class="row">
                        <?php foreach ($vars['rutas'] as $ruta) { ?>
                            <div class="col-md-4">
                                <div class="single-place mb-30">
                                    <div class="place-img">
                                        <img src="view/assets/img/imagenes/i<?php echo $ruta['imagen'] ?>.jpg" alt="">
                                    </div>
                                    <div class="place-cap">
                                        <div class="place-cap-top">
                                            <h3><a href="?controlador=Default&accion=mostrarResultadoRuta&idRuta=<?php echo $ruta['id'] ?>"><?php echo $ruta['nombre'] ?></a></h3>
                                        </div>
                                        <div class="place-cap-bottom">
                                            <ul>
                                                <li><i class="fas fa-map-marker-alt"></i>Costa Rica</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <CENTER>
                        <span id="1" class="close">&times;</span>
                        <div id="contenidoModal">
                        </div>
                    </CENTER>
                </div>
            </div>
            <script>
                var modal;
                var span;
                var contenidoModal;

                function modal(descripcion, video, imagen) {
                    contenidoModal = document.getElementById("contenidoModal");
                    contenidoModal.innerHTML = '<CENTER><img src="view/assets/img/imagenes/i' + imagen + '.jpg" alt="oferta1" width="500" height="300" /><h4>' + descripcion + '</h4>' +
                        '<iframe width="560" height="315" src="' + video + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></CENTER>';


                    document.getElementById('myModal').style = "display: block";
                }
                var modal1 = document.getElementById('myModal');
                var span = document.getElementById("1");
                span.onclick = function() {
                    modal1.style.display = "none";
                }
                window.onclick = function(event) {
                    if (event.target == modal1) {
                        modal1.style.display = "none";
                    }
                }
            </script>

        </div>
    </section>
    <!-- ================ contact section end ================= -->

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

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

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
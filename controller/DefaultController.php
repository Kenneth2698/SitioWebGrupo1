    <?php

    session_start();


    if (!isset($_SESSION['atractivosRuta'])) {
        $_SESSION['atractivosRuta'] = array();
    }
    //Kenneth Lopez
    //Byron Ortiz
    require 'model/Algoritmos.php';

    class DefaultController
    {
        private $view;

        public function __construct()
        {
            $this->view = new View();
        } //constructor

        //funciones para mostrar las vistas

        public function AccionDefault()
        {

            $resultado['tieneRespuesta'] = false;

            $this->view->show('indexView.php', $resultado);
        } //accionDefault

        public function mostrarMenuAdmin()
        {
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];

            if ($usuario == "admin" && $contrasena == "admin") {
                $this->view->show('menuAdministrativo.php', null);
            } else {
                $datos['mensaje'] = "Usuario incorrecto";
                $this->view->show('login.php', $datos);
            }
        } //mostrarMenuAdmin

        public function mostrarActualizarRuta()
        {

            $algoritmos = new Algortimos();
            $datos['rutas'] = $algoritmos->obtenerTodasLasRutas();
            $datos['actualizar'] = false;
            $this->view->show('actualizarRuta.php', $datos);
        } //mostrarActualizarRuta

        public function cargarRutaActualizar()
        {
            $algoritmos = new Algortimos();
            $idRuta = $_POST['idRuta'];
            $atractivosRuta = $algoritmos->obtenerAtractivos($idRuta);


            $nombrePrecio = "";
            $nombreTipoTurista = "";
            $nombreTipoActividad = "";


            $datos['rutas'] = $algoritmos->obtenerTodasLasRutas();
            $datos['rutaSeleccionada'] = $algoritmos->obtenerDatosRuta($idRuta);

            //se cargan los nombre de los atributos de acuerdo al lid
            switch ($datos['rutaSeleccionada']['precio']) {
                case 1:
                    $nombrePrecio = "Económico";
                    break;
                case 2:
                    $nombrePrecio = "Regular";
                    break;
                case 3:
                    $nombrePrecio = "Premium";
                    break;
            }
            switch ($datos['rutaSeleccionada']['tipoTurista']) {
                case 1:
                    $nombreTipoTurista = "Niños";
                    break;
                case 2:
                    $nombreTipoTurista = "Adultos";
                    break;
                case 3:
                    $nombreTipoTurista = "Todo Público";
                    break;
            }
            switch ($datos['rutaSeleccionada']['precio']) {
                case 1:
                    $nombreTipoActividad = "Turismo cultural";
                    break;
                case 2:
                    $nombreTipoActividad = "Turismo de aventura";
                    break;
                case 3:
                    $nombreTipoActividad = "Turismo de playa";
                    break;
            }
            //se asgina al array para enviarlo a la vista
            $datos['nombrePrecio'] = $nombrePrecio;
            $datos['nombreTipoTurista'] = $nombreTipoTurista;
            $datos['nombreTipoActividad'] = $nombreTipoActividad;

            $datos['actualizar'] = true;
            $datos['atractivos'] = $atractivosRuta;
            $this->view->show('actualizarRuta.php', $datos);
        } //cargarRutaActualizar

        public function mostrarAgregarAtractivo()
        {
            $this->view->show('agregarAtractivo.php', null);
        } //mostrarAgregarAtractivo

        public function mostrarAgregarRuta()
        {
            $this->view->show('agregarRuta.php', null);
        } //mostrarAgregarRuta

        public function mostrarListaRutas()
        {

            
            $algoritmos = new Algortimos();
            $precio = 0;
            $tipoTurista = 0;
            $tipoActividad = 0;

            //Saber cual PRECIO selecciono el usuario
            if (isset($_POST['economico'])) {
                $precio = 1;
            } else if (isset($_POST['regular'])) {
                $precio = 2;
            } else if (isset($_POST['premium'])) {
                $precio = 3;
            }

            //Saber cual TIPOTURISTA selecciono el usuario
            if (isset($_POST['ninos'])) {
                $tipoTurista = 1;
            } else if (isset($_POST['adultos'])) {
                $tipoTurista = 2;
            } else if (isset($_POST['todos'])) {
                $tipoTurista = 3;
            }

            //Saber cual precio TIPOACTIVIDAD el usuario
            if (isset($_POST['cultural'])) {
                $tipoActividad = 1;
            } else if (isset($_POST['aventura'])) {
                $tipoActividad = 2;
            } else if (isset($_POST['playa'])) {
                $tipoActividad = 3;
            }

            //se asignan los datos a un array
            $datosUsuario = array();
            $datosUsuario['precio'] = $precio;
            $datosUsuario['tipoActividad'] = $tipoActividad;
            $datosUsuario['tipoTurista'] = $tipoTurista;

            //se ejecuta el algoritmo Euclides con los datos del usuario
            $resultado['rutas'] = $algoritmos->euclides($datosUsuario);
            $_SESSION['rutas'] = $resultado['rutas'];

            $this->view->show('listaRutas.php',  $resultado);
        } //mostrarListaRutas

        public function mostrarLogin()
        {
            $this->view->show('login.php', null);
        } //mostrarLogin

        public function mostrarResultadoRuta()
        {
            $algoritmos = new Algortimos();
            $idRuta = $_GET['idRuta'];

            $datosRuta = $algoritmos->obtenerDatosRuta($idRuta);
            $atractivosRuta = $algoritmos->obtenerAtractivos($idRuta);
            //se obtiene los datos de la ruta para mostrarlo en la vista
            $resultado['nombreRuta'] = $datosRuta['nombre'];
            $resultado['latitudRuta'] = $datosRuta['latitud'];
            $resultado['longitudRuta'] = $datosRuta['longitud'];
            $resultado['atractivos'] = $atractivosRuta;
            $resultado['rutas'] = $_SESSION['rutas'];

            $this->view->show('resultadoRuta.php', $resultado);
        } //mostrarResultadoRuta



        public function mostrarActualizarAtractivo()
        {
            $algoritmos = new Algortimos();
            $resultado['atractivos'] = $algoritmos->obtenerTodosLosAtractivos();

            $this->view->show('actualizarAtractivo.php', $resultado);
        } //mostrarActualizarAtractivo


        public function agregarAtractivo()
        {
            $algoritmos = new Algortimos();
            //se obtienen los datos 
            $lugar = $_POST['lugar'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];
            $video = $_POST['video'];
            $precio = $_POST['precio'];
            $tipoTurista = $_POST['tipoTurista'];
            $tipoActividad = $_POST['tipoActividad'];
            $categoria = rand(1, 3);


            //se agrega el atractivo 
            $algoritmos->agregarAtractivo($lugar, $descripcion, $imagen, $video, $precio, $tipoTurista, $tipoActividad, $categoria);
            $resultado['mensaje'] = "Ingresado correctamente";
            $this->view->show('agregarAtractivo.php', $resultado);
        } 


        public function actualizarAtractivo()
        {
            $algoritmos = new Algortimos();
            //se obtienen los datos 
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];
            $video = $_POST['video'];

            //se actualiza el atractivo y se vuelven a cargar todos los atractivos 
            $algoritmos->actualizarAtractivo($id, $nombre, $descripcion, $imagen, $video);
            $resultado['atractivos'] = $algoritmos->obtenerTodosLosAtractivos();
            $resultado['mensaje'] = "Actualizado";
            $this->view->show('actualizarAtractivo.php', $resultado);
        } //actualizarAtractivo

        public function eliminarAtractivo()
        {
            $algoritmos = new Algortimos();

            $id = $_POST['id'];

            //se elimina el atractivo y se vuelven a cargar todos los atractivos 
            $algoritmos->eliminarAtractivo($id);
            $resultado['atractivos'] = $algoritmos->obtenerTodosLosAtractivos();
            $resultado['mensaje'] = "Eliminado";
            $this->view->show('actualizarAtractivo.php', $resultado);
        } //actualizarAtractivo

        //METODO EN EL QUE SE REGISTRAN LOS DATOS DE LA RUTA Y SE OBTIENEN LOS ATRACTIVOS RECOMENDADOS SEGUN LOS CRITERIOS DE LA RUTA MEDIANTE EL ALGORITMO DE BAYES
        public function agregarRuta()
        {
            $algoritmos = new Algortimos();
            //se obtienen los datos 
            $nombre = $_POST['nombre'];
            $latitud = $_POST['latitud'];
            $longitud = $_POST['longitud'];
            $imagen = $_POST['imagen'];
            $precio = $_POST['precio'];
            $tipoTurista = $_POST['tipoTurista'];
            $tipoActividad = $_POST['tipoActividad'];


            //se agrega el atractivo 
            $algoritmos->agregarRuta($nombre,$latitud, $longitud, $imagen, $precio, $tipoTurista, $tipoActividad);
            
            //se asignan los datos a un array
            $datosUsuario = array();
            $datosUsuario['precio'] = $precio;
            $datosUsuario['tipoActividad'] = $tipoActividad;
            $datosUsuario['tipoTurista'] = $tipoTurista;

            //SE OBTIENEN LOS ATRACTIVOS CON BAYES 
            $recomendados = $algoritmos->bayes($datosUsuario);
            

            $_SESSION['ruta'] = $algoritmos->obtenerUltimaRuta();
            
            $data['atractivos'] = $recomendados;

            $this->view->show('agregarAtractivosRuta.php', $data);
        } 
      
        public function actualizarRuta()
        {
            $algoritmos = new Algortimos();
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $tipoTurista = $_POST['tipoTurista'];
            $tipoActividad = $_POST['tipoActividad'];
            $id = $_POST['id'];

            $algoritmos->actualizarRuta($nombre, $precio, $tipoTurista, $tipoActividad, $id);

            $datos['rutas'] = $algoritmos->obtenerTodasLasRutas();
            $datos['actualizar'] = false;
            $this->view->show('actualizarRuta.php', $datos);
        } //actualizarRuta

        //METODO QUE VA ALMACENANDO LOS ATRACTIVOS SELECCIONADOS PARA AGREGAR A LA RUTA
        public function agregarAtractivoRuta()
        {
            $atractivo = $_POST['id'];
            $cont = 0;
            $encontro1 = 0;
    
            $cont = 0;
            foreach ($_SESSION['atractivosRuta'] as $se) {
                if ( $se == $atractivo) {
                    $encontro1 = 1;
                }
                $cont++;
            }
    
            if ($encontro1 == 0 ) {
                $_SESSION['atractivosRuta'][$cont] = $atractivo;
                echo "Atractivo agregado";
            } else {
                echo "Este atractivo ya fue agregado";
            }
        }  
       
        public function registrarAtractivoRuta()
        {
            $algoritmos = new Algortimos();
            
            foreach ($_SESSION['atractivosRuta'] as $at) {
                $algoritmos->registrarAtractivosRuta($at, $_SESSION['ruta'][0]['id']);
            }
    
            unset($_SESSION['atractivosRuta']);
            unset($_SESSION['ruta']);

            echo "<script> alert('Ruta creada correctamente') </script>";

            $this->view->show('menuAdministrativo.php', null);
            
        }  


    }

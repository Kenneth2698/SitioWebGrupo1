    <?php


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
            $this->view->show('actualizarRuta.php', null);
        } //mostrarActualizarRuta

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

            session_start();
            $algoritos = new Algortimos();
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
            $resultado['rutas'] = $algoritos->euclides($datosUsuario);
            $_SESSION['rutas'] = $resultado['rutas'];

            $this->view->show('listaRutas.php',  $resultado);
        } //mostrarListaRutas

        public function mostrarLogin()
        {
            $this->view->show('login.php', null);
        } //mostrarLogin

        public function mostrarResultadoRuta()
        {
            session_start();
            $algoritos = new Algortimos();
            $idRuta = $_GET['idRuta'];

            $datosRuta = $algoritos->obtenerDatosRuta($idRuta);
            $atractivosRuta = $algoritos->obtenerAtractivos($idRuta);
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
            $algoritos = new Algortimos();
            $resultado['atractivos'] = $algoritos->obtenerTodosLosAtractivos();

            $this->view->show('actualizarAtractivo.php', $resultado);
        } //mostrarActualizarAtractivo

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

    }

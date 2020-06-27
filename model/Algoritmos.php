
<?php

//Kenneth Lopez
//Byron Ortiz

class Algortimos
{

    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor


    //---------------------ALGORITMOS----------------------------//
    function euclides($datosUsuario)
    {

        $rutas = $this->obtenerRutas();
        $rutasFiltradas = array(); //Array para cargar las 5 rutas mas parecidas a lo que el usuario ingresó

        //se inicializan varibales con numeros altos para ir bajándolos con las distancias calculadas
        $resultado1 = 100000;
        $resultado2 = 100000;
        $resultado3 = 100000;
        $resultado4 = 100000;
        $resultado5 = 100000;

        //variables para llevar el indice de las rutas
        $Ruta1 = 0;
        $Ruta2 = 0;
        $Ruta3 = 0;
        $Ruta4 = 0;
        $Ruta5 = 0;

        for ($i = 0; $i < count($rutas); $i++) {
            $rutaAux = $rutas[$i]; //Ruta temporal obtenida del índice i

            //se calcula la suma y luego la distancia (Respetando la fórmula)
            $sumatoria = (pow($rutaAux['precio'] - $datosUsuario['precio'], 2)) + (pow($rutaAux['tipoActividad'] - $datosUsuario['tipoActividad'], 2)) + (pow($rutaAux['tipoTurista'] - $datosUsuario['tipoTurista'], 2));
            $distancia = sqrt($sumatoria);


            //Condicionales para ordenarlas de más a menos parecidas
            if ($distancia < $resultado1) {
                $resultado5 = $resultado4;
                $resultado4 = $resultado3;
                $resultado3 = $resultado2;
                $resultado2 = $resultado1;
                $resultado1 = $distancia;

                $Ruta5 = $Ruta4;
                $Ruta4 = $Ruta3;
                $Ruta3 = $Ruta2;
                $Ruta2 = $Ruta1;
                $Ruta1 = $i;
            } else if ($distancia < $resultado2) {
                $resultado5 = $resultado4;
                $resultado4 = $resultado3;
                $resultado3 = $resultado2;
                $resultado2 = $distancia;

                $Ruta5 = $Ruta4;
                $Ruta4 = $Ruta3;
                $Ruta3 = $Ruta2;
                $Ruta2 = $i;
            } else if ($distancia < $resultado3) {
                $resultado5 = $resultado4;
                $resultado4 = $resultado3;
                $resultado3 = $distancia;

                $Ruta5 = $Ruta4;
                $Ruta4 = $Ruta3;
                $Ruta3 = $i;
            } else if ($distancia < $resultado4) {
                $resultado5 = $resultado4;
                $resultado4 = $distancia;

                $Ruta5 = $Ruta4;
                $Ruta4 = $i;
            } else if ($distancia < $resultado5) {
                $resultado5 = $distancia;

                $Ruta5 = $i;
            }
        }

        //se agregan las rutas a la lsita que va a ser retornada a la vista que se le muestra al usuario
        $rutasFiltradas[0] = $rutas[$Ruta1];
        $rutasFiltradas[1] = $rutas[$Ruta2];
        $rutasFiltradas[2] = $rutas[$Ruta3];
        $rutasFiltradas[3] = $rutas[$Ruta4];
        $rutasFiltradas[4] = $rutas[$Ruta5];

        return $rutasFiltradas;
    } //Ecuclides



    public function bayes($datosUsuario)
    {
        
        if (!isset($_SESSION['probabilidadesCategoria'])) {
            $_SESSION['probabilidadesCategoria'] = array();

            $_SESSION['probabilidadesCategoria'] = $this->calcularProbabilidadesCategoria();
            
            $arr = json_encode($_SESSION['probabilidadesCategoria']);
            //echo $arr;

            $fp = fopen('resultados.json', 'w');
            fwrite($fp, $arr);
            fclose($fp);
        }

        $probabilidades = $_SESSION['probabilidadesCategoria'] ;
       
        $precio = $datosUsuario['precio'];
        $tipoActividad = $datosUsuario['tipoActividad'];
        $tipoTurista = $datosUsuario['tipoTurista'];

        $resultado1 = 1;
        $resultado2 = 1;
        $resultado3 = 1;

        //CALCULO DE LA COLUMNA PRECIO PARA CADA RECINTO SEGUN LO SELECCIONADO POR EL USUARIO
        if($precio == '1'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['P1'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['P1'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['P1'];
        }elseif($precio == '2'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['P2'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['P2'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['P2'];
        }elseif($precio == '3'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['P3'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['P3'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['P3'];
        }

        //CALCULO DE LA tipo Actividad SEXO PARA CADA RECINTO SEGUN LO SELECCIONADO POR EL USUARIO
        if($tipoTurista == '1'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['TT1'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['TT1'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['TT1'];
        }elseif($tipoTurista == '2'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['TT2'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['TT2'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['TT2'];
        }elseif($tipoTurista == '3'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['TT3'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['TT3'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['TT3'];
        }

        //CALCULO DE LA COLUMNA PROMEDIO PARA CADA RECINTO SEGUN LO SELECCIONADO POR EL USUARIO
        if($tipoActividad == '1'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['TA1'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['TA1'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['TA1'];
        }elseif($tipoActividad == '2'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['TA2'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['TA2'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['TA2'];
        }elseif($tipoActividad == '3'){
            $resultado1 = $resultado1 * $probabilidades['prob1']['TA3'];
            $resultado2 = $resultado2 * $probabilidades['prob2']['TA3'];
            $resultado3 = $resultado3 * $probabilidades['prob3']['TA3'];
        }

        $resultado1 = $resultado1 * $probabilidades['p1'];
        $resultado2 = $resultado2 * $probabilidades['p2'];
        $resultado3 = $resultado3 * $probabilidades['p3'];

        if($resultado1 > $resultado2 && $resultado1 > $resultado3){
            $categoria = 1;
        }else if($resultado2 > $resultado1 && $resultado2 > $resultado3){
            $categoria = 2;
        }else if($resultado3 > $resultado2 && $resultado3 > $resultado1){
            $categoria = 3;
        }

        $recomendados = $this->obtenerAtractivosRecomendados($categoria); 

        return $recomendados;

    } //bayes


    public function calcularProbabilidadesCategoria(){
        
        $atractivos = $this->obtenerTodosLosAtractivos();

        //calcular el valor de m con las columnas necesarias
        $m = 3;

        //valores de p 
        $pPrecio = 1/3; 
        $pTipoTurista = 1/3;
        $pTipoActividad = 1/3;       

        //Se calculan los valores de n o el numero de apariciones para cada clase
        $n1 = 0;
        $n2 = 0;
        $n3 = 0;
        
        foreach ($atractivos as $atractivo) {
            if($atractivo['categoria'] == '1'){
                $n1++;  
            }else if($atractivo['categoria'] == '2'){
                $n2++;  
            }else {
                $n3++;  
            }
        }


        //calcular las probabilidades de las clases 
        $probabilidades['p1'] = $n1 / sizeof($atractivos);
        $probabilidades['p2'] = $n2 / sizeof($atractivos);
        $probabilidades['p3'] = $n3 / sizeof($atractivos);

        
        //-----------------COL PRECIO-----------------
        $nc['P11'] = 0;
        $nc['P21'] = 0;
        $nc['P31'] = 0;

        $nc['P12'] = 0;
        $nc['P22'] = 0;
        $nc['P32'] = 0;

        $nc['P13'] = 0;
        $nc['P23'] = 0;
        $nc['P33'] = 0;

        foreach ($atractivos as $atractivo) {
            if($atractivo['categoria'] == '1'){
                if($atractivo['precio'] == '1'){
                    $nc['P11']++;
                } else if($atractivo['precio'] == '2'){
                    $nc['P21']++;
                } else if($atractivo['precio'] == '3'){
                    $nc['P31']++;
                }
            }else if($atractivo['categoria'] == '2'){
                if($atractivo['precio'] == '1'){
                    $nc['P12']++;
                } else if($atractivo['precio'] == '2'){
                    $nc['P22']++;
                } else if($atractivo['precio'] == '3'){
                    $nc['P32']++;
                }  
            }else {
                if($atractivo['precio'] == '1'){
                    $nc['P13']++;
                } else if($atractivo['precio'] == '2'){
                    $nc['P23']++;
                } else if($atractivo['precio'] == '3'){
                    $nc['P33']++;
                }
            }
        }

        //-----------------COL TIPO TURISTA-----------------
        //Calcular el numero de repeticiones de cada valor en la columna Estilo para las 2 recintos
        $nc['TT11'] = 0;
        $nc['TT21'] = 0;
        $nc['TT31'] = 0;

        $nc['TT12'] = 0;
        $nc['TT22'] = 0;
        $nc['TT32'] = 0;

        $nc['TT13'] = 0;
        $nc['TT23'] = 0;
        $nc['TT33'] = 0;


        foreach ($atractivos as $atractivo) {
            if($atractivo['categoria'] == '1'){
                if($atractivo['tipoTurista'] == '1'){
                    $nc['TT11']++;
                } else if($atractivo['tipoTurista'] == '2'){
                    $nc['TT21']++;
                } else if($atractivo['tipoTurista'] == '3'){
                    $nc['TT31']++;
                }
            }else if($atractivo['categoria'] == '2'){
                if($atractivo['tipoTurista'] == '1'){
                    $nc['TT12']++;
                } else if($atractivo['tipoTurista'] == '2'){
                    $nc['TT22']++;
                } else if($atractivo['tipoTurista'] == '3'){
                    $nc['TT32']++;
                }  
            }else {
                if($atractivo['tipoTurista'] == '1'){
                    $nc['TT13']++;
                } else if($atractivo['tipoTurista'] == '2'){
                    $nc['TT23']++;
                } else if($atractivo['tipoTurista'] == '3'){
                    $nc['TT33']++;
                }
            }
        }
        
        //-----------------COL TIPO ACTIVIDAD-----------------
        //Calcular el numero de repeticiones de cada valor en la columna Estilo para las 2 recintos
        $nc['TA11'] = 0;
        $nc['TA21'] = 0;
        $nc['TA31'] = 0;

        $nc['TA12'] = 0;
        $nc['TA22'] = 0;
        $nc['TA32'] = 0;

        $nc['TA13'] = 0;
        $nc['TA23'] = 0;
        $nc['TA33'] = 0;


        foreach ($atractivos as $atractivo) {
            if($atractivo['categoria'] == '1'){
                if($atractivo['tipoActividad'] == '1'){
                    $nc['TA11']++;
                } else if($atractivo['tipoActividad'] == '2'){
                    $nc['TA21']++;
                } else if($atractivo['tipoActividad'] == '3'){
                    $nc['TA31']++;
                }
            }else if($atractivo['categoria'] == '2'){
                if($atractivo['tipoActividad'] == '1'){
                    $nc['TA12']++;
                } else if($atractivo['tipoActividad'] == '2'){
                    $nc['TA22']++;
                } else if($atractivo['tipoActividad'] == '3'){
                    $nc['TA32']++;
                }  
            }else {
                if($atractivo['tipoActividad'] == '1'){
                    $nc['TA13']++;
                } else if($atractivo['tipoActividad'] == '2'){
                    $nc['TA23']++;
                } else if($atractivo['tipoActividad'] == '3'){
                    $nc['TA33']++;
                }
            }
        }


        //PROBABILIDADES
        //------------1------------
        
        $prob1['P1'] = (($nc['P11'] + ($m * $pPrecio))/($n1 + $m));
        $prob1['P2'] = (($nc['P21'] + ($m * $pPrecio))/($n1 + $m));
        $prob1['P3'] = (($nc['P31'] + ($m * $pPrecio))/($n1 + $m));

        $prob1['TT1'] = (($nc['TT11'] + ($m * $pTipoTurista))/($n1 + $m));
        $prob1['TT2'] = (($nc['TT21'] + ($m * $pTipoTurista))/($n1 + $m));
        $prob1['TT3'] = (($nc['TT31'] + ($m * $pTipoTurista))/($n1 + $m));

        $prob1['TA1'] = (($nc['TA11'] + ($m * $pTipoActividad))/($n1 + $m));
        $prob1['TA2'] = (($nc['TA21'] + ($m * $pTipoActividad))/($n1 + $m));
        $prob1['TA3'] = (($nc['TA31'] + ($m * $pTipoActividad))/($n1 + $m));

        //------------2------------
        
        $prob2['P1'] = (($nc['P12'] + ($m * $pPrecio))/($n2 + $m));
        $prob2['P2'] = (($nc['P22'] + ($m * $pPrecio))/($n2 + $m));
        $prob2['P3'] = (($nc['P32'] + ($m * $pPrecio))/($n2 + $m));

        $prob2['TT1'] = (($nc['TT12'] + ($m * $pTipoTurista))/($n2 + $m));
        $prob2['TT2'] = (($nc['TT22'] + ($m * $pTipoTurista))/($n2 + $m));
        $prob2['TT3'] = (($nc['TT32'] + ($m * $pTipoTurista))/($n2 + $m));

        $prob2['TA1'] = (($nc['TA12'] + ($m * $pTipoActividad))/($n2 + $m));
        $prob2['TA2'] = (($nc['TA22'] + ($m * $pTipoActividad))/($n2 + $m));
        $prob2['TA3'] = (($nc['TA32'] + ($m * $pTipoActividad))/($n2 + $m));

        //------------1------------
        
        $prob3['P1'] = (($nc['P13'] + ($m * $pPrecio))/($n3 + $m));
        $prob3['P2'] = (($nc['P23'] + ($m * $pPrecio))/($n3 + $m));
        $prob3['P3'] = (($nc['P33'] + ($m * $pPrecio))/($n3 + $m));

        $prob3['TT1'] = (($nc['TT13'] + ($m * $pTipoTurista))/($n3 + $m));
        $prob3['TT2'] = (($nc['TT23'] + ($m * $pTipoTurista))/($n3 + $m));
        $prob3['TT3'] = (($nc['TT33'] + ($m * $pTipoTurista))/($n3 + $m));

        $prob3['TA1'] = (($nc['TA13'] + ($m * $pTipoActividad))/($n3 + $m));
        $prob3['TA2'] = (($nc['TA23'] + ($m * $pTipoActividad))/($n3 + $m));
        $prob3['TA3'] = (($nc['TA33'] + ($m * $pTipoActividad))/($n3 + $m));


        //VECTORES CON TODAS LAS PROBABILIDADES
        $probabilidades['prob1'] = $prob1;
        $probabilidades['prob2'] = $prob2;
        $probabilidades['prob3'] = $prob3;

        return $probabilidades;
        
    }

    //---------------------CONSULTAS A BASE DE DATOS EN MySQL----------------------------//


    public function obtenerAtractivos($idRuta)
    {

        $consulta = $this->db->prepare("SELECT  ra.idRuta,a.nombre,a.descripcion,a.imagen,v.video 
                                        FROM atractivos a
                                        JOIN ruta_atractivos ra
                                        ON a.id = ra.idAtractivo
                                        JOIN video v
                                        ON a.video = v.id
                                        WHERE ra.idRuta = $idRuta;");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    } //obtenerAtractivos


    public function obtenerRutas()
    {

        $consulta = $this->db->prepare("SELECT id, nombre,imagen,precio,tipoTurista,tipoActividad,latitud,longitud 
                                        FROM rutas;");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    } //obtenerRutas

    public function obtenerDatosRuta($idRuta)
    {

        $consulta = $this->db->prepare("SELECT id,nombre,latitud,longitud,precio,tipoTurista,tipoActividad
                                        FROM rutas
                                        WHERE id = $idRuta;");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado[0];
    } //obtenerDatosRuta

    public function obtenerTodosLosAtractivos()
    {
        $consulta = $this->db->prepare("SELECT id,nombre,descripcion,imagen,video,precio,tipoTurista,tipoActividad,categoria
                                        FROM atractivos;");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    public function obtenerAtractivosRecomendados($categoria)
    {
        $consulta = $this->db->prepare("SELECT id,nombre,categoria FROM atractivos WHERE categoria = '$categoria' ORDER BY RAND() limit 40;");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    public function obtenerTodasLasRutas()
    {
        $consulta = $this->db->prepare("SELECT id, nombre 
                                        FROM rutas;");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    } //obtenerTodasLasRutas

    public function obtenerUltimaRuta()
    {
        $consulta = $this->db->prepare("SELECT id from rutas order by id desc limit 1");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    } //


    public function agregarAtractivo($lugar, $descripcion, $imagen, $video, $precio, $tipoTurista, $tipoActividad, $categoria)
    {
        $consulta = $this->db->prepare("INSERT INTO atractivos (`nombre`,`descripcion`,`imagen`,`video`,`precio`,`tipoTurista`,`tipoActividad`,`categoria`) VALUES ('$lugar','$descripcion','$imagen','$video','$precio','$tipoTurista','$tipoActividad','$categoria');");
        $consulta->execute();
        $consulta->closeCursor();
    } //actualizarAtractivo

    
    public function actualizarAtractivo($id, $nombre, $descripcion, $imagen, $video)
    {

        $consulta = $this->db->prepare("UPDATE atractivos
                                        SET nombre = '$nombre',
                                            descripcion = '$descripcion',
                                            imagen = $imagen,
                                            video = $video
                                        WHERE id = $id");
        $consulta->execute();
        $consulta->closeCursor();
    } //actualizarAtractivo

    public function eliminarAtractivo($id)
    {
        $consulta = $this->db->prepare("DELETE FROM atractivos
                                        WHERE id = $id");
        $consulta->execute();
        $consulta->closeCursor();
    } //eliminarAtractivo


    public function agregarRuta($nombre,$latitud, $longitud, $imagen, $precio, $tipoTurista, $tipoActividad)
    {
        $consulta = $this->db->prepare("INSERT INTO rutas (`nombre`,`imagen`,`precio`,`tipoTurista`,`tipoActividad`,`latitud`,`longitud`) VALUES ('$nombre','$imagen','$precio','$tipoTurista','$tipoActividad','$latitud','$longitud');");
        $consulta->execute();
        $consulta->closeCursor();
    } //actualizarAtractivo

    public function registrarAtractivosRuta($idAtractivo,$idRuta)
    {
        $consulta = $this->db->prepare("INSERT INTO ruta_atractivos (`idRuta`,`idAtractivo`) VALUES ('$idRuta','$idAtractivo');");
        $consulta->execute();
        $consulta->closeCursor();
    } //actualizarAtractivo
    
    public function actualizarRuta($nombre, $precio, $tipoTurista, $tipoActividad, $id)
    {

        $consulta = $this->db->prepare("UPDATE rutas
                                        SET nombre = '$nombre',
                                        precio = $precio,
                                        tipoTurista = $tipoTurista,
                                        tipoActividad = $tipoActividad
                                        WHERE id = $id");
        $consulta->execute();
        $consulta->closeCursor();
    } //actualizarRuta
}
?>
  
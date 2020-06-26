
<?php



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
    } //bayes




    //---------------------CONSULTAS A BASE DE DATOS EN MySQL----------------------------//


    public function obtenerAtractivos($idRuta)
    {

        $consulta = $this->db->prepare("SELECT  a.nombre,a.descripcion,a.imagen,v.video 
                                        FROM atractivos a
                                        JOIN video v
                                        ON a.video = v.id
                                        WHERE idRuta = $idRuta;");
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

        $consulta = $this->db->prepare("SELECT nombre,latitud,longitud 
                                        FROM rutas
                                        WHERE id = $idRuta;");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado[0];
    } //obtenerDatosRuta

    public function obtenerTodosLosAtractivos()
    {
        $consulta = $this->db->prepare("SELECT id,nombre,descripcion,imagen,video
                                        FROM atractivos;");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }


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
    }

    public function eliminarAtractivo($id)
    {
        $consulta = $this->db->prepare("DELETE FROM atractivos
                                        WHERE id = $id");
        $consulta->execute();
        $consulta->closeCursor();
    }
}
?>
  
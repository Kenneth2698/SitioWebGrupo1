<?php
//Autor : Kenneth Lopez Porras

class DefaultModel
{

    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor

    public function obtenerAtractivos(){

        $consulta = $this->db->prepare("SELECT id,nombre,descripcion,imagen,video,precio,tipoTurista,tipoActividad,idRuta FROM atractivos;");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        print_r($resultado);
        return $resultado;
    }


}

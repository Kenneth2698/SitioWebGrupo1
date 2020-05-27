       <?php

//Autor : Kenneth Lopez Porras

require 'model/DefaultModel.php';

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
        $datos['tieneRespuesta'] = false;

        $this->view->show('indexView.php', $datos);
    } //accionDefault

    public function mostrarMenuAdmin()
    {
        $this->view->show('menuAdministrativo.php', null);
    }//mostrarMenuAdmin

    public function mostrarActualizarRuta()
    {
        $this->view->show('actualizarRuta.php', null);
    }//mostrarActualizarRuta

    public function mostrarAgregarAtractivo()
    {
        $this->view->show('agregarAtractivo.php', null);
    }//mostrarAgregarAtractivo

    public function mostrarAgregarRuta()
    {
        $this->view->show('agregarRuta.php', null);
    }//mostrarAgregarRuta

    public function mostrarListaRutas()
    {
        $this->view->show('listaRutas.php', null);
    }//mostrarListaRutas

    public function mostrarLogin()
    {
        $this->view->show('login.php', null);
    }//mostrarLogin

    public function mostrarResultadoRuta()
    {
        $this->view->show('resultadoRuta.php', null);
    }//mostrarResultadoRuta
}

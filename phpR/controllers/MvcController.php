<?php
class MvcController
{
    public function plantilla()
    {
        include "views/template.php";
    }

    public function enlacesPaginasContrller()
    {
        if (isset($_GET['action'])) {
            $enlacesController = $_GET['action'];
        } else {
            $enlacesController = "inicio.php";
        }
        $respuesta = EnlacesPaginas::enlacesPaginas($enlacesController);
        include $respuesta;
    }
}

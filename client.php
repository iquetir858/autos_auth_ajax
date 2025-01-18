<?php

class client
{
    //constructor que conecta con el server
    public function __construct()
    {
        $params = array(
            'location' => 'http://localhost/autos_auth_ajax/server.php',
            'uri' => 'http://localhost/autos_auth_ajax/server.php',
            'trace' => 1
        );

        $this->instance = new SoapClient(NULL, $params);

        //Establecer las cabeceras

    }

    /* Funciones a crear
    ObtenerMarcas(?)
    ObtenerMarcasUrl()
    ObtenerModelosPorMarca($marca)
    */
}
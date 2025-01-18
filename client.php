<?php
include 'db_pass.php';
class Client
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

        //Establecer las cabeceras --> Datos de autenticación en el db_pass.php (.gitignore)
        $auth_params = new stdClass();
        $auth_params->username = $dbUser;
        $auth_params->password = $dbPassword;

        $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);
        $header = new SoapHeader('http://localhost/autos_auth_ajax/', 'authenticate', $header_params, false);
        $this->instance->__setSoapHeaders(array($header));

    }

    /**
     * Función que devuelve las marcas-url de la llamada al servidor
     * @return void
     */
    public function ObtenerMarcasUrl()
    {
        $this->instance->ObtenerMarcasUrl();
    }

    /**
     * Función que devuelve las modelos de cada marca de la llamada al servidor
     * @param mixed $marca (string)
     * @return void
     */
    public function ObtenerModelosPorMarca($marca)
    {
        $this->instance->ObtenerModelosPorMarca($marca);

    }
}

//Creamos el objeto cliente que será usado en el index.php
$client = new Client();
?>
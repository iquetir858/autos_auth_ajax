<?php
require_once 'db_pass.php';
class Client
{
    private $instance;
    //constructor que conecta con el server
    public function __construct()
    {
        $params = array(
            'location' => 'http://inma.great-site.net/autos_auth_ajax/server.php',
            'uri' => 'http://inma.great-site.net/autos_auth_ajax/server.php',
            'trace' => 1,
            'exceptions' => true,
            'encoding' => 'ISO-8859-1'
        );

        $this->instance = new SoapClient(null, $params);

        //Establecer las cabeceras --> Datos de autenticación en el db_pass.php (.gitignore)
        $auth_params = new stdClass();
        $auth_params->username = 'inma';
        $auth_params->password = 'daw';

        $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);
        $header = new SoapHeader('http://inma.great-site.net/autos_auth_ajax/', 'authenticate', $header_params, false);
        $this->instance->__setSoapHeaders(array($header));

    }

    /**
     * Función que devuelve las marcas-url de la llamada al servidor
     * @return mixed
     */
    public function ObtenerMarcasUrl()
    {
        return $this->instance->ObtenerMarcasUrl();
    }

    /**
     * Función que devuelve las modelos de cada marca de la llamada al servidor
     * @param mixed $marca (string)
     * @return mixed
     */
    public function ObtenerModelosPorMarca($marca)
    {
        //return $this->instance->__soapCall('ObtenerModelosPorMarca', array($marca));
        return $this->instance->ObtenerModelosPorMarca($marca);
    }
}

//Creamos el objeto cliente que será usado en el index.php
$client = new Client();
?>
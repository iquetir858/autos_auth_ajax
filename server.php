<?php
include 'db_pass.php';
class Server
{
    //Función de conexión 
    //funciones de acceso a la base de datos

    private $connection;
    private $IsAuthenticated;

    /**
     * Constructor: realiza la conexión o emplea la misma si ya existe (modelo Singleton)
     */
    public function __construct()
    {
        $this->connection = (is_null($this->connection)) ? self::connect() : $this->connection;
    }

    /**
     * Función que lleva a cabo la conexión a la base de datos(?)
     * @return void
     */
    public function connect()
    {
        try {
            $dbHost = 'localhost';
            $dbName = 'coches';
            $connection = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName . ";", $dbUser, $dbPassword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            print "<p>Error: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public function authenticate($header_params)
    {
        if ($header_params->username == 'ies' && $header_params->password == 'daw') {
            $this->IsAuthenticated = true;
            return true;
        } else {
            throw new SoapFault('Wrong user/pass combination', 401);
        }
    }

    public function ObtenerMarcasUrl()
    {
        //Si no se establece la conexión o no está autenticado --> Error
        if (is_null($this->con))
            return "ERROR";
        if (!$this->IsAuthenticated)
            return "Not Authenticated";

        //Hacemos la petición de las marcas y url a la base de datos
        $sql = "SELECT marca, url from marcas";
        $data = $this->connection->query($sql);
        return array();
    }

} //Final de la clase


$params = array('uri' => 'http://localhost/autos_auth_ajax/server.php');
$server = new SoapServer(null, $params);
$server->setClass('Server');
$server->handle();
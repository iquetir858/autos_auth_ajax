<?php
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
     * @return PDO | null
     */
    public function connect()
    {
        try {
            require_once 'db_pass.php';
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

    /**
     * Función para comprobar si está autenticado
     * @param mixed $header_params
     * @throws \SoapFault
     * @return bool
     */
    public function authenticate($header_params)
    {
        if ($header_params->username == 'inma' && $header_params->password == 'daw') {
            $this->IsAuthenticated = true;
            return true;
        } else {
            throw new SoapFault('Wrong user/pass combination', 401);
        }
    }

    /**
     * Función que accede a la base de datos y obtiene las marcas y las url de cada una de ellas
     * @return array|string
     */
    public function ObtenerMarcasUrl()
    {
        //Si no se establece la conexión o no está autenticado --> Error
        if (is_null($this->connection))
            return "ERROR";
        if (!$this->IsAuthenticated)
            return "Not Authenticated";

        //Hacemos la petición de las marcas y url a la base de datos
        $sql = "SELECT marca, url FROM marcas";
        $data = $this->connection->query($sql);
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Función que obtiene el listado de modelos de una marca
     * @param mixed $marca
     * @return array|string
     */
    public function ObtenerModelosPorMarca($marca)
    {
        //Si no se establece la conexión o no está autenticado --> Error
        if (is_null($this->connection))
            return "ERROR";
        if (!$this->IsAuthenticated)
            return "Not Authenticated";

        //Hacemos la petición de las marcas y url a la base de datos
        $marca = htmlentities($marca);
        $sql = "SELECT modelo FROM modelos WHERE marca=(SELECT id FROM marcas WHERE marca= :marca)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":marca", $marca);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

} //Final de la clase


$params = array('uri' => 'http://localhost/autos_auth_ajax/server.php');
$server = new SoapServer(null, $params);
$server->setClass('Server');
$server->handle();
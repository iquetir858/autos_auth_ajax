<?php
include 'db_pass.php';
class Server
{
    //Función de conexión 
    //funciones de acceso a la base de datos

    private $connection;

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
        //$this->connection=mysql_connect('localhost', $dbUser, $dbPassword);
        try {
            $dbname='coches';
            $this->connection = new PDO("mysql:host=localhost;port=3306;dbname=$dbname", $dbUser, $dbPassword);
            //echo "<p>YOU HAVE CONNECTED TO THE MySQL SERVER.</p>\n";
        
        } catch (PDOException $e) {  // If there are connection errors, an object of type PDOException is caught
            print "<p>Error: COULD NOT CONNECT TO THE MySQL SERVER.</p>\n";
            print "<p>Error: " . $e->getMessage() . "</p>\n";  // exception message
            exit();
        }
    }
}
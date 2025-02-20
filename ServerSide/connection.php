<?php

require "../vendor/autoload.php";

class Connection {

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
       
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);


        // Check for database connection
        if ($this->conn->connect_error) {
            exit("A system error occurred. Please try again later.");
        }

        return $this->conn;
    }
}

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Validate environment variables
if (!isset($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME'])) {
    exit("Configuration error. Please contact support.");
}

// Retrieve credentials from environment variables
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Connect to database
$connection = new Connection($host, $username, $password, $dbname);
$conn = $connection->connect();
?>

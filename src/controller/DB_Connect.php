<?php
namespace MyApp\controller;
use mysqli;
class DB_Connect {
    private $conn;

    public function __construct($servername, $username, $password, $database) {
        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        // Select the database
        if (!mysqli_select_db($this->conn, $database)) {
            die("Database selection failed: " . mysqli_error($this->conn));
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}

// Usage example:
$servername = "db";
$username = "php_docker";
$password = "password";
$database = "php_docker";

$dbConnect = new DB_Connect($servername, $username, $password, $database);

// Now, you can use $dbConnect->getConnection() to get the connection object
// ...

// Optionally, close the connection when done
// $dbConnect->closeConnection();
?>

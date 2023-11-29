<?php
// DBConnectTests.php
namespace tests;

use PHPUnit\Framework\TestCase;
use MyApp\controller\DB_Connect;

class DBConnectTests extends TestCase
{
    public function testConnection()
    {
        $servername = "db";
        $username = "php_docker";
        $password = "password";
        $database = "php_docker";

        // Create an instance of the DB_Connect class
        $dbConnect = new DB_Connect($servername, $username, $password, $database);

        // Call the getConnection method and check if it returns a valid connection object
        $connection = $dbConnect->getConnection();

        // Assert that the connection object is an instance of mysqli
        $this->assertInstanceOf(\mysqli::class, $connection, 'Database connection failed.');

        // Optionally, close the connection when done
        $dbConnect->closeConnection();
    }
}

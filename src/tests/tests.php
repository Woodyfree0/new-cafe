<?php
namespace tests;
require_once 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use MyApp\controller\router;
use MyApp\controller\controller;
use Myapp\controller\DB_Connect;
class RouterTests extends TestCase
{
    private $router;
    private $dbmock; // Corrected property name

    protected function setUp(): void
    {
        $this->dbmock = $this->createMock(controller::class); // Corrected mock initialization
        // Create an instance of the Router class
        $this->router = new Router($this->dbmock);
    }

    public function testUrlIsWithMatchingValue()
    {
        // Set the expected value
        $expectedValue = '/example';

        // Set the REQUEST_URI to the expected value
        $_SERVER['REQUEST_URI'] = $expectedValue;

        // Call the urlIs method and check if it returns true
        $result = $this->router->urlIs($expectedValue);

        // Assert that the result is true
        $this->assertTrue($result);
    }

    public function testUrlIsWithNonMatchingValue()
    {
        // Set a non-matching value
        $nonMatchingValue = '/other';

        // Set the REQUEST_URI to a different value
        $_SERVER['REQUEST_URI'] = '/example';

        // Call the urlIs method and check if it returns false
        $result = $this->router->urlIs($nonMatchingValue);

        // Assert that the result is false
        $this->assertFalse($result);
    }
}
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


<? 
require ('narbar.php');
require ('routes.php');
require ('footer.php');
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase {
    public function testDatabaseConnection() {
        $conn = new mysqli("db", "php_docker", "password", "php_docker");
        $this->assertInstanceOf(mysqli::class, $conn, "Failed to establish a database connection.");
    }
}
class RouteHandlingTest extends TestCase {
    public function testValidRoutes() {
        $router = new Router(); // Assuming you have a Router class
        $validRoutes = ['/menu', '/login', '/index', '/bookings', '/make_reservation'];
        
        foreach ($validRoutes as $route) {
            $this->assertNull($router->handleRoute($route), "Failed to handle a valid route: $route");
        }
    }
    
    public function testInvalidRoutes() {
        $router = new Router(); // Assuming you have a Router class
        $invalidRoutes = ['/invalid', '/nonexistent'];
        
        foreach ($invalidRoutes as $route) {
            $this->expectOutputString('404 - Not Found');
            $router->handleRoute($route);
        }
    }
}
class ControllerLogicTest extends TestCase {
    public function testCreateAction() {
        $con = $this->createMock(MyApp\controller\controller::class);
        
        $data = [
            'Date' => '2023-01-01',
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'StaffID' => 123
        ];
        
        $con->expects($this->once())->method('create')->with($data);
        
        $router = new Router(); // Assuming you have a Router class
        $router->handleRoute('/create');
    }
}


<?php
namespace tests;
require_once 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use MyApp\model\router;
use MyApp\controller\controller;

class RouterTests extends TestCase
{
    public function testRoutesExistence()
    {
        
        // Define your routes
        $existingRoutes = [
            '/' => function () {},
            '/delete' => function () {},
            '/update' => function () {},
            '/create' => function () {},
            '/menu' => function () {},
            '/login' => function () {},
            '/index' => function () {},
            '/bookings' => function () {},
            '/make_reservation' => function () {},
            '/rota' => function () {},
            '/order' => function () {},
            '/confirm' => function () {},
        ];

        

        // Access the routes property

        foreach ($existingRoutes as $route) {
            $this->assertSame($route, "Route does not exist");
        }
    }


    private $router;
    private $dbMock;

    protected function setUp(): void
    {
        // Create a mock for the Controller class
        $this->dbMock = $this->createMock(Controller::class);

        // Pass the mock as an argument to the Router constructor
        $this->router = new Router($this->dbMock);
    }

    public function testRunDelete()
    {
        $_SERVER['REQUEST_URI'] = '/delete?id=123';

        $this->dbMock->expects($this->once())
            ->method('delete')
            ->with(123);

        $this->router->run();

        // Additional assertions if needed
    }

    public function testRunUpdate()
    {
        $_SERVER['REQUEST_URI'] = '/update?id=456';

        $this->dbMock->expects($this->once())
            ->method('update')
            ->with(456, [
                'Date' => '2000-01-01',
                'FirstName' => 'Sam',
                'LastName' => 'Wood',
                'StaffID' => 104
            ]);

        $this->router->run();

        // Additional assertions if needed
    }

    public function testRunCreate()
    {
        $_SERVER['REQUEST_URI'] = '/create';
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $_POST = [
            'Date' => '2023-01-01',
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'StaffID' => 101
        ];

        $this->dbMock->expects($this->once())
            ->method('create')
            ->with([
                'Date' => '2023-01-01',
                'FirstName' => 'John',
                'LastName' => 'Doe',
                'StaffID' => 101
            ]);

        $this->router->run();

        // Additional assertions if needed
    }
}
    

//     public function testRouterForValidUrl()
//     {
//         $router = new Router();

//         // Assuming $routes is an array property in the Router class
//         $router->setRoutes([
//             new routes("home", "index", "GET"),
//             new routes("auth", "create", "POST"),
//         ]);

//         // Access the routes property
//         $existingRoutes = $router->getRoutes();

//         foreach ($existingRoutes as $route) {
//             $callback = $router->getActionCallable($route);
//             $this->assertNotSame(null, $callback, "Route " . $route . " should not be null");
//         }
//     }
// }

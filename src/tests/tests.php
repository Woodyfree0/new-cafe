<?php

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use MyApp\model\router;

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

        // Create an instance of the Router class with the routes
        $router = new Router();

        // Access the routes property

        foreach ($existingRoutes as $route) {
            $this->assertSame($route, "Route does not exist");
        }
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

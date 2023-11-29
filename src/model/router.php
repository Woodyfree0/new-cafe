<?php
namespace MyApp\model;
use MyApp\controller\controller;
require_once 'vendor/autoload.php';

class router
{
    private $db;

    public function __construct(controller $db)
    {
        require 'DB_Connect.php'; // Ensure this file establishes a valid database connection
        $this->db = new $db($conn);
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

        $routes = [
            '/delete' => function () {
                $id = $_GET['id'];
                $this->db->delete($id);
            },
            '/update' => function () {
                $id = $_GET['id'];
                $data = [
                    'Date' => '2000-01-01',
                    'FirstName' => 'Sam',
                    'LastName' => 'Wood',
                    'StaffID' => 104
                ];
                $this->db->update($id, $data);
            },
            '/create' => function () {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = [
                        'Date' => $_POST['Date'],
                        'FirstName' => $_POST['FirstName'],
                        'LastName' => $_POST['LastName'],
                        'StaffID' => $_POST['StaffID']
                    ];
                    $this->db->create($data);
                }
            },
            '/menu' => function () {
                require 'menu.php';
                exit();
            },
            '/login' => function () {
                require 'login.php';
                exit();
            },
            '/index' => function () {
                require 'index.php';
                exit();
            },
            '/bookings' => function () {
                require 'bookings.php';
                exit();
            },
            '/make_reservation' => function () {
                require 'make_reservation.php';
                exit();
            },
            '/rota' => function () {
                require 'rota.php';
                exit();
            },
            '/order' => function () {
                require 'ordering.php';
                exit;
            },
            '/confirm' => function () {
                require 'confirmation.php';
                exit();
            },
        ];

        if (array_key_exists($uri, $routes)) {
            $controllerFunction = $routes[$uri];
            call_user_func($controllerFunction);
        } else {
            // Handle 404 or other error
            echo "404 - Not Found";
        }
    }

    public function urlIs($value)
    {
        var_dump($_SERVER['REQUEST_URI']);
        return $_SERVER['REQUEST_URI'] === $value;
    }
}

// Create an instance of the Router class and run it
$router = new Router($db);
$router->run();

<?php
 require 'DB_Connect.php'; // Ensure this file establishes a valid database connection
 require_once 'vendor/autoload.php'; 
 use MyApp\controller\controller;
 ini_set('memory_limit', '256M');
//  if (!function_exists('dd')) {
//   // Define dd() function only if it doesn't exist
//   function dd($data) {
//       echo '<pre>';
//       var_dump($data);
//       echo '</pre>';
//       die();
//   }
// }
 

if ( !function_exists('urlIs')) {
  function urlIs($value){
  var_dump($_SERVER['REQUEST_URI']);
  return $_SERVER['REQUEST_URI'] === $value;
}
}
  //  $conn = new mysqli(
  //       $servername = "db",
  //       $username = "php_docker",
  //       $password = "password",
  //       $database = "php_docker");
        
   // Define your routes
   $router = function() use ($conn) {
       $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
       $con = new MyApp\controller\controller($conn);
       $routes = [
           '/delete' => function () use ($con, $conn) {
               $id = $_GET['id'];
               $con->delete($id);
           },
           '/update' => function () use ($con, $conn){
            $id = $_GET['id'];
            $data = [
              'Date' => '2000-01-01',
              'FirstName' => 'Sam',
              'LastName' => 'Wood',
              'StaffID' => 101
            ];
            $con->update($id, $data);
           },
           '/create' =>  function () use($con, $conn){ 
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            
            $data =[ 'Date' => $_POST['Date'],
            'FirstName' => $_POST['FirstName'],
            'LastName' => $_POST['LastName'],
            'StaffID' => $_POST['StaffID']
          ];
            $con->create($data);
        }



          },
          '/menu' => function(){
            require 'menu.php';
            exit();
          },    
          '/login' => function(){
            require 'login.php';
            exit();
          } ,
          '/index' => function(){
            require 'index.php';
            exit();
          }    ,
          '/bookings' => function(){
            require 'bookings.php';
            exit();
          },
          '/make_reservation' => function(){
            require 'make_reservation.php';
            exit();
          },
          '/rota' => function(){
            require 'rota.php';
            exit();
          },
          
            
          
       ];
   
       if (array_key_exists($uri, $routes)) {
          $action =  $routes[$uri];
          $action();
          $controllerFunction = $routes[$uri];
          call_user_func($controllerFunction);
       } else {
           // Handle 404 or other error
           echo "404 - Not Found";
       }
   };
   
   // Execute the router
   $router();
   mysqli_close($conn);
  ?>
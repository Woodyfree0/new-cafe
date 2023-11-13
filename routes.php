<?php
function dd($value){
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

function urlIs($value){
  var_dump($_SERVER['REQUEST_URI']);
  return $_SERVER['REQUEST_URI'] === $value;
}
function routes(){


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$con = new MyApp\controller\controller(new mysqli());
$routes = [
    '/delete' => [ $con, "delete" ],
    '/update' => [ $con, "update" ],
    '/create' => [ $con, "create" ],
];

if (array_key_exists($uri, $routes)){
    $controllerFunction = $routes[$uri];
    call_user_func($controllerFunction);
} else {
    // Handle 404 or other error
    echo "404 - Not Found";
}}

<? 
// if (isset($_GET['uri'])) {
//   $uri = rtrim($_GET['uri'], '/');
//   $parts = explode('/', $uri);

//   if (count($parts) >= 2) {
//       $table = $parts[1];
//       $action = isset($parts[2]) ? $parts[2] : 'read';

//       $controllerClass = $table . 'Controller'; // Assume the class name is already correctly capitalized

//       if (class_exists($controllerClass)) {
//           $controller = new $controllerClass;

//           if (method_exists($controller, $action)) {
//               $controller->$action();
//           } else {
//               echo 'Invalid action';
//           }
//       } else {
//           echo 'Controller class does not exist';
//       }
//   } else {
//       echo 'Invalid URL';
//   }
// }

$uri = $_SERVER['REQUEST_URI'];
  $routes = [
    '/delete' => 'src/view/delete.php',
    '/update' => 'src/view/update.php',
    '/create' => 'create.php'];

    if (array_key_exists($uri, $routes)){
      require $routes[$uri];}

      ?>
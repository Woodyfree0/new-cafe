<? 
function dd($value){
  echo "<pre>";
  var_dump($value);
  echo "</pre>";

  die();
}

function urlIs($value){
  return $_SERVER['REQUEST_URI'] === $value;
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
  $routes = [
    '/delete' => 'src/view/delete.php',
    '/update' => 'src/view/update.php',
    '/create' => 'src/view/create.php'];

    if (array_key_exists($uri, $routes)){
      require $routes[$uri];}

      ?>
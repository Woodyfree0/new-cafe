<? if (session_status() == PHP_SESSION_NONE) {
    session_start();}; ?>
    <? require ('navbar.php'); ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    
    <title>Oranage Team Cafe Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">  
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="navbar-fixed.css" rel = "stylesheet">
    <link href="styles.css" rel="stylesheet">
  </head>
    <h1>Roster Entries</h1>
<?
// Require necessary files and initialize objects
require 'vendor/autoload.php';
include('DB_Connect.php');
$model = new MyApp\model\model($conn); 
$controller = new MyApp\controller\controller($conn);
 // Retrieve data using the controller
$data = $controller -> read();
// Close the database connection
mysqli_close($conn);


?>
<? require ('footer.php'); ?>
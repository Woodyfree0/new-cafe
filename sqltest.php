<?php

$servername = "db";
$username = "php_docker";
$password = "password";
$database = "php_docker";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{
    echo("this worked");
}
?>

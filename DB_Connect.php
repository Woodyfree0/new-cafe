<?php

// Database connection settings
$servername = "db";
$username = "php_docker";
$password = "password";
$database = "php_docker";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the database
if (!mysqli_select_db($conn, $database)) {
    die("Database selection failed: " . mysqli_error($conn));
}
// Close the connection properly when done with it
if (!function_exists('closeConnection')) {
    function closeConnection($conn) {
        if ($conn) {
            mysqli_close($conn);
        }
    }
}
?>
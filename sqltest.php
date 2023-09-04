<?php
$serverName = "localhost"; // Replace with your SQL Server hostname or IP address
$databaseName = "cafe"; // Replace with your database name
$username = "root"; // Replace with your SQL Server username
$password = "password"; // Replace with your SQL Server password

try {
    $dsn = "odbc:Driver={SQL Server};Server=$serverName;Database=$databaseName;";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to SQL Server successfully!";
    
    // You can perform database operations here
    
    // Don't forget to close the connection when done
    $conn = null;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

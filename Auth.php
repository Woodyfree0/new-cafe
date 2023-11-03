<?php
session_start();
include('DB_Connect.php');


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with SQL query to check user credentials
    $sql = "SELECT * FROM Staff WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        // Authentication successful
        $_SESSION['username'] = $username;
        header("Location: rota.php"); // Redirect to the dashboard or authorized page
        exit();
    } else {
        echo "Authentication failed. Invalid username or password.";
        // Authentication failed
        $_SESSION['login_status'] = 'Login failed, try again.';
        $error = "Invalid username or password.";
    }

    mysqli_close($conn);
}
?>

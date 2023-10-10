<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo 'Welcome, ' . $username;
} else {
    // If the "username" session variable is not set, it means the user is not logged in.
    echo 'Welcome, Guest'; 
}
?>

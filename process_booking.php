<?
session_start();
include('DB_Connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['clear_available_tables'])) {
        // Handle the "Clear Values" action
        unset($_SESSION['available_tables']);
        unset($_SESSION['selected_date']);
        unset($_SESSION['selected_time']);
        
        // Redirect to the bookings.php page or perform any other necessary actions
        header("Location: bookings.php");
        exit();
    } elseif (isset($_POST['selected_date']) && isset($_POST['selected_time'])) {
        $selected_date = $_POST['selected_date'];
        $selected_time = $_POST['selected_time'];

        $sql = "SELECT * FROM tables WHERE status = 'available' AND time_slot = '$selected_time'";
        $result = $conn->query($sql);
        $available_tables = [];

        if ($result->num_rows > 0) {
            // Store available tables in the session variable
            while ($row = $result->fetch_assoc()) {
                $available_tables[] = $row;
            }

            $_SESSION['available_tables'] = $available_tables;
            $_SESSION['selected_date'] = $selected_date;
            $_SESSION['selected_time'] = $selected_time;
        }
    }
}

header("Location: /bookings");
exit();
?>
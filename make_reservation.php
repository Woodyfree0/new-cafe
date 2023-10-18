<? session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Make a Reservation</title>
</head>
<body>
    <h1>Make a Reservation</h1>

    <?php
    echo '<pre>';
    print_r($_GET); // or use var_dump($_GET);
    echo '</pre>';
    // Check if a table was selected for reservation
    if (isset($_GET['table_id']) && is_numeric($_GET['table_id'])) {
        // The table_id is set and is a numeric value.
        $table_id = $_GET['table_id'];
        $selected_date = $_GET['selected_date'];
        $selected_time = $_GET['selected_time'];
        

        echo '<p> You are reserving Table #' . $table_id. '</p>';
        echo '<p> For the date of : ' . $selected_date . '</p>';
        echo '<p> At the time of : ' . $selected_time . '</p>';

        echo '<p> Please input your Name, number of guests, and a phone number for the booking: ' . '</p>';
        echo '<label for="Name">Name for booking :</label>';
        echo '<input type="string" name="Name" required><br>';

        echo '<label for="Guests">Number of guests :</label>';
        echo '<input type="string" name="Guests" required><br>';

        echo '<label for="phone">Phone number :</label>';
        echo '<input type="string" name="Phone" required><br>';

        echo '<p> Once you have entered all of your details, please click "confirm" to complete your booking. '. '</p>';
        echo '<input type="submit" value="Confirm Reservation">';
            echo '</form>';
        // Now, you can use $table_id for further processing, such as checking against your database.
    } else {
        // The table_id is either not set or not a valid numeric value.
        // You can handle this case by displaying an error message or redirecting the user.
        echo "Invalid or missing table selection.";
        // Or, you can redirect the user to a different page:
        // header("Location: some_error_page.php");
        // exit();
    }
?>
    <a href="bookings.php">Back to Bookings</a>
</body>
</html>


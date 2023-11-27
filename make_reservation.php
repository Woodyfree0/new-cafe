<? if (session_status() == PHP_SESSION_NONE) {
  session_start();} ?>
<? require ('navbar.php'); ?>
    <b1> Booking details: </b1> 
    <?php
    // Check if a table was selected for reservation
    if (isset($_GET['table_id']) && is_numeric($_GET['table_id'])) {
        // The table_id is set and is a numeric value.
        $table_id = $_GET['table_id'];
        $selected_date = $_GET['selected_date'];
        $selected_time = $_GET['selected_time'];
        // echo '<p> You are reserving Table #' . $table_id. '</p>';
        // echo '<p> For the date of : ' . $selected_date . '</p>';
        // echo '<p> At the time of : ' . $selected_time . '</p>';

        // echo '<p> Please input your Name, number of guests, and a phone number for the booking: ' . '</p>';
        // echo '<label for="Name">Name for booking :</label>';
        // echo '<input type="string" name="Name" required><br>';

        // echo '<label for="Guests">Number of guests :</label>';
        // echo '<input type="string" name="Guests" required><br>';

        // echo '<label for="phone">Phone number : </label>';
        // echo '<input type="string" name="Phone" required><br>';

        // echo '<p> Once you have entered all of your details, please click "confirm" to complete your booking. '. '</p>';
        // echo '<button type="submit">Confirm</button>';

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
    <a href="/bookings">Back to Bookings</a>
    <form action="/confirm" method="post">
        <input type="hidden" name="table_id" value="<?php echo $table_id; ?>">
        <input type="hidden" name="selected_date" value="<?php echo $selected_date; ?>">
        <input type="hidden" name="selected_time" value="<?php echo $selected_time; ?>">  

        <p>You are reserving Table #<?php echo $table_id; ?></p>
        <p>For the date of: <?php echo $selected_date; ?></p>
        <p>At the time of: <?php echo $selected_time; ?></p>

        <p>Please input your Name, number of guests, and a phone number for the booking:</p>
        <label for="Name">Name for booking:</label>
        <input type="text" name="Name" required><br>

        <label for="Guests">Number of guests:</label>
        <input type="text" name="Guests" required><br>

        <label for="phone">Phone number:</label>
        <input type="text" name="Phone" required><br>

        <p>Once you have entered all of your details, please click "Confirm" to complete your booking.</p>
        <button type="submit">Confirm</button>

  </form>
    



<? require ('footer.php'); ?>

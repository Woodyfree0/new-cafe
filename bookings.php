<? if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<? require ('navbar.php'); ?>
   
<body>
    <h1>Table Booking</h1>

    <form action="process_booking.php" method="POST">
        <label for="selected_date">Select Date:</label>
        <input type="date" name="selected_date" required>

        <label for="selected_time">Select Time:</label>
        <select name="selected_time" required>
            <option value="12:00 PM">12:00 PM</option>
            <option value="1:00 PM">1:00 PM</option>
            <option value="2:00 PM">2:00 PM</option>
            <option value="3:00 PM">3:00 PM</option>
            <option value="4:00 PM">4:00 PM</option>
            <option value="5:00 PM">5:00 PM</option>
            <option value="18:00:00"  >6:00 PM</option>
            <option value="7:00 PM">7:00 PM</option> 
        </select>
        <input type="submit" value="Check Availability">
    </form>
    <form action="process_booking.php" method="POST">
    <input type="submit" name="clear_available_tables" value="Clear Available Tables">
</form>

    <h2>Available Tables:</h2>
    <?php
if (isset($_SESSION['available_tables']) && !empty($_SESSION['available_tables'])) {
  $available_tables = $_SESSION['available_tables'];
  $selected_date = $_SESSION['selected_date'];
  $selected_time = $_SESSION['selected_time'];

  foreach ($available_tables as $table) {
      echo "Table #" . $table["table_number"] . " (Capacity: " . $table["capacity"] . ") " . "Time available: " . $table["time_slot"] .  " Date selected: " . $selected_date;
      // Add a form for reservation with table_id, selected_date, and selected_time
      echo "<form action='make_reservation.php' method='POST'>";
      echo "<input type='hidden' name='table_id' value='" . $table["table_id"] . "'>";
      echo "<input type='hidden' name='selected_date' value='$selected_date'>";
      echo "<input type='hidden' name='selected_time' value='$selected_time'>";
      echo '<button type="submit">';
      echo '<a href="/make_reservation?table_id=' . $table["table_id"] . '&selected_date=' . $selected_date . '&selected_time=' . $selected_time . '">Reserve</a>';
      echo '</button>';
      echo '</form>';
  }
} else {
  echo "No available tables for the selected time slot.";
}
?>
<? require ('footer.php'); ?>

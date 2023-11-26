<?if (session_status() == PHP_SESSION_NONE) {
    session_start();};
     require ('navbar.php');
     ?>
<?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_id = $_POST['table_id'];
    $name = $_POST['Name'];
    $guests = $_POST['Guests'];
    $phone = $_POST['Phone'];
    $selected_date = $_POST['selected_date'];
    $selected_time = $_POST['selected_time'];
    // You can perform further processing here, such as saving the reservation details to a database.

    // Display a confirmation message with the submitted data:
    echo "<h1>Reservation Confirmation</h1>";
    echo "<p>You have successfully reserved Table #$table_id for the date of: $selected_date and time $selected_time.</p>";
    echo "<p>Name: $name</p>";
    echo "<p>Number of guests: $guests</p>";
    echo "<p>Phone number: $phone</p>";

} else {
    // Handle the case when the form is not submitted.
    echo "Form submission error.";
}
?>
<? require ('footer.php');
?>
    
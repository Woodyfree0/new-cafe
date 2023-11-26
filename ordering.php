<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require('navbar.php');
require('DB_Connect.php');

function insertSelectedItems($conn, $selectedItems)
{
    foreach ($selectedItems as $selectedItemID) {
        $insertQuery = "INSERT INTO OrderHistory (ItemID, Quantity) VALUES ($selectedItemID, 1)";
        $conn->query($insertQuery);
    }
}
function clearSelectedItems()
{
    unset($_SESSION['selected_items']);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form data is set
    if (isset($_POST['selected_items']) && is_array($_POST['selected_items'])) {
        // Get the selected items from the form data
        $selectedItems = $_POST['selected_items'];

        // Store the selected items in the session
        $_SESSION['selected_items'] = $selectedItems;

        insertSelectedItems($conn, $selectedItems);
    }
}

?>
<link href="styles.css" rel="stylesheet">
<!-- menu container -->
<form method="POST" action="">
    <?php
    $sql = "SELECT * FROM Menu_items";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div class='menu-item'>";
            echo "<div class='item-name'>" . $row["Name"] . "</div>";
            echo "<div class='item-description'>" . $row["Desc"] . "</div>";
            echo "<div class='item-price'>$" . $row["Price"] . "</div>";

            // Add a button to select the item
            echo "<div class='item-action'>";
            echo "<input type='checkbox' name='selected_items[]' value='" . $row["item_id"] . "'> Select";
            echo "</div>";

            echo "</div>";
        }
    } else {
        echo "No menu items found.";
    }
    ?>
   <button type="submit" name="save_selected_items">Submit Order</button>
    <button type="submit" name="clear_selected_items">Clear Selected Options</button>
</form>
<!-- Display selected items and total price -->
<?php
if (isset($_SESSION['selected_items']) && is_array($_SESSION['selected_items'])) {
    echo "<h2>Selected Items:</h2>";
    echo "<ul>";
    
    $totalPrice = 0;

    foreach ($_SESSION['selected_items'] as $selectedItemID) {
        // Fetch the selected item from the database
        $selectedItemQuery = "SELECT Name, Price FROM Menu_items WHERE item_id = $selectedItemID";
        $selectedItemResult = $conn->query($selectedItemQuery);

        if ($selectedItemResult->num_rows > 0) {
            $selectedItem = $selectedItemResult->fetch_assoc();
            echo "<li>" . $selectedItem['Name'] . " - $" . $selectedItem['Price'] . "</li>";

            // Add the price to the total
            $totalPrice += $selectedItem['Price'];
        }
    }

    echo "</ul>";

    echo "<h2>Total Price: $" . $totalPrice . "</h2>";
  }
  
// Check if the "Save Selected Items" button is clicked
    if (isset($_POST['save_selected_items'])) {
    // Insert selected items into the 'OrderHistory' table
    insertSelectedItems($conn, $_SESSION['selected_items']);
    echo ('your order has successfully place!');
}
if (isset($_POST['clear_selected_items'])) {
  // Clear selected items from the session
  clearSelectedItems();
  echo 'options cleared';
}
?>
    

<? require('footer.php'); ?>

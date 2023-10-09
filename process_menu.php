<?php
include('DB_Connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form input
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // If an item ID is provided, it's an edit operation
    if (isset($_POST['edit'])) {
        $item_id = $_POST['item_id'];
        $sql = "UPDATE Menu_items SET Name = '$name', `Desc` = '$description', Price = $price WHERE item_id = $item_id";
    } elseif (isset($_POST['add'])) {
        $sql = "INSERT INTO Menu_items (Name, `Desc`, Price) VALUES ('$name', '$description', $price)";
    }

    // Execute the SQL query and handle errors
    if ($conn->query($sql) === TRUE) {
        // Successful operation
        header("Location: menu.php"); // Redirect back to the menu page
        echo "Item added successfully!";
        exit();
    } else {
        // Error occurred, display error message and query for debugging
        echo "Error: " . $conn->error;
        echo "Query: " . $sql;
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Menu Item Processing</title>
</head>
<body>
    <!-- Display the outcome message -->
    <p><?php echo $outcome_message; ?></p>
    
    <!-- Redirect back to the menu page after a brief delay -->
    <script>
        setTimeout(function() {
            window.location.href = "menu.php";
        }, 3000); // Redirect after 3 seconds (adjust the delay as needed)
    </script>
</body>
</html>

<?php
include('DB_Connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form input
    $item_id = $_POST['item_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Use prepared statements to prevent SQL injection
    if (!empty($item_id)) {
        // Update an existing item
        $stmt = $conn->prepare("UPDATE Menu_items SET Name = ?, `Desc` = ?, Price = ? WHERE item_id = ?");
        $stmt->bind_param("ssdi", $name, $description, $price, $item_id);
    } else {
        // Insert a new item
        $stmt = $conn->prepare("INSERT INTO Menu_items (Name, `Desc`, Price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $description, $price);
    }

    if ($stmt->execute()) {
        // Successful operation
        header("Location: menu.php"); // Redirect back to the menu page
        exit();
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
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
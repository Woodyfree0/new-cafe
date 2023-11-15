<?php
phpinfo();
include('DB_Connect.php');

// SQL query to select all records from the Menu_items table
$sql = "SELECT * FROM Menu_items";

// Execute the query
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result) {
    // Check if there are any rows in the result
    if ($result->num_rows > 0) {
        // Output table header
        echo "<table border='1'>
            <tr>
                <th>Item ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>";

        // Loop through the result set and display data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['item_id']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Desc']}</td>
                <td>{$row['Price']}</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found in the table.";
    }

    // Free the result set
    $result->free();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

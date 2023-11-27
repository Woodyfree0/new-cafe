<?if (session_status() == PHP_SESSION_NONE) {
  session_start();}?>
  <? require ('navbar.php');
      include('DB_Connect.php');
   ?>
    <body>
      <!-- header -->
    <header class="header">
        <div class="header-content">
            <h1>Welcome to Our Menu</h1>
            <p>Discover our delicious dishes</p>
        </div>
    </header>
  
    </svg>
   
<!-- menu update -->
<form action="process_menu.php" method="POST">
    <label for ="Item"> Item ID: </label>
    <input type="number" name="item_id" id="ID">

    <label for="name">Item Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>

    <button type="submit" name= "edit">Save</button>
    <button type="submit" name="add">Add New</button>
</form>

<!-- menu container -->
<?
$sql = "SELECT * FROM Menu_items";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='menu-item'>";
        echo "<div class='item-name'>" . $row["Name"] . "</div>";
        echo "<div class='item-description'>" . $row["Desc"] . "</div>";
        echo "<div class='item-price'>$" . $row["Price"] . "</div>";
        echo "</div>";
    }
} else {
    echo "No menu items found.";
}
?>
<? require ('footer.php'); ?>
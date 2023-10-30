<!DOCTYPE html>
<html>
<head>
    <title>Update Roster Entry</title>
</head>
<body>
    <h1>Update Roster Entry</h1>
    <form method="post" action="/crud/roster/update">
        <input type="hidden" name="ID" value="<?php echo $entry['ID']; ?>">
        
        <label for="Date">Date:</label>
        <input type="text" name="Date" id="Date" value="<?php echo $entry['Date']; ?>" required>

        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" id="FirstName" value="<?php echo $entry['FirstName']; ?>" required>

        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" id="LastName" value="<?php echo $entry['LastName']; ?>" required>

        <label for="StaffID">Staff ID:</label>
        <input type="text" name="StaffID" id="StaffID" value="<?php echo $entry['StaffID']; ?>" required>

        <button type="submit">Update</button>
    </form>
</body>
</html>

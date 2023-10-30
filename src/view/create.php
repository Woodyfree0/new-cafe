<!DOCTYPE html>
<html>
<head>
    <title>Create Roster Entry</title>
</head>
<body>
    <h1>Create a New Roster Entry</h1>
    <form method="post" action="/crud/roster/create">
        <label for="Date">Date:</label>
        <input type="text" name="Date" id="Date" required>

        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" id="FirstName" required>

        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" id="LastName" required>

        <label for="StaffID">Staff ID:</label>
        <input type="text" name="StaffID" id="StaffID" required>

        <button type="submit">Create</button>
    </form>
</body>
</html>

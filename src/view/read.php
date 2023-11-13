<? if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<? require 'routes.php'; ?>

<html>
<head>

    <title>Roster Entries</title>
</head>
<body>
    <h1>Roster Entries</h1>
    <table>
        <tr>
            <th>Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Staff ID</th>
            <th>Action</th>
        </tr>
        <?php foreach ($data as $entry): ?>
            <tr>
                <td><?php echo $entry['Date']; ?></td>
                <td><?php echo $entry['FirstName']; ?></td>
                <td><?php echo $entry['LastName']; ?></td>
                <td><?php echo $entry['StaffID']; ?></td>
                <td>
                <a href="/update?id=<?php echo $entry['StaffID']; ?>">Edit</a>
                <a href="/delete?id=<?php echo $entry['StaffID']; ?>">Delete</a>
            </tr>
        <?php endforeach; ?>
        <form action="/create" method="post">
    <input type="text" name="Date" placeholder="Date">
    <input type="text" name="FirstName" placeholder="First Name">
    <input type="text" name="LastName" placeholder="Last Name">
    <input type="number" name="StaffID" placeholder="Staff ID">
    <button type="submit">create</button>
</form>
    </table>
</body>
</html>

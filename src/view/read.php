<!DOCTYPE html>
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
                    <a href="src/view/update?id=<?php echo $entry['ID']; ?>">Edit</a> |
                    <a href="src/view/delete?id=<?php echo $entry['ID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

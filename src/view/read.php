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
                    <button href="src/view/update?id=<?php echo $id; ?>">Edit</button> |
                    <button href="src/view/delete?id=<?php echo $id; ?>">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

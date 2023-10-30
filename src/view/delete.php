<!DOCTYPE html>
<html>
<head>
    <title>Delete Roster Entry</title>
</head>
<body>
    <h1>Delete Roster Entry</h1>
    <p>Are you sure you want to delete this roster entry?</p>
    <form method="post" action="/crud/roster/delete">
        <input type="hidden" name="ID" value="<?php echo $entry['ID']; ?>">
        <button type="submit">Delete</button>
    </form>
</body>
</html>

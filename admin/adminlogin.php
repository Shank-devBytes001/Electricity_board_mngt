<?php
include('headerland.php'); // Include the header file
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Admin Login</h2>
    <form method="post" action="adminprocess.php">
        <label for="employee_id">Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
<footer>
        <div>
            <p>.</p>
        </div>
        <div>
            <p>.</p>
            <p>.</p>
            <p></p>
        </div>
    </footer>
</html>
<?php include 'footer.php'; ?>


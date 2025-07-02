<?php
include('custhead.php'); // Include the header file
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Login</title>
<link rel="stylesheet" href="custlogin.css"> <!-- Assuming you have a separate CSS file -->
</head>
<body>
<div class="container">
    <h2>Customer Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="customer_id">Customer ID:</label>
            <input type="text" id="customer_id" name="customer_id" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Login">
        </div>
    </form>
</div>

<?php
session_start();
include 'connection.php'; // Include your database connection file

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Customer WHERE customer_id='$customer_id' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Customer exists and password matches
        $_SESSION['customer_id'] = $customer_id;
        header("location: custland.php"); // Redirect to the welcome page after successful login
    } else {
        // Customer doesn't exist or password is incorrect
        echo "<p class='error'>Invalid customer ID or password.</p>";
    }
}
$conn->close();
?>
</body>
</html>
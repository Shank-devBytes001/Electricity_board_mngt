<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Customer</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        margin: 20px;
    }
    .form-container {
        margin-top: 20px;
    }
    .form-container input[type="text"], .form-container input[type="email"], .form-container input[type="tel"] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
    }
    .form-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .form-container input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Add Customer</h2>
    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="customer_id">Customer ID:</label>
            <input type="text" id="customer_id" name="customer_id" required><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <input type="submit" value="Add Customer">
        </form>
    </div>
</div>

<?php
include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customer_id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone_number']) && isset($_POST['email'])) {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Customer (customer_id, name, address, phone_number, email) VALUES ('$customer_id', '$name', '$address', '$phone_number', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>New customer record created successfully</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
$conn->close();
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Lander Page</title>
  <link rel="stylesheet" href="adminland.css">
</head>
<body>
  <?php include 'headerland.php'; ?>

  <div class="container">
    <h2>Admin Dashboard</h2>
    <div class="section">
      <h3>Bill</h3>
      <table>
        <thead>
          <tr>
            <th>Bill ID</th>
            <th>Customer Meter ID</th>
            <th>Bill Amount</th>
            <th>Bill Date</th>
            <th>Due Date</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // Include database connection
            include 'connection.php';

            // Fetch bill records from the database
            $sql = "SELECT * FROM Bill";
            $result = $conn->query($sql);

            // Output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["bill_id"] . "</td>";
              echo "<td>" . $row["customer_meter_id"] . "</td>";
              echo "<td>" . $row["bill_amount"] . "</td>";
              echo "<td>" . $row["bill_date"] . "</td>";
              echo "<td>" . $row["due_date"] . "</td>";
              echo "<td><a href='editbill.php?id=" . $row["bill_id"] . "'>Edit</a></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
      <button class="button" onclick="window.location.href='addbill.php'">Add Bill</button>
    </div>

    <!-- Add sections for Customer and ComplaintEmployee here -->

  </div>
</body>
</html>


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

// Delete customer if delete button is clicked
if(isset($_POST['delete_customer'])) {
    $customer_id_to_delete = $_POST['customer_id_to_delete'];
    $sql_delete_customer = "DELETE FROM Customer WHERE customer_id='$customer_id_to_delete'";
    if ($conn->query($sql_delete_customer) === TRUE) {
        echo "<p>Customer deleted successfully</p>";
    } else {
        echo "<p>Error deleting customer: " . $conn->error . "</p>";
    }
}

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

// Fetch existing customers and display them in a table
$sql_select_customers = "SELECT * FROM Customer";
$result = $conn->query($sql_select_customers);
if ($result->num_rows > 0) {
    echo "<h2>Existing Customers</h2>";
    echo "<table>";
    echo "<tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Phone Number</th><th>Email</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["customer_id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["phone_number"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td><form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'><input type='hidden' name='customer_id_to_delete' value='".$row["customer_id"]."'><input type='submit' name='delete_customer' value='Delete'></form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No customers found.</p>";
}
$conn->close();
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Complaint Management</title>
<link rel="stylesheet" href="admin.css">
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        margin: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .form-container {
        margin-top: 20px;
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
    <h2>Complaint Management</h2>
    <div class="table-container">
        <h3>Complaints Table</h3>
        <table>
            <tr>
                <th>Complaint ID</th>
                <th>Customer ID</th>
                <th>Complaint</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <!-- PHP code to fetch complaints from database and display them in table -->
            <?php
            include 'connection.php';
            $sql = "SELECT * FROM Complaint";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["complaint_id"]."</td>";
                    echo "<td>".$row["customer_id"]."</td>";
                    echo "<td>".$row["description"]."</td>";
                    echo "<td>".$row["status"]."</td>";
                    echo "<td><form action='updcmp.php' method='post'>";
                    echo "<input type='hidden' name='complaint_id' value='".$row["complaint_id"]."'>";
                    echo "<select name='status'>";
                    echo "<option value='Pending'>Pending</option>";
                    echo "<option value='Resolved'>Resolved</option>";
                    echo "</select>";
                    echo "<input type='submit' value='Update'>";
                    echo "</form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No complaints found.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</div>
</body>
</html>
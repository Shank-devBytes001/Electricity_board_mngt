<?php
include('custhead.php'); // Include the header file
?>
<?php
session_start();
include 'connection.php'; // Include your database connection file

if(!isset($_SESSION['customer_id'])) {
    // Redirect to login page if customer is not logged in
    header("location: custlogin.php");
    exit;
}

$customer_id = $_SESSION['customer_id'];

// Fetch customer details
$sql_customer = "SELECT * FROM Customer WHERE customer_id='$customer_id'";
$result_customer = $conn->query($sql_customer);
$customer = $result_customer->fetch_assoc();

// Fetch bill details using JOIN
$sql_bill = "SELECT Bill.* FROM Bill 
             JOIN Customermeter ON Customermeter.customer_meter_id = Bill.customer_meter_id
             WHERE Customermeter.customer_id = '$customer_id'";
$result_bill = $conn->query($sql_bill);

// Fetch complaints
$sql_complaint = "SELECT * FROM Complaint WHERE customer_id='$customer_id'";
$result_complaint = $conn->query($sql_complaint);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Dashboard</title>
<link rel="stylesheet" href="custland.css"> <!-- Assuming you have a separate CSS file -->
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo $customer['name']; ?></h2>
    <h3>Customer Details</h3>
    <p>Customer ID: <?php echo $customer['customer_id']; ?></p>
    <p>Name: <?php echo $customer['name']; ?></p>
    <p>Address: <?php echo $customer['address']; ?></p>
    <p>Phone Number: <?php echo $customer['phone_number']; ?></p>
    <p>Email: <?php echo $customer['email']; ?></p>

    <h3>Bill Details</h3>
    <?php if ($result_bill->num_rows > 0): ?>
        <table>
            <tr>
                <th>Bill ID</th>
                <th>Bill Amount</th>
                <th>Bill Date</th>
                <th>Due Date</th>
            </tr>
            <?php while ($row = $result_bill->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['bill_id']; ?></td>
                    <td><?php echo $row['bill_amount']; ?></td>
                    <td><?php echo $row['bill_date']; ?></td>
                    <td><?php echo $row['due_date']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No bills found.</p>
    <?php endif; ?>

    <h3>Complaints</h3>
    <?php if ($result_complaint->num_rows > 0): ?>
        <table>
            <tr>
                <th>Complaint ID</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $result_complaint->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['complaint_id']; ?></td>
                    <td><?php echo $row['customer_id']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No complaints found.</p>
    <?php endif; ?>

    <h3>File a Complaint</h3>
    <form action="compland.php" method="post">
        
        <input type="submit" value="Submit Complaint">
    </form>

    <a href="custlogin.php" class="logout-btn">Logout</a> <!-- Assuming you have a logout page -->
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Bill</title>
<link rel="stylesheet" href="editbill.css">
</head>
<body>
<?php include 'headerland.php'; ?>
<div class="container">
    <h2>Edit Bill</h2>
    <?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $bill_id = $_GET['id'];
        $sql_select_bill = "SELECT * FROM Bill WHERE bill_id='$bill_id'";
        $result = $conn->query($sql_select_bill);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Bill not found.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_bill'])) {
        $bill_id = $_POST['bill_id'];
        $customer_meter_id = $_POST['customer_meter_id'];
        $bill_amount = $_POST['bill_amount'];
        $bill_date = $_POST['bill_date'];
        $due_date = $_POST['due_date'];

        $sql_update_bill = "UPDATE Bill SET customer_meter_id='$customer_meter_id', bill_amount='$bill_amount', bill_date='$bill_date', due_date='$due_date' WHERE bill_id='$bill_id'";
        if ($conn->query($sql_update_bill) === TRUE) {
            echo "Bill updated successfully";
        } else {
            echo "Error updating bill: " . $conn->error;
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="bill_id" value="<?php echo $row['bill_id']; ?>">
        <label for="customer_meter_id">Customer Meter ID:</label>
        <input type="text" name="customer_meter_id" value="<?php echo $row['customer_meter_id']; ?>"><br><br>
        <label for="bill_amount">Bill Amount:</label>
        <input type="text" name="bill_amount" value="<?php echo $row['bill_amount']; ?>"><br><br>
        <label for="bill_date">Bill Date:</label>
        <input type="date" name="bill_date" value="<?php echo $row['bill_date']; ?>"><br><br>
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" value="<?php echo $row['due_date']; ?>"><br><br>
        <input type="submit" name="update_bill" value="Update Bill">
    </form>
</div>
</body>
</html>
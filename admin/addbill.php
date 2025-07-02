<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Bill</title>
  <link rel="stylesheet" href="addbill.css">
</head>
<body>
  <?php include 'headerland.php'; ?>
  <div class="container">
    <h2>Add Bill</h2>
    <?php
    include 'connection.php';

    // Delete bill if delete button is clicked
    if(isset($_POST['delete_bill'])) {
      $bill_id_to_delete = $_POST['bill_id_to_delete'];
      $sql_delete_bill = "DELETE FROM Bill WHERE bill_id='$bill_id_to_delete'";
      if ($conn->query($sql_delete_bill) === TRUE) {
        echo "Bill deleted successfully";
      } else {
        echo "Error deleting bill: " . $conn->error;
      }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bill_id']) && isset($_POST['customer_meter_id']) && isset($_POST['bill_amount']) && isset($_POST['bill_date']) && isset($_POST['due_date'])) {
      $bill_id = $_POST['bill_id'];
      $customer_meter_id = $_POST['customer_meter_id'];
      $bill_amount = $_POST['bill_amount'];
      $bill_date = $_POST['bill_date'];
      $due_date = $_POST['due_date'];

      $sql = "INSERT INTO Bill (bill_id, customer_meter_id, bill_amount, bill_date, due_date) VALUES ('$bill_id', '$customer_meter_id', '$bill_amount', '$bill_date', '$due_date')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    // Fetch existing bills and display them in a table
    $sql_select_bills = "SELECT * FROM Bill";
    $result = $conn->query($sql_select_bills);
    if ($result->num_rows > 0) {
      echo "<h3>Existing Bills</h3>";
      echo "<table border='1'>";
      echo "<tr><th>Bill ID</th><th>Customer Meter ID</th><th>Bill Amount</th><th>Bill Date</th><th>Due Date</th><th>Action</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["bill_id"]."</td><td>".$row["customer_meter_id"]."</td><td>".$row["bill_amount"]."</td><td>".$row["bill_date"]."</td><td>".$row["due_date"]."</td><td>
        
        <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>
          <input type='hidden' name='bill_id_to_delete' value='".$row["bill_id"]."'>
          <input type='submit' name='delete_bill' value='Delete'>
        </form></td></tr>";
      }
      echo "</table>";
    } else {
      echo "No bills found.";
    }
    $conn->close();
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="bill_id">Bill ID:</label>
      <input type="text" name="bill_id"><br><br>
      <label for="customer_meter_id">Customer Meter ID:</label>
      <input type="text" name="customer_meter_id"><br><br>
      <label for="bill_amount">Bill Amount:</label>
      <input type="text" name="bill_amount"><br><br>
      <label for="bill_date">Bill Date:</label>
      <input type="date" name="bill_date"><br><br>
      <label for="due_date">Due Date:</label>
      <input type="date" name="due_date"><br><br>
      <input type="submit" value="Add Bill">
    </form>
  </div>
</body>
</html>
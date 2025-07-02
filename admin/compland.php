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

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $customer_id = $_SESSION['customer_id'];
    $complaint_id = $_POST['complaint_id']; // Assuming you have a way to input the complaint_id
    $description = $_POST['description'];
    $status = "Pending"; // Assuming you want to set the initial status as Pending

    $sql = "INSERT INTO Complaint (complaint_id, customer_id, description, status) 
            VALUES ('$complaint_id', '$customer_id', '$description', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>File a Complaint</title>
<link rel="stylesheet" href="custland.css"> <!-- Assuming you have a separate CSS file -->
</head>
<body>
<div class="container">
    <h2>File a Complaint</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="complaint_id">Complaint ID:</label>
        <input type="text" id="complaint_id" name="complaint_id" required><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>
        <input type="submit" name="submit" value="Submit Complaint">
    </form>
</div>
</body>
</html>
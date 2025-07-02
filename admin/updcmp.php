<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Complaint Status</title>
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
    <h2>Update Complaint Status</h2>
    <div class="form-container">
        <form action="adminland.php" method="post">
            <label for="complaint_id">Complaint ID:</label>
            <input type="text" id="complaint_id" name="complaint_id" required><br>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select><br>
            <input type="submit" value="Update Status">
        </form>
    </div>
</div>

<?php
include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complaint_id']) && isset($_POST['status'])) {
    $complaint_id = $_POST['complaint_id'];
    $status = $_POST['status'];

    $sql = "UPDATE Complaint SET status='$status' WHERE complaint_id='$complaint_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Complaint status updated successfully</p>";
    } else {
        echo "<p>Error updating status: " . $conn->error . "</p>";
    }
}
$conn->close();
?>
</body>
</html>
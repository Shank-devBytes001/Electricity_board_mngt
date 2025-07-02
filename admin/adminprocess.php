<?php
include('header.php'); // Include the header file
?>


<?php
// Include database connection
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data
    $employee_id = $_POST['employee_id'];
    $password = $_POST['password'];

    // SQL query to check if user exists
    $sql = "SELECT * FROM Employee WHERE employee_id = '$employee_id' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if result exists and fetch the row
    if ($result->num_rows > 0) {
        // Admin login successful
        session_start();
        $_SESSION['employee_id'] = $employee_id;
        header("Location: adminland.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Admin login failed
        echo "Invalid employee ID or password.";
    }
}
?>
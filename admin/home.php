<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <?php include 'headerland.php'; ?>


  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('sunset home.jpg'); /* Add the URL of your background image */
      background-size: cover; /* Adjust as needed */
      background-repeat: no-repeat; /* Adjust as needed */
    }
    .container {
      text-align: center;
      margin-top: 100px;
    }
    .btn {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      margin: 10px;
    }
    .btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Welcome to Electricity Board Management System</h2>
    <p>Please select your login option:</p>
    <a href="custlogin.php" class="btn">Customer Login</a>
    <a href="http://localhost/mynewprj/admin/adminlogin.php" class="btn">Admin Login</a>
  </div>
</body>
</html> 



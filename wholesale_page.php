<?php
session_start();
include 'config.php';

// Ensure that the session for wholesale supplier is valid
$wholesale_id = $_SESSION['wholesale_id'];

if(!isset($wholesale_id)){
   header('location:login.php');
}

// Query to fetch suppliers
$query = "SELECT name FROM users";
$result = mysqli_query($conn, $query);

// Error handling if query fails
if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wholesale Supplier Panel</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['supplier_name']); ?>!</h2>
<p>Here are the suppliers available for restocking:</p>

<a href="logout.php">Logout</a>

</body>
</html>

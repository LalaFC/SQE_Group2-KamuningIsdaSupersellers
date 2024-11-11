<?php
session_start();
include 'config.php';

// Ensure that the session for wholesale supplier is valid
$wholesale_id = $_SESSION['wholesale_id'];

if (!isset($wholesale_id)) {
    header('location:login.php');
    exit;
}

// Query to fetch all records from the wholesale table
$query = "SELECT w.supplier_id, s.name AS supplier_name, w.product_id, p.name AS product_name
          FROM wholesale w
          JOIN suppliers s ON w.supplier_id = s.id
          JOIN products p ON w.product_id = p.id";
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

<!-- Table to display wholesale records -->
<table border="1">
    <tr>
        <th>Supplier ID</th>
        <th>Supplier Name</th>
        <th>Product ID</th>
        <th>Product Name</th>
    </tr>

    <?php
    // Fetching and displaying the data from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['supplier_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['supplier_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['product_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

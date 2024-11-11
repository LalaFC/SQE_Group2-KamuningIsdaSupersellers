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

// Fetch all suppliers and products for search functionality
$suppliers = [];
$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $suppliers[$row['supplier_id']] = $row['supplier_name'];
    $products[$row['product_id']] = $row['product_name'];
}

// Separate query to get the products linked to each supplier
$query2 = "SELECT w.supplier_id, w.product_id, p.name AS product_name
           FROM wholesale w
           JOIN products p ON w.product_id = p.id";
$result2 = mysqli_query($conn, $query2);

// Create an associative array to map suppliers to their products
$supplier_products = [];
while ($row = mysqli_fetch_assoc($result2)) {
    $supplier_products[$row['supplier_id']][] = $row['product_name'];
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
   <style>
     body {
       font-family: Arial, sans-serif;
       margin: 0;
       padding: 0;
       background-color: #f4f4f9;
   }

   h2 {
       text-align: center;
       margin: 20px 0;
   }

   .search-container {
       text-align: center;
       margin: 20px 0;
   }

   .search-container input {
       padding: 10px;
       width: 60%;
       max-width: 500px;
       font-size: 16px;
       border: 1px solid #ccc;
       border-radius: 5px;
   }

   #suppliersList {
       display: flex;
       flex-wrap: wrap;
       justify-content: space-around;
       margin: 20px;
   }

   .supplier-box {
       background-color: white;
       border: 1px solid #ddd;
       border-radius: 8px;
       padding: 20px;
       margin: 15px;
       width: 250px;
       box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
       text-align: center;
       display: flex;
       flex-direction: column;
       justify-content: space-between;
       height: 250px; /* Ensure box has a fixed height */
   }

   .supplier-box h3 {
       font-size: 18px;
       color: #333;
       margin-bottom: 10px;
   }

   .product-dropdown {
       width: 100%;
       padding: 8px;
       font-size: 14px;
       border-radius: 5px;
       border: 1px solid #ccc;
       margin-top: auto; /* Push dropdown to the bottom */
   }

   .supplier-box:hover {
       box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
   }
   </style>
</head>
<body>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['supplier_name']); ?>!</h2>
<p style="text-align: center;">Here are the suppliers available for restocking:</p>

<!-- Search Bar -->
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search by supplier or product..." oninput="searchFunction()">
</div>

<!-- Supplier Boxes -->
<div id="suppliersList">
    <?php foreach ($suppliers as $supplier_id => $supplier_name): ?>
        <div class="supplier-box" id="supplier-<?php echo $supplier_id; ?>">
            <h3><?php echo htmlspecialchars($supplier_name); ?></h3>
            <select class="product-dropdown" id="product-dropdown-<?php echo $supplier_id; ?>">
                <?php
                if (isset($supplier_products[$supplier_id])) {
                    foreach ($supplier_products[$supplier_id] as $product_name) {
                        echo "<option>" . htmlspecialchars($product_name) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    <?php endforeach; ?>
</div>

<!-- Logout Link -->
<a href="logout.php" style="display: block; text-align: center; margin-top: 20px;">Logout</a>

<script>
    // JavaScript function to filter suppliers and products based on search input
    function searchFunction() {
        var input = document.getElementById("searchInput").value.toLowerCase();
        var suppliersList = document.getElementById("suppliersList");
        var supplierBoxes = suppliersList.getElementsByClassName("supplier-box");

        for (var i = 0; i < supplierBoxes.length; i++) {
            var supplierBox = supplierBoxes[i];
            var supplierName = supplierBox.getElementsByTagName("h3")[0].innerText.toLowerCase();
            var productDropdown = supplierBox.getElementsByClassName("product-dropdown")[0];
            var options = productDropdown.getElementsByTagName("option");

            // Check if the supplier or any product matches the search query
            var matchesSupplier = supplierName.includes(input);
            var matchesProduct = false;

            // Check if any product matches
            for (var j = 0; j < options.length; j++) {
                if (options[j].innerText.toLowerCase().includes(input)) {
                    matchesProduct = true;
                    break;
                }
            }

            // If either supplier or product matches, display the supplier box, otherwise hide it
            if (matchesSupplier || matchesProduct) {
                supplierBox.style.display = "";
            } else {
                supplierBox.style.display = "none";
            }
        }
    }
</script>

</body>
</html>

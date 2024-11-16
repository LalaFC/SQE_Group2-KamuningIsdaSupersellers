<?php
session_start();
include 'config.php';

// Ensure that the session for wholesale supplier is valid
$wholesale_id = $_SESSION['wholesale_id'];

if (!isset($wholesale_id)) {
    header('location:login.php');
    exit;
}

// Query to fetch all records from the wholesale table with supplier name and product name
$query = "SELECT supplier_name, product_name, product_id FROM wholesale";
$result = mysqli_query($conn, $query);

// Error handling if query fails
if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

// Create an associative array to map suppliers to their products
$supplier_products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $supplier_products[$row['supplier_name']][] = [
        'product_name' => $row['product_name'],
        'product_id' => $row['product_id']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wholesale Supplier Panel</title>
   <link rel="stylesheet" href="css/supplier_style.css">
</head>
<body>
    <header>
        <h1>Supplier Panel</h1>
    </header>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['supplier_name']); ?>!</h2>
    <p style="text-align: center;">Here are the suppliers available for restocking:</p>

    <!-- Add to Cart Button Above All Supplier Boxes -->
    <div class="add-to-cart-btn-container">
        <button class="add-to-cart-btn" onclick="showCart()">Show Cart</button>
    </div>

    <!-- Supplier Boxes -->
    <div class="supplier-box-container" id="suppliersList">
        <?php foreach ($supplier_products as $supplier_name => $products): ?>
            <div class="supplier-box" id="supplier-<?php echo $supplier_name; ?>" data-supplier-name="<?php echo strtolower($supplier_name); ?>">
                <h3><?php echo htmlspecialchars($supplier_name); ?></h3>

                <select class="product-dropdown" data-supplier="<?php echo strtolower($supplier_name); ?>">
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product['product_id']; ?>" data-product-name="<?php echo strtolower($product['product_name']); ?>">
                            <?php echo htmlspecialchars($product['product_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Quantity Button -->
                <div class="add-to-cart-quantity">
                    <button onclick="updateQuantity(this, 'decrease', '<?php echo $supplier_name; ?>')">-</button>
                    <span id="quantity-<?php echo $supplier_name; ?>" class="quantity-display">0</span>
                    <button onclick="updateQuantity(this, 'increase', '<?php echo $supplier_name; ?>')">+</button>
                </div>

                <!-- Add to Cart Button inside Box -->
                <button class="add-to-cart-btn" onclick="addToCart('<?php echo $supplier_name; ?>')">Add to Cart</button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal for Showing Cart -->
    <div class="modal" id="cartModal">
        <div class="modal-content">
            <div class="modal-header">Your Cart</div>
            <div class="modal-body" id="cartItemsList">
                <!-- Cart items will appear here -->
            </div>
            <div class="cart-footer">
                <button class="checkout-btn">Checkout</button>
                <button class="close-btn" onclick="closeCart()">Close</button>
            </div>
        </div>
    </div>

    <!-- Logout Link -->
    <a href="logout.php" style="display: block; text-align: center; margin-top: 20px;">Logout</a>

    <script src="js/supplier_script.js"></script>
</body>
</html>
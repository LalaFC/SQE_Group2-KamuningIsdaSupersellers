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
   <link rel="stylesheet" href="css/style.css">
   <style>
       /* Styles for the page */
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

       .add-to-cart-btn-container {
           text-align: center;
           margin-bottom: 20px;
       }

       .add-to-cart-btn {
           background-color: #28a745;
           color: white;
           font-size: 16px;
           padding: 12px 20px;
           border: none;
           border-radius: 12px;
           cursor: pointer;
           transition: background-color 0.3s ease;
       }

       .add-to-cart-btn:hover {
           background-color: #218838;
       }

       .supplier-box-container {
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
           height: 350px;
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
       }

       .add-to-cart-quantity {
           margin-top: 10px;
           font-size: 16px;
           font-weight: bold;
       }

       .add-to-cart-quantity button {
           padding: 5px 10px;
           margin: 0 5px;
           font-size: 16px;
           border-radius: 5px;
           border: 1px solid #ccc;
           background-color: #28a745;
           color: white;
           cursor: pointer;
       }

       .add-to-cart-quantity button:hover {
           background-color: #218838;
       }

       .supplier-box:hover {
           box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
       }

       /* Modal (Cart) */
       .modal {
           display: none;
           position: fixed;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background-color: rgba(0, 0, 0, 0.5);
           justify-content: center;
           align-items: center;
           z-index: 9999;
       }

       .modal-content {
           background-color: white;
           padding: 20px;
           border-radius: 8px;
           max-width: 500px;
           width: 100%;
           overflow-y: auto;
       }

       .modal-header {
           font-size: 18px;
           font-weight: bold;
           margin-bottom: 10px;
       }

       .modal-body {
           margin-bottom: 20px;
       }

       .close-btn {
           background-color: red;
           color: white;
           padding: 10px;
           border-radius: 5px;
           cursor: pointer;
           width: 100%;
       }

       .cart-item {
           display: flex;
           justify-content: space-between;
           padding: 10px;
           border-bottom: 1px solid #ddd;
       }

       .cart-item:last-child {
           border-bottom: none;
       }

       .cart-item span {
           font-size: 16px;
       }

       .cart-item button {
           background-color: #28a745;
           color: white;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           padding: 5px 10px;
       }

       .cart-item button:hover {
           background-color: #218838;
       }

       .cart-footer {
           display: flex;
           justify-content: space-between;
           align-items: center;
           margin-top: 20px;
       }

       .checkout-btn {
           background-color: #007bff;
           color: white;
           padding: 10px 20px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
       }

       .checkout-btn:hover {
           background-color: #0056b3;
       }
   </style>
</head>
<body>

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

<script>
    let cart = [];

    // Function to update quantity in the product box
    function updateQuantity(button, action, supplierName) {
        let quantityDisplay = document.getElementById('quantity-' + supplierName);
        let currentQuantity = parseInt(quantityDisplay.textContent);
        if (action === 'increase') {
            quantityDisplay.textContent = currentQuantity + 1 + " kg";
        } else if (action === 'decrease' && currentQuantity > 0) {
            quantityDisplay.textContent = currentQuantity - 1 + " kg";
        }
    }

    // Function to add items to the cart
    function addToCart(supplierName) {
        let supplierBox = document.getElementById('supplier-' + supplierName);
        let productDropdown = supplierBox.querySelector('.product-dropdown');
        let selectedOption = productDropdown.options[productDropdown.selectedIndex];
        let selectedProductId = selectedOption.value;
        let selectedProductName = selectedOption.textContent;
        let quantity = parseInt(supplierBox.querySelector('.quantity-display').textContent);

        if (quantity > 0) {
            let cartItem = {
                product_id: selectedProductId,
                product_name: selectedProductName,
                quantity: quantity
            };
            cart.push(cartItem);
            alert(selectedProductName + " added to cart!");
            displayCart();
        } else {
            alert("Please select a quantity greater than 0.");
        }
    }

    // Function to show cart modal
    function showCart() {
        document.getElementById('cartModal').style.display = 'flex';
    }

    // Function to close cart modal
    function closeCart() {
        document.getElementById('cartModal').style.display = 'none';
    }

    // Function to display cart items
    function displayCart() {
        let cartItemsList = document.getElementById('cartItemsList');
        cartItemsList.innerHTML = '';
        cart.forEach((item, index) => {
            cartItemsList.innerHTML += `
                <div class="cart-item">
                    <span>${item.product_name} (x${item.quantity})</span>
                    <div>
                        <button onclick="updateCartQuantity(${index}, 'increase')">+</button>
                        <span>${item.quantity} kg</span>
                        <button onclick="updateCartQuantity(${index}, 'decrease')">-</button>
                    </div>
                    <button onclick="removeCartItem(${index})">Remove</button>
                </div>
            `;
        });
    }

    // Function to update quantity in cart
    function updateCartQuantity(index, action) {
        let cartItem = cart[index];
        if (action === 'increase') {
            cartItem.quantity++;
        } else if (action === 'decrease' && cartItem.quantity > 0) {
            cartItem.quantity--;
        }
        displayCart();
    }

    // Function to remove item from cart
    function removeCartItem(index) {
        cart.splice(index, 1);
        displayCart();
    }
</script>

</body>
</html>

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
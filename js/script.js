// Toggle password visibility for the main password field
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

// Toggle password visibility for the confirm password field
const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
const confirmPassword = document.querySelector('#confirmPassword');

if (togglePassword && password) {
   togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
   });
}

if (toggleConfirmPassword && confirmPassword) {
   toggleConfirmPassword.addEventListener('click', function () {
      const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmPassword.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
   });
}

// Toggle userBox and navbar visibility
let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () => {
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () => {
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if (window.scrollY > 60) {
      document.querySelector('.header .header-2').classList.add('active');
   } else {
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

function changeCartQuantity(cartId, amount) {
   // Get the quantity input element for the specific cart item
   const quantityInput = document.querySelector(`#cart-quantity-${cartId}`);
   
   // Parse the current quantity
   let currentQuantity = parseInt(quantityInput.value);
   
   // Update the quantity based on the amount
   currentQuantity += amount;

   // Ensure the quantity does not go below 1
   if (currentQuantity < 1) {
       currentQuantity = 1;
   }

   // Set the new quantity value
   quantityInput.value = currentQuantity;

   // Optionally, you can submit the form automatically to update the cart
   // You can uncomment the following lines if you want to automatically update the cart
   /*
   const form = quantityInput.closest('form');
   form.querySelector('input[name="cart_quantity"]').value = currentQuantity;
   form.submit();
   */
}
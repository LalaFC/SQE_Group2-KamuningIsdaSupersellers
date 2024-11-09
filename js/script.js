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

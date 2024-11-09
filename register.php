<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = 'user';

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Passwords do not match!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Registered Successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>REGISTER</h3>
      <input type="text" name="name" placeholder="NAME" required class="box">
      <input type="email" name="email" placeholder="EMAIL" required class="box">
      
      <!-- Password field with toggle option -->
      <div class="password-container">
         <input type="password" name="password" placeholder="PASSWORD" required class="box" id="password">
         <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
      </div>

      <!-- Confirm Password field with toggle option -->
      <div class="password-container">
         <input type="password" name="cpassword" placeholder="CONFIRM YOUR PASSWORD" required class="box" id="confirmPassword">
         <i class="fa fa-eye" id="toggleConfirmPassword" style="cursor: pointer;"></i>
      </div>
      
      <input type="submit" name="submit" value="REGISTER" class="btn">
      <p>ALREADY HAVE AN ACCOUNT? <a href="login.php">LOGIN</a></p>
   </form>

</div>

<!-- Link to external JS file -->
<script src="js/script.js"></script>

</body>
</html>

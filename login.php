<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }elseif($row['user_type'] == 'wholesale') {

         $_SESSION['supplier_name'] = $row['name'];
         $_SESSION['supplier_email'] = $row['email'];
         $_SESSION['wholesale_id'] = $row['id'];
         header('location:wholesale_page.php');

}




   }else{
      $message[] = 'Incorrect Email or Password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kamuning Isda Supersellers</title>

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
      <h3>Kamuning Isda Supersellers</h3>
      <input type="email" name="email" placeholder="EMAIL" required class="box">
      
      <!-- Password field with toggle option -->
      <div class="password-container">
         <input type="password" name="password" placeholder="PASSWORD" required class="box" id="password">
         <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
      </div>
      
      <input type="submit" name="submit" value="LOGIN" class="btn">
      <p>DON'T HAVE AN ACCOUNT YET? <a href="register.php">REGISTER</a></p>
   </form>

</div>

<!-- Link to external JS file -->
<script src="js/script.js"></script>

</body>
</html>
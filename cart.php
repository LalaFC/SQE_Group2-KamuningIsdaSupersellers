<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   $cart_supplier = $_POST['cart_supplier'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity', supplier = '$cart_supplier' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'Cart quantity and supplier updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Shopping cart</h3>
   <p> <a href="home.php">Home</a> / Cart </p>
</div>

<section class="shopping-cart">

   <h1 class="title">Your Shopping Cart</h1>

   <div class="box-container">
   <?php
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
   ?>
   <div class="box">
      <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('Delete this from cart?');"></a>
      <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_cart['name']; ?></div>
      <div class="price">₱ <?php echo $fetch_cart['price']; ?></div>
      <form action="" method="post" style="display: flex; flex-direction: column; gap: 10px;">
         <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
         <div style="width: 100%;">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" 
                  style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
         </div>
         <div style="width: 100%;">
            <select name="cart_supplier" required 
                  style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
               <?php
               // Fetch all suppliers from the database
               $select_suppliers = mysqli_query($conn, "SELECT * FROM `suppliers`") or die('query failed');
               if(mysqli_num_rows($select_suppliers) > 0){
                  while($row = mysqli_fetch_assoc($select_suppliers)){
                     $selected = ($row['name'] == $fetch_cart['supplier']) ? 'selected' : '';
                     echo '<option value="'.$row['name'].'" '.$selected.'>'.$row['name'].'</option>';
                  }
               }else{
                  echo '<option value="">No suppliers available</option>';
               }
               ?>
            </select>
         </div>
         <input type="submit" name="update_cart" value="update" class="option-btn" 
               style="width: 100%;">
      </form>
      <div class="sub-total"> Sub total : <span>₱<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span> </div>
   </div>
   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">...</p>';
   }
   ?>
</div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Delete all from cart?');">delete all</a>
   </div>

   <div class="cart-total">
      <p>Grand total : <span>₱<?php echo $grand_total; ?></span></p>
      <div class="flex">
         <a href="shop.php" class="option-btn">Continue shopping</a>
         <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
      </div>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
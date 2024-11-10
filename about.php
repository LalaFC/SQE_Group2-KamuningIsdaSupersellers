<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

// Fetch suppliers from the database
$suppliers = [];
$sql = "SELECT name FROM suppliers"; // Replace with your actual suppliers table name
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $suppliers[] = $row['name'];
    }
} else {
    $suppliers = ["No suppliers found."];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/about.css"> <!-- Separate CSS for About page -->

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>About Us</h3>
   <p><a href="home.php">Home</a> / About</p>
</div>

<section class="about">

   <div class="flex">
      <div class="content">
         <h3>Welcome to KISS!</h3>
         <p>This is Kamuning Isda Supersellers, and we created this website to give our customers a seamless experience on buying their favorite fish delicacies. Together with our partnered stores, we will serve the best quality products to people.</p>
         <p>Whether you're a long-time fish enjoyer or just a person exploring, welcome!</p>
         <a href="contact.php" class="btn">CONTACT US</a>
      </div>
   </div>

</section>

<section class="suppliers">

   <h1 class="title">Our Partners</h1>

   <div class="table-container">
      <table>
         <tbody>
            <?php foreach ($suppliers as $supplier): ?>
            <tr>
               <td><?php echo htmlspecialchars($supplier); ?></td>
            </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>

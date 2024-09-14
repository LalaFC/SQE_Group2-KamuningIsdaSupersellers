<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>About Us</h3>
   <p> <a href="home.php">Home</a> / About </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="css/spellbook.gif" alt="">
      </div>

      <div class="content">
         <h3>Welcome to PixelForge!</h3>
         <p>Greetings! I am Miguel, the owner of PixelForge. It is my happiness to find you here wandering around in our small website. Feel free to roam around, look for some assets, or find inspirations in some of the greatest artworks here.</p>
         <p>I started this website to create a connection point between every other artists around the world. You are the next one. Are you going to join us?</p>
         <a href="contact.php" class="btn">CONTACT US</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>“Your character sprites and animations are so captivating! Once I started using them in my game, I couldn't stop. They add a level of charm and engagement that my players adore. Can't wait to explore more of your collections!”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Michael Islam</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>"I've been a pixel art enthusiast for years, and your website is a goldmine! The quality and variety of assets available here are simply outstanding. It's like a treasure trove for game developers like me. Highly recommend!”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Guelmi Salmi</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>“As someone just starting with pixel art, I found your website incredibly user-friendly. The tutorials and starter packs helped me kickstart my projects. The community forum is a great place to seek advice and share progress.”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Geloan Salim</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>“I've purchased several asset packs from your site for my indie game project, and I'm blown away by the value! The quality surpasses what I expected for the price. It's a steal considering the time it saves in development.”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Anloge Lisam</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>“Your pixel art assets stand out from others I've seen online. The uniqueness and versatility of your designs make them suitable for various game genres. I appreciate the attention to detail in each asset; it truly adds depth to my projects!”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Migule Masli</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>“I had a query about a specific asset pack, and your customer service was quick and helpful! They addressed my concerns and even provided additional resources. It's refreshing to experience such attentive service in the digital marketplace.”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Angole Milsa</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">COOL ARTISTS (AS THEY SAID)</h1>

   <div class="box-container">

      <div class="box">
         <img src="css/NFT-1.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Monkey Boi</h3>
      </div>

      <div class="box">
         <img src="css/NFT-2.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Ginger Bravo</h3>
      </div>

      <div class="box">
         <img src="css/NFT-3.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Kitty Puff</h3>
      </div>

      <div class="box">
         <img src="css/NFT-4.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Skelly Ton</h3>
      </div>

      <div class="box">
         <img src="css/NFT-5.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Golden Rooster</h3>
      </div>

      <div class="box">
         <img src="css/NFT-6.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Holy Simba</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
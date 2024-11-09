<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

$search_query = '';
if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);
}

if ($search_query == '') {
    $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
} else {
    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$search_query%'") or die('query failed');
}

$select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$search_query%'") or die('query failed');

// Update Product Logic
if (isset($_POST['update_product'])) {

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];

    // Update product name and price in the database
    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image file size is too large!';
        } else {
            mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('uploaded_img/' . $update_old_image); // Remove the old image
        }
    }

    header('location:admin_products.php');
}

// Add Product Logic
if (isset($_POST['add_product'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'PRODUCT NAME ALREADY ADDED';
    } else {
        $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');

        if ($add_product_query) {
            if ($image_size > 2000000) {
                $message[] = 'IMAGE SIZE IS TOO LARGE!';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'PRODUCT ADDED SUCCESSFULLY!';
            }
        } else {
            $message[] = 'PRODUCT COULD NOT BE ADDED!';
        }
    }
}

// Delete Product Logic
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $image_name = $_GET['image']; // Get the image name
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
    unlink('uploaded_img/' . $image_name); // Remove the image file
    header('location:admin_products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-products">

    <h1 class="title">Shop Products</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" class="box" placeholder="ENTER PRODUCT NAME" required>
        <input type="number" min="0" name="price" class="box" placeholder="ENTER PRODUCT PRICE" required>
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>

        <input type="submit" value="add product" name="add_product" class="btn">
    </form>

</section>

<!-- product CRUD section ends -->

<!-- Search Products Section -->
<section class="search-products">
    <form action="" method="GET">
        <input type="text" name="search" class="box" placeholder="Search products...">
        <input type="submit" value="Search" class="btn">
    </form>
</section>

<!-- show products  -->
<section class="show-products">
    <div class="box-container">
        <?php
        $search_query = '';
        if (isset($_GET['search'])) {
            $search_query = mysqli_real_escape_string($conn, $_GET['search']);
        }

        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$search_query%'") or die('query failed');
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                ?>
                <div class="box">
                    <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                    <div class="name"><?php echo $fetch_products['name']; ?></div>
                    <div class="price">₱<?php echo $fetch_products['price']; ?></div>
                    <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
                    <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>&image=<?php echo $fetch_products['image']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
                </div>
                <?php
            }
        } else {
            echo '<p class="empty">No products found!</p>';
        }
        ?>
    </div>
</section>

<!-- Edit Product Form -->
<section class="edit-product-form">

    <?php
    // Check if an update has been requested via the 'update' GET parameter
    if (isset($_GET['update'])) {
        $update_id = $_GET['update'];
        $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');

        // Display the form only if the product exists
        if (mysqli_num_rows($update_query) > 0) {
            while ($fetch_update = mysqli_fetch_assoc($update_query)) {
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Hidden fields to keep track of the product being updated -->
                    <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
                    <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">

                    <!-- Display current product image -->
                    <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">

                    <!-- Fields for editing product name, price, and image -->
                    <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="Enter product name">
                    <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="Enter product price">
                    <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">

                    <!-- Submit button to apply changes -->
                    <input type="submit" value="update" name="update_product" class="btn">

                    <!-- Cancel button to reset the form -->
                    <input type="reset" value="cancel" id="close-update" class="option-btn">
                </form>
                <?php
            }
        }
    } else {
        // If no update is requested, hide the edit-product-form section
        echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
    }
    ?>
</section>

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>
<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>

   
<!<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="asserts/css/User profile.css">
    <link rel="stylesheet" href="asserts/css/Menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,500;0,800;0,900;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header" id="myHeader">
        <header>
            <a href="Index.html" class="logo"><img src="asserts/images/Logo2-removebg-preview.png" alt=""></a>
            <ul class="navigation_menu">
                <li><a href="Index.html"> Home </a></li>
                <li><a href="Aboutus.html"> About Us </a></li>
                <li><a href="menu page.html"> Menu </a></li>
                <li><a href="FAQ.html"> FAQ </a></li>
                <li><a href="Contactus.html"> Contact Us </a></li>
            </ul>
            <div class="navigation-icons">
                <a href="#"> <i class='bx bx-search' id="search-icon"></i> </a>
                <a class="active" href="Signup.html"> <i class='bx bx-user' ></i> </a>
                <a href="#"> <i class='bx bx-cart' ></i> </a>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </header>
        <form action="" id="search-form">
            <input type="search" placeholder="Search here...." name="" id="search-box">
            <i class='fa fa-times' id="exit" ></i>
        </form>
    </div>
	<br>
		<br>
			<br>
				<br>
					<br>
				<br>
<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>


<script src="script.js"></script>

</body>
</html>
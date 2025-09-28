<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      echo "<div class='empty'>product added succesfully</div>";
   }else{
      echo "<div class='empty'>No product added</div>";
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      echo "<div class='empty'>product deleted</div>";
   }else{
      header('location:admin.php');
      echo "<div class='empty'>product couldn't deleed</div>";
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
echo "<div class='empty'>product added succesfully</div>";
      header('location:admin.php');
   }else{
echo "<div class='empty'>No product added</div>";
      header('location:admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="asserts/css/User profile.css">
    <link rel="stylesheet" href="asserts/css/Menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,500;0,800;0,900;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
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

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <button type="submit" value="add the product" name="add_product" class="btn"> Add a product </button>
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <button type="submit" value="update the prodcut" name="update_product" class="btn"> Update Product </button>
      <button type="reset" value="cancel" id="close-edit" class="option-btn"> Reset </button>
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
   

</section>

</div>


<section class="footer">
        <div class="info">
            <div class="f-info">
                <img src="asserts/images/Logo2-removebg-preview.png" alt="">
                <p><br>No.46/1 ,<br>Mihidu Mawatha ,<br> Kurunegala . </p>
                <p>+94(0) 377 204 204</p>
                <p>info@BurgerBuddy.lk</p>
            </div>
            <div class="s-info">
                <h4>Suuport</h4>
                <p>About Us</p>
                <p>Contact Us</p>
                <p>Privacy policy</p>
                <p>FAQ</p>
                <p>About Us</p>
            </div>
            <div class="t-info">
                <h4>Shop</h4>
                <p>Trending Burgers</p>
                <p>Burger towers</p>
            </div>
            <div class="fo-info">
                <h4>Company</h4>
                <p>About US</p>
                <p>Contact US</p>
            </div>
            <div class="fi-info">
                <h4>Legal</h4>
                <p>Rerms of services</p>
                <p>Privacy policy</p>
                <p>Accesibility</p>
            </div>
        </div>
    </section>

    <div class="E-text">
        <p>TM & Copyright 2023 Burger Buddy. All Rights Reserved.</p><br>
        <p>Designed By Deshan D Gunathilaka</p>
    </div>

    <script src="java.js"></script>
    <script>
        function showSection(sectionId) {
            var sections = document.querySelectorAll('.accountsettings, .yourorders');
            sections.forEach(function(section) {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>

<?php
require_once('config.php');

if (isset($_POST['add_product'])) {
    $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $p_price = mysqli_real_escape_string($conn, $_POST['p_price']);
    $p_image = $_FILES['p_image'];
    $p_image_folder = 'uploaded_img/' . basename($p_image['name']);

    $insert_query = mysqli_prepare($conn, "INSERT INTO `products` (name, price, image) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($insert_query, "sss", $p_name, $p_price, $p_image_folder);
    
    if (mysqli_stmt_execute($insert_query)) {
        move_uploaded_file($p_image['tmp_name'], $p_image_folder);
        $message = 'Product added successfully';
    } else {
        $message = 'Could not add the product';
    }
    mysqli_stmt_close($insert_query);
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or die('query failed');
    if ($delete_query) {
        header('location: admin.php');
        $message = 'Product has been deleted';
    } else {
        header('location: admin.php');
        $message = 'Product could not be deleted';
    }
}

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = mysqli_real_escape_string($conn, $_POST['update_p_name']);
    $update_p_price = mysqli_real_escape_string($conn, $_POST['update_p_price']);
    $update_p_image = $_FILES['update_p_image'];
    $update_p_image_folder = 'uploaded_img/' . basename($update_p_image['name']);

    $update_query = mysqli_prepare($conn, "UPDATE `products` SET name = ?, price = ?, image = ? WHERE id = ?");
    mysqli_stmt_bind_param($update_query, "sssi", $update_p_name, $update_p_price, $update_p_image_folder, $update_p_id);

    if (mysqli_stmt_execute($update_query)) {
        move_uploaded_file($update_p_image['tmp_name'], $update_p_image_folder);
        $message = 'Product updated successfully';
        header('location: admin.php');
    } else {
        $message = 'Product could not be updated';
        header('location: admin.php');
    }
    mysqli_stmt_close($update_query);
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
    <style>
 /* General Styles */

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Add Product Form Styles */
.add-product-form {
    max-width: 500px;
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    margin: 0 auto;
    margin-top: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.add-product-form h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #333;
    text-transform: uppercase;
    text-align: center;
}

.add-product-form .box {
    padding: 12px 14px;
    font-size: 17px;
    color: #333;
    border-radius: 4px;
    background-color: #fff;
    margin: 10px 0;
    width: 100%;
    border: 1px solid #ccc;
}

/* Display Product Table Styles */
.display-product-table table {
    width: 100%;
    text-align: center;
    border-collapse: collapse;
}

.display-product-table table thead th {
    padding: 15px;
    font-size: 20px;
    background-color: #333;
    color: #fff;
    border: 1px solid #333;
}

.display-product-table table td {
    padding: 15px;
    font-size: 20px;
    color: #333;
    border: 1px solid #ccc;
}

.display-product-table table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.display-product-table .empty {
    margin-bottom: 20px;
    text-align: center;
    background-color: #fff;
    color: #333;
    font-size: 20px;
    padding: 15px;
    border: 1px solid #ccc;
}

/* Edit Form Container Styles */
.edit-form-container {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1100;
    background-color: rgba(0, 0, 0, 0.8);
    padding: 20px;
    display: none;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    width: 100%;
}

.edit-form-container form {
    width: 500px;
    border-radius: 8px;
    background-color: #fff;
    text-align: center;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.edit-form-container form .box {
    width: 100%;
    background-color: #f9f9f9;
    border-radius: 4px;
    margin: 10px 0;
    font-size: 17px;
    color: #333;
    padding: 12px 14px;
}

/* Additional Styles for Product Boxes */
.box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, 350px);
    gap: 15px;
    justify-content: center;
}

.box-container .box {
    text-align: center;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    border-radius: 8px;
}

.box-container .box img {
    height: 100px;
}

.box-container .box h3 {
    margin: 10px 0;
    font-size: 24px;
    color: #333;
}

.box-container .box .price {
    font-size: 24px;
    color: #333;
}
.edit-form-container{
   position: fixed;
   top:0; left:0;
   z-index: 1100;
   background-color: var(--dark-bg);
   padding:2rem;
   display: none;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
   width: 100%;
}

.edit-form-container form{
   width: 50rem;
   border-radius: .5rem;
   background-color: var(--white);
   text-align: center;
   padding:2rem;
}

.edit-form-container form .box{
   width: 100%;
   background-color: var(--bg-color);
   border-radius: .5rem;
   margin:1rem 0;
   font-size: 1.7rem;
   color:var(--black);
   padding:1.2rem 1.4rem;
   text-transform: none;
}
        </style>
</head>

<body>

    <?php if (isset($message)) : ?>
        <div class="message">
            <span><?php echo $message; ?></span>
            <img src="uploaded_img/header.jpg" id="ugly" alt="icon" width="50px" height="50px" style="cursor: pointer;" onclick="this.parentElement.style.display = 'none';" />
        </div>
    <?php endif; ?>

 

    <div class="container">

        <section>

            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>Add a new product</h3>
                <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
                <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
                <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                <button type="submit" form="form1" value="Submit">Submit</button>
            </form>

        </section>

        <section class="display-product-table">

            <table>

                <thead>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($row = mysqli_fetch_assoc($select_products)) :
                    ?>

                            <tr>
                                <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>$<?php echo $row['price']; ?>/-</td>
                                <td>
                                    <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                </td>
                            </tr>

                    <?php endwhile;
                    } else {
                        echo "<div class='empty'>No product added</div>";
                    }
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
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
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

</body>

</html>

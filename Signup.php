<?php
session_start();
require_once('connection.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width,inetial-scale=1.0"> 
	<title> Burger Buddy </title>
	
<link rel="stylesheet" href="asserts/css/LoginCss.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,500;0,800;0,900;1,200;1,300;1,400&display=swap" 
	 rel="stylesheet">
	 
	
	<link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  
</head>

<body>
	<div class="header" id="myHeader">
	<header>
	
		<a href="Index.html" class="logo"><img src="asserts/images/Logo2-removebg-preview.png" alt=""></a>
		
		<ul class="navigation_menu">
			<li><a href="Index.html"> Home </a></li>
			<li><a href="Aboutus.html"> About Us </a></li>
			<li><a href="menu page.php"> Menu </a></li>
			<li><a href="FAQ.html"> FAQ </a></li>
		    <li><a href="Contactus.php"> Contact Us </a></li>
			
		</ul>
		
		<div class="navigation-icons">
			<a href="#"> <i class='bx bx-search' id="search-icon">
				</i> </a>
			<a href="Signup.html" class="active" > <i class='bx bx-user' ></i> </a>
			<a href="#"> <i class='bx bx-cart' ></i> </a>
		
		<div class="bx bx-menu" id="menu-icon"></div>
	</div>
	</div>
	</header>
	<form action="" id="search-form">
	<input type="search" placeholder="Search here...." name="" id="search-box">
   <i class='fa fa-times' id="exit" ></i>
	</form>	
	</header>
<body>
	<div class="wrapper">
		<form action="Signup.php" method="post">
		<h2>Sign up</h2>
		<p>Sign up with following options</p>
		<label for = "">Name</label>
		<input type="text" id="txtName" name="txtFullName">
		<label for = "">E-mail</label>
		<input type="email" id="txtEmail" name="txtEmail">
		<label for = "">Phone Number</label>
		<input type="tel" id="txtContact" name="txtContact">
		<label for = "">Password</label>
		<input type="password" id="txtPassword" name="txtPassword">
		<label for = "">Confirm Password</label>
		<input type="password" id="txtConfirmPassword" name="txtConfirmPassword">
		<button id="submit" name="submit">Sign Up</button>
		<p>
			Already have an account ? <a href="Login.html">
			Log in</a>
		</p>
		</form>
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
<?php

    if (isset($_POST["submit"])) { 

        $name = $_POST["txtFullName"];
        $email = $_POST["txtEmail"];
        $contact = $_POST["txtContact"];
        $password = $_POST["txtPassword"];
        $chkPassword = $_POST["txtConfirmPassword"];

        if ($password === $chkPassword) {
            $sql = "INSERT INTO user(name, Email, contact, Password,chkPassword ) VALUES ('$name','$email','$contact','$password','$chkPassword')";
            mysqli_query($conn, $sql);

            header('location: login.php');
            exit();
        } else {
            header('location: Signup.html?error=password_mismatch');
            exit();
        }
    } 
	elseif (isset($_POST["btnlogin"])) { 

        $username = $_POST["txtLogEmail"];
        $password = $_POST["txtLogPassword"];

        $sqlLogin = "SELECT * FROM user WHERE Email = '$username' AND Password='$password'";
        $result = mysqli_query($conn, $sqlLogin);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["UserId"] = $row['UserID'];
            header('location: index.php');
            exit();
        } else {
            header('location: login.php?error=invalid_credentials');
            exit();
        }
    }
	mysqli_close($conn);



?>

</html>
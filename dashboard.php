<html>
<head>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width,inetial-scale=1.0"> 
	<title> Menu </title>
	
<link rel="stylesheet" href="asserts/css/Menu.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,500;0,800;0,900;1,200;1,300;1,400&display=swap" 
	 rel="stylesheet">
	 
	
	<link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
        }

        header {
            background-color: black;
            color: #fff;
            text-align: center;
          
        }

        nav {
            display: flex;
            background-color: black;
            justify-content: center;
            padding: 10px;
        }

        button {
            background-color: white;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 10px;
        }

        button:hover {
            background-color: black;
			color: white;
        }

        section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.529);
            margin: 20px auto;
            padding: 20px;
            display: none;
            max-width: 800px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }


        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
 
    </style> 
</head>

<body>
	<div class="header" id="myHeader">
	<header>
	
		<a href="Index.html" class="logo"><img src="asserts/images/Logo2-removebg-preview.png" alt=""></a>
		
		<ul class="navigation_menu">
			<li><a href="Index.html"> Home </a></li>
			<li><a href="Aboutus.html"> About Us </a></li>
			<li><a  href="menu page.html"> Menu </a></li>
			<li><a  href="FAQ.html"> FAQ </a></li>
			<li><a class="active" href="#"> Contact Us </a></li>
			
		</ul>
		
		<div class="navigation-icons">
			<a href="#"> <i class='bx bx-search'></i> </a>
			<a href="Signup.html"> <i class='bx bx-user' ></i> </a>
			<a href="#"> <i class='bx bx-cart' ></i> </a>
		
		<div class="bx bx-menu" id="menu-icon"></div>
	</div>
	</div>
	</header>
<br>
<br>
<br>
<br>
<br>

<br><br>
<br>

<br>
    <nav>
        <button onclick="showSection('user')">User Management</button>
        <button onclick="showSection('product')">Product Management</button>
        <button onclick="showSection('order')">Order Management</button>
        <button onclick="showSection('faq')">FAQ Management</button>
    </nav>

    <section id="user" style="display: block;">
        <h2>User Management</h2>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" required><br>
    
            <label for="email">Email:</label>
            <input type="email" id="email" required><br>
    
            <label for="address">Address:</label>
            <input type="text" id="address" required><br>
    
            <label for="postalCode">Postal Code:</label>
            <input type="text" id="postalCode" required><br>
    
            <label for="password">Password:</label>
            <input type="password" id="password" required><br>
    
            <button type="button" onclick="addCustomer()">Add Customer</button>
        </form>
    </section>
    

    <section id="product">
        <h2>Product Management</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>$19.99</td>
                    <td>Edit | Delete</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>$29.99</td>
                    <td>Edit | Delete</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="order">
        <h2>Order Management</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456</td>
                    <td>Product 1</td>
                    <td>2</td>
                    <td>$39.98</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="faq">
        <h2>FAQ Management</h2>
        <ul>
            <li>
                <strong>Question 1:</strong> How do I place an order?
                <p>Answer: To place an order, go to the product page, select the quantity, and click the "Add to Cart" button.</p>
            </li>
            <li>
                <strong>Question 2:</strong> Can I cancel my order?
                <p>Answer: Yes, you can cancel your order within 24 hours of placing it. Contact our support for assistance.</p>
            </li>
        </ul>
    </section>
<br>

<br>
<br>
<br>

<div class="E-text">
	<p>TM & Copyright 2023 Burger Buddy. All Rights Reserved.</p><br>
	<p>Designed By Deshan D Gunathilaka</p>
</div>
	
	<script src="java.js"></script>
	<script>
	        function showSection(sectionId) {
            // Hide all sections
            var sections = document.querySelectorAll('section');
            sections.forEach(function(section) {
                section.style.display = 'none';
            });

            // Show the selected section
            document.getElementById(sectionId).style.display = 'block';
        }
	</script>
</body>
</html>
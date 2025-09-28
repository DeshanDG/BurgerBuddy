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

    <div class="userprofile">
        <div class="userprofilein">
            <div class="left">
                <h2 onclick="showSection('accountSettings')"><i class='bx bx-cog'></i> Personal Info </h2>
                <h2 onclick="showSection('changePassword')"><i class='bx bx-lock-open'></i> Account Settings</h2>
                <h2 onclick="showSection('purchaseHistory')"><i class='bx bx-history'></i> Purchase History</h2>
                <h2 onclick="showSection('trackOrder')"><i class='bx bxl-product-hunt'></i> Order Tracking </h2>
                <h2><i class='bx bx-log-out'></i> Log Out </h2>
            </div>
            <div class="right">
                <div id="accountSettings" class="accountsettings">
                    <h1 class="mainhead1">Personal Information</h1>
                    <div class="form">
                        <br>
                        <div class="form-group">
                            <label>Your name <span>*</span></label>
                            <p id="name">Deshan D gunathilaka</p> <br>
                        </div>
                        <div class="form-group">
                            <br><label>Phone / Mobile <span>*</span></label>
                            <p id="Pno">+94 567 5670</p> <br>
                        </div>
                        <div class="form-group">
                            <br><label>E mail <span>*</span></label>
                            <p id="email">deshanD@gmail.com</p><br>
                        </div>
                    </div>
                </div>

                <div id="changePassword" class="accountsettings" style="display: none;">
                    <h1 class="mainhead1">Account Settings</h1>
                    <div class="form">
                        <div class="form-group">
                            <label>Your name <span>*</span></label>
                            <input type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Phone / Mobile <span>*</span></label>
                            <input type="tel" required>
                        </div>
                        <div class="form-group">
                            <label>E mail <span>*</span></label>
                            <input type="email" required>
                        </div>
                        <button class="mainbutton1">Save changes</button>
                    </div>
                </div>

                <div id="purchaseHistory" class="yourorders" style="display: none;">
                    <h1 class="mainhead1">Your Orders</h1>
                    <div class="yourorderstable">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Order Date</th>
                                    <th>Expected Date</th>
                                    <th>Payment Method</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>11553</td>
                                    <td>Dewmi</td>
                                    <td>2/5/2019</td>
                                    <td>1/12/2024</td>
                                    <td>Credit card</td>
                                    <td>unvaluable</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="trackOrder" class="accountsettings" style="display: none;">
                    <h1 class="mainhead1">Current Orders</h1>
                    <div class="yourorderstable">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Order Date</th>
                                    <th>Payment Method</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>11553</td>
                                    <td>Dewmi</td>
                                    <td>2/5/2019</td>
                                    <td>Credit card</td>
                                    <td>unvaluable</td>
                                    <td>Shipped</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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

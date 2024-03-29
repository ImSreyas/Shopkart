<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/home.css">
    <script src="popup-notification/popup-notification.js"></script>
    <?php include('loader/loading-div.html') ?>
    <script src="js/responsiveNavigation.js" defer></script>
</head>

<body>
    <script defer>
        history.replaceState({}, '', 'http://localhost/shop-finder/index.php')
    </script>
    <!-- menu start -->
    <nav class="nav-bar" responsiveNavigation=false>
        <ul>
            <a href="index.php" class="no-text-decoration">
                <li class="index highlight">home</li>
            </a>
            <a href="search.php" class="no-text-decoration">
                <li class="category">search</li>
            </a>
            <a href="order.php" class="no-text-decoration">
                <li class="order">orders</li>
            </a>
            <a href="profile.php" class="no-text-decoration">
                <li class="profile">profile</li>
            </a>
            <?php
            $user = (!isset($_SESSION['customer-id'])) ? "<a href='log-in.php' class='no-text-decoration'><li class='login'>log in</li></a>" :
                "<a href='log-out.php' class='no-text-decoration'><li class='login'>log out</li></a>";
            echo $user;
            ?>
            <?php
            if (isset($_SESSION['customer-id'])) {
                include('data-base/constant.php');
                $id = $_SESSION['customer-id'];
                $sql1 = "select profile_image from customer where id=$id";
                $res = mysqli_query($conn, $sql1);
                while ($row = $res->fetch_assoc()) {
                    echo "
                    <li class='sre-icon-list'>
                    <a href='profile.php' class='sre-icon-link'>
                    <div class='sre-main-small-image-container'>
                    <div class='sre-profile-image-small-container'>
                    <img src='" . $row['profile_image'] . "' class='sre-img'>
                    </div>
                    </div>
                    </a></li>
                    ";
                }
            }
            ?>
        </ul>
        <button class="nav-button"></button>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Grocery</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Vegetable Shop</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Meat</div>
            </a>
        </div>
        <div class="image-container fir">
            <?php include('animated/category-image-1.html'); ?>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-2.html'); ?>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Digital Electronics</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Home Appliances</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Mobile Phones</div>
            </a>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Electronics</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Computer H/S & Accessories</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Home Decor Items</div>
            </a>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-3.html'); ?>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-4.html'); ?>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Clothing</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Footwear</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Fashion Accessories</div>
            </a>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Jewellery</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Health & Beauty Supplements</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Ladies Center</div>
            </a>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-5.html'); ?>
        </div>

        <div class="image-container">
            <?php include('animated/category-image-6.html'); ?>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Sports & Fitness Equipments</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Toys & Games</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Baby Care Products</div>
            </a>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Medical shops</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Kitchen Wears</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Garden Wears</div>
            </a>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-7.html'); ?>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-8.html'); ?>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Book Store</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Study Materials</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Printing Store</div>
            </a>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Restaurants</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Bakery</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Fruit Shops</div>
            </a>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-9.html'); ?>
        </div>
        <div class="image-container">
            <?php include('animated/category-image-10.html'); ?>
        </div>
        <div class="category-main-container">
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Furniture</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Showrooms</div>
            </a>
            <a href="category-page.php?category=''" class="category-link">
                <div class="category-container">Workshops</div>
            </a>
        </div>
    </div>
    <script>
        Array.prototype.forEach.call(document.querySelectorAll(".category-container"),
            (name, index) => {
                name.parentElement.setAttribute("href", "search.php?category=" + name.innerHTML)
            })
    </script>
    <!--footer-->
    <?php include('elements/footer.html') ?>
<?php session_start(); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/ORDER.css">
    <link rel="stylesheet" href="css/load.css">
</head>

<body>
    <?php include('loader/loading-div.html'); ?>
    <script src="js/loading-div-too-slow.js"></script>
    <script>
        window.history.replaceState({}, '', 'order.php')
    </script>

    <!-- menu start -->
    <nav class="nav-bar">
        <ul>
            <a href="index.php" class="no-text-decoration">
                <li class="index ">home</li>
            </a>
            <a href="search.php" class="no-text-decoration">
                <li class="category ">search</li>
            </a>
            <a href="order.php" class="no-text-decoration">
                <li class="order highlight">order</li>
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
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">
        <?php 
        if (!isset($_SESSION['customer-id'])) {
        echo "<div class='user-not-found'>
            <div class='user-not-logged-in-container'>
            ";
        include('animated/user-not-logged-in.html');
        echo "
            <div class='question'>Please login to see the orders...!</div>
            <a href='log-in.php' class='p-t-l-link'>
            <div class='profile-to-log-in-page-link-container'>log in</div>
            </a>
            </div>
            </div>";
    }
    ?>

    </div>
    <!--footer-->
    <?php include('elements/footer.html') ?>
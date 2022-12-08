<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/log-out.css">
</head>

<body class="my-body">


    <!-- menu start -->
    <nav class="nav-bar">
        <ul>
            <a href="index.php" class="no-text-decoration">
                <li class="index ">home</li>
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
            <a href="log-out.php" class="no-text-decoration">
                <li class="login highlight">log out</li>
            </a>
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
        if (isset($_POST['submit'])) {
            unset($_SESSION['customer-id']);
            header("location:index.php?from=logging_out");
        }
        ?>

        <div class="logout-container">
            <div class="image-container">
                <?php include('animated/customer-logout-confirmation.html'); ?>
            </div>
            <div class="confirmation-message">
                Are you sure you want to log out ...?
            </div><br>
            <div class="yesno-container">
                <div class="btn">
                    <a href="index.php" class="noBtn">no</a>
                </div>
                <form action="" method="POST">
                    <input type="submit" name="submit" class="btn-confirm" value="yes">
                </form>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php include('elements/footer.html') ?>
<?php
session_start();
if (!isset($_SESSION['seller-id'])) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seller</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="../css/log-out.css">
</head>

<body class="my-body">


    <!-- menu start -->
    <nav class="nav-bar">
        <ul>
            <a href="seller-index.php" class="no-text-decoration">
                <li class="request">request</li>
            </a>
            <a href="delivery.php" class="no-text-decoration">
                <li class="delivery">delivery</li>
            </a>
            <a href="list.php" class="no-text-decoration">
                <li class="list">list</li>
            </a>
            <a href="product.php" class="no-text-decoration">
                <li class="product">product</li>
            </a>
            <a href="control.php" class="no-text-decoration">
                <li class="control">control</li>
            </a>
            <a href="profile.php" class="no-text-decoration">
                <li class="profile">profile</li>
            </a>
            <a href="log-out.php" class="no-text-decoration">
                <li class="log-out highlight">log out</li>
            </a>
        </ul>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">


        <?php
        if (isset($_POST['submit'])) {
            unset($_SESSION['seller-id']);
            header("location:../index.php?from=logging_out");
        }
        ?>

        <div class="logout-container">
            <div class="image-container">
                <?php include('../animated/customer-logout-confirmation.html'); ?>
            </div>
            <div class="confirmation-message">
                Are you sure you want to log out ...?
            </div><br>
            <div class="yesno-container">
                <div class="btn">
                    <a href="seller-index.php" class="noBtn">no</a>
                </div>
                <form action="" method="POST">
                    <input type="submit" name="submit" class="btn-confirm" value="yes">
                </form>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php include('../elements/forgot-pass-footer.html') ?>
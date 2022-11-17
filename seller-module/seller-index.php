<?php 
session_start();
if(!isset($_SESSION['seller-id'])){
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seller</title>
    <link rel="stylesheet" href="../css/load.css">
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/product-page.css">
</head>

<body class="my-body">
<?php include('../loader/loading-div.php'); ?>
<script src="../js/loading-div-slow.js"></script>
<script defer>history.replaceState({},'','http://localhost/shop-finder/seller-module/seller-index.php')</script>

    <!-- menu start -->
    <nav class="nav-bar">
        <ul>
            <a href="seller-index.php" class="no-text-decoration">
                <li class="request highlight">request</li>
            </a>
            <a href="delivery.php" class="no-text-decoration">
                <li class="delivery">delivery</li>
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
                <li class="log-out">log out</li>
            </a>
        </ul>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">
        
    </div>
    <!--footer-->
    <?php include('../elements/forgot-pass-footer.php') ?>
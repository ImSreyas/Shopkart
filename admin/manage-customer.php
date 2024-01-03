<?php
session_start();
if ($_SESSION['admin-id'] != 1) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="css/cu-ma.css">
    <script src='../jquery/jquery.js'></script>
    <script src='js/manage-customer.js' defer></script>
    <script src="../js/responsiveNavigation.js" defer></script>
</head>

<body class="real-body">
    <!-- menu -->
    <nav class="nav-bar" responsiveNavigation=false>
        <ul>
            <a href="manage-seller.php" class="no-text-decoration">
                <li class="category">manage seller</li>
            </a>
            <a href="manage-customer.php" class="no-text-decoration">
                <li class="order highlight">manage customer</li>
            </a>
            <a href="system.php" class="no-text-decoration">
                <li class="profile">system control</li>
            </a>
            <a href="log-out.php" class="no-text-decoration">
                <li class="login">log out</li>
            </a>
        </ul>
        <button class="nav-button"></button>
    </nav>
    <!-- body -->
    <div class="btn-container-wrapper">
        <div class="search-bar-wrapper">
            <?php include('../search-bar/search-bar.html') ?>
        </div>
        <div class="btn-container">
            <button class="users-btn" selected=true onclick="btnClicked(1)">Users</button>
            <button class="removed-btn" selected=false onclick="btnClicked(2)">Removed</button>
        </div>
    </div>
    <div class="body admin-body">
        <!-- //-data comes here  -->
    </div>
</body>

</html>
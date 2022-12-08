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
</head>

<body class="real-body">
    <!-- menu -->
    <nav class="nav-bar">
        <ul>
            <a href="admin.php" class="no-text-decoration">
                <li class="index">request</li>
            </a>
            <a href="manage-seller.php" class="no-text-decoration">
                <li class="category">manage seller</li>
            </a>
            <a href="manage-customer.php" class="no-text-decoration">
                <li class="order">manage customer</li>
            </a>
            <a href="system.php" class="no-text-decoration">
                <li class="profile highlight">system control</li>
            </a>
            <a href="log-out.php" class="no-text-decoration">
                <li class="login">log out</li>
            </a>
        </ul>
    </nav>
    <!-- body -->
    <div class="body admin-body">

    </div>
</body>

</html>
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
    <link rel="stylesheet" href="../css/log-out.css">


</head>

<body class="real-body">


    <?php
    if (isset($_POST['submit'])) {
        unset($_SESSION['admin-id']);
        header("location:../index.php?from=logging_out&duration=2000");
    }
    ?>


    <!-- menu -->
    <nav class="nav-bar">
        <ul>
            <a href="manage-seller.php" class="no-text-decoration">
                <li class="category">manage seller</li>
            </a>
            <a href="manage-customer.php" class="no-text-decoration">
                <li class="order">manage customer</li>
            </a>
            <a href="system.php" class="no-text-decoration">
                <li class="profile">system control</li>
            </a>
            <a href="log-out.php" class="no-text-decoration">
                <li class="login highlight">log out</li>
            </a>
        </ul>
    </nav>
    <!-- body -->
    <div class="body1 main-height">


        <?php
        if (isset($_POST['submit'])) {
            session_destroy();
            header("location:../index.php?from=logging_out&duration=2000");
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
                    <a href="admin.php" class="noBtn">no</a>
                </div>
                <form action="" method="POST">
                    <input type="submit" name="submit" class="btn-confirm" value="yes">
                </form>
            </div>
        </div>
    </div>

</body>

</html>
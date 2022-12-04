<?php
session_start();
if (!isset($_SESSION['seller-id'])) {
    header('location:../index.php');
}
include('../data-base/constant.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seller</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/control.css">
    <script async>
        history.replaceState({}, '', window.location.href)
    </script>
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
                <li class="control highlight">control</li>
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
    <?php
    $id = $_SESSION['seller-id'];

    if (isset($_POST['oc'])) {

        $sql164 = "select shop_status from seller where id='$id'";
        $res164 = mysqli_query($conn, $sql164);
        while ($row164 = $res164->fetch_assoc()) {
            if ($row164['shop_status'] == 0) {
                $sql891 = "update seller set shop_status=1 where id='$id'";
                $res891 = mysqli_query($conn, $sql891);
            } else {
                $sql892 = "update seller set shop_status=0 where id='$id'";
                $res892 = mysqli_query($conn, $sql892);
            }
        }
    }
    if (isset($_POST['hd'])) {

        $sql164 = "select home_delivery from seller where id='$id'";
        $res164 = mysqli_query($conn, $sql164);
        while ($row164 = $res164->fetch_assoc()) {
            if ($row164['home_delivery'] == 0) {
                $sql891 = "update seller set home_delivery=1 where id='$id'";
                $res891 = mysqli_query($conn, $sql891);
            } else {
                $sql892 = "update seller set home_delivery=0 where id='$id'";
                $res892 = mysqli_query($conn, $sql892);
            }
        }
    }

    $sql154 = "select home_delivery,shop_status from seller where id='$id'";
    $res154 = mysqli_query($conn, $sql154);
    while ($row = $res154->fetch_assoc()) {
        if ($row['shop_status'] == 0) $stat = "Closed";
        else $stat = "Opened";
        if ($row['home_delivery'] == 0) $del = "Not available";
        else $del = "Available";
    }
    if (isset($_POST['delete'])) {
        header("location:delete-account.php");
    }
    ?>

    <div class="body1 main-height">
        <div class="main-container">
            <div class="button-container-inside">
                <form action="" method="POST">
                    <div class="btn-container1">
                        <div class="div1-header">Shop status</div>
                        <div class="div1-content"><?php echo $stat; ?></div>
                        <button type="submit" name="oc"></button>
                    </div>
                    <div class="btn-container2">
                        <div class="div2-header">Home delivery</div>
                        <div class="div2-content"><?php echo $del; ?></div>
                        <button type="submit" name="hd"></button>
                    </div>
                    <div class="btn-container3">
                        <div class="div3-header">Delete your account</div>
                        <button type="submit" name="delete">are</button>
                    </div>
                </form>
            </div>
            <div class="animation-container-right">
                <?php include('../animated/seller-control-page.html'); ?>
            </div>
        </div>
    </div>


    <!-- body end -->


    <!--footer-->
    <?php include('../elements/forgot-pass-footer.html') ?>
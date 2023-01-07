<?php
session_start();
include('../data-base/constant.php');
if (!isset($_SESSION['seller-id'])) {
    header('location:../index.php');
} else {
    $seller_id = $_SESSION['seller-id'];
}
?>
<?php
if (isset($_POST['submit'])) {
    $value = explode(',', $_POST['submit']);
    $a = $value[0];
    $b = $value[1];
    mysqli_query($conn, "UPDATE order_list SET delivery_stage='3' WHERE c_id='$a' && id='$b'");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/delivery.css">

    <script src="../js/responsiveNavigation.js" defer></script>
</head>

<body class="my-body">


    <!-- menu start -->
    <nav class="nav-bar" responsiveNavigation=false>
        <ul>
            <a href="seller-index.php" class="no-text-decoration">
                <li class="request">request</li>
            </a>
            <a href="delivery.php" class="no-text-decoration">
                <li class="delivery highlight">delivery</li>
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
                <li class="log-out">log out</li>
            </a>
        </ul>
        <button class="nav-button"></button>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">
        <div class="main-body-inside">
            <?php
            $check = 0;
            $double_check = 0;
            $res551 = mysqli_query($conn, "SELECT * FROM order_list WHERE s_id='$seller_id' && active='1' && delivery_stage='2'");
            if ($res551->num_rows != 0) {
                while ($row551 = $res551->fetch_assoc()) {
                    if ($check != $row551['id'] || $double_check != $row551['c_id']) {
                        $double_check = $row551['c_id'];
                        $check = $row551['id'];
                        $name = $row551['c_id'];
                        $location_new = $row551['location'];
                        $total_money = $row551['total'];
                        $del = ($row551['delivery'] == 0) ? "Pick up from shop" : "Home delivery";


                        $res656 = mysqli_query($conn, "SELECT name FROM customer WHERE id='$name'");
                        while ($row552 = $res656->fetch_assoc()) {
                            $name_new = $row552['name'];
                            break;
                        }


                        echo "
                    <div class='child-container'>
                    <div class='name-container'>" . ucfirst($name_new) . "</div>
                    <div class='location-container'>" . $location_new . "</div>
                    <div class='delivery-container'>" . $del . "</div>
                    <div class='total-money-container'>₹" . $total_money . "</div>
                    <div class='OFD-container'>
                    <form action='' method='POST'>
                    <button type='submit' name='submit' class='OFD-btn' value='" . $double_check . "," . $check . "'>Out for delivery</button>
                    </form>
                    </div>
                    </div>
                    ";
                    }
                }
                echo "</div>";
            } else {
                echo "</div>";
                echo "<div class='no-result'>";
                include('../animated/no-data-d.html');
                echo "</div>";
            }

            ?>
            <!--footer-->
            <?php include('../elements/forgot-pass-footer.html') ?>
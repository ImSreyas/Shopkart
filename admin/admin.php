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
    <link rel="stylesheet" href="css/front.css">
</head>

<body class="real-body">
    <!-- menu -->
    <nav class="nav-bar">
        <ul>
            <a href="admin.php" class="no-text-decoration">
                <li class="index highlight">request</li>
            </a>
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
                <li class="login">log out</li>
            </a>
        </ul>
    </nav>
    <!-- body -->
    <div class="admin-body">
        <?php
        include('../data-base/constant.php');


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $sql = "select * from seller";
            $res = mysqli_query($conn, $sql);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $id = $row['id'];
                    if (isset($_POST[$id])) {
                        if ($_POST[$id] == "Accept") {
                            $sql1 = "update seller set status=1 where id=$id";
                            mysqli_query($conn, $sql1);
                        } elseif ($_POST[$id] == "Reject") {
                            $sql2 = "update seller set status=-1 where id=$id";
                            mysqli_query($conn, $sql2);
                        }
                    }
                }
            }
        }

        $sql = "select * from seller where status=0";
        $res = mysqli_query($conn, $sql);



        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $comma = ($row['phone2'] == "0" || $row['phone2'] == "") ? "" : " , ";
                $phn_2 = ($row['phone2'] == "0") ? "" : $row['phone2'];

                echo "
                <div class='request-container'>
                    <div class='seller-img-container'>
                    <img class='img-inside' src='../" . $row['cover_img'] . "'></div>
                    <div class='shop-name'>" . ucfirst($row['shop_name']) . "</div>
                    <div class='seller-details'>
                    <div class='shop-license-no'>" . $row['license_no'] . "</div>
                    <div class='shop-location'>" . $row['location'] . "</div>
                    <div class='shop-category'>" . $row['category'] . "</div>
                    <div class='shop-email'>" . $row['email'] . "</div>
                    <div class='shop-phone1'>" . $row['phone1'] . $comma . $phn_2 . "</div>
                    </div>
                    <form action='' method='POST'>
                    <input type='submit' class='accept' value='Accept' name='" . $row['id'] . "'><br>
                    <input type='submit' class='reject' value='Reject' name='" . $row['id'] . "'>
                    </form>
                </div>
                ";
            }
        }
        ?>
    </div>
</body>

</html>
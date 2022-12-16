<?php session_start();
include('data-base/constant.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/search.css">
    <script src="javaScript/getShops.js" defer></script>
    <script src="jquery/jquery.js"></script>
</head>


<!-- menu start -->
<nav class="nav-bar">
    <ul>
        <a href="index.php" class="no-text-decoration">
            <li class="index">home</li>
        </a>
        <a href="search.php" class="no-text-decoration">
            <li class="category highlight">search</li>
        </a>
        <a href="order.php" class="no-text-decoration">
            <li class="order">orders</li>
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
<div class="btn-container-wrapper">
    <div class="search-bar-wrapper">
        <?php include('search-bar/search-bar.html')?>
    </div>
    <div class="btn-container">
        <div class="btn-container-inside">
            <button class="sort-btn" onclick="btnClicked(0)">Rating</button>
            <div show='false' class="sort-options-container" id='s1'>
                <option>Rating</option>
                <option>Alphabetical</option>
                <option>Review</option>
                <option>My location</option>
            </div>
        </div>
        <div class="btn-container-inside">
            <button class="filter-btn" onclick="btnClicked(1)">All</button>
            <div show='false' class="category-options-container" id='s2'>
                <option>All</option>
                <?php include('all/category-options/options.html') ?>
            </div>
        </div>
    </div>
</div>
<div class="body body1 main-height home" customer-id='<?php echo $_SESSION['customer-id'] ?>'>
</div>
<!--footer-->
<?php include('elements/footer.html') ?>
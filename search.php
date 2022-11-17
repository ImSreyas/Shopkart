<?php session_start(); 
include('data-base/constant.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/search.css">
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
            <li class="order">order</li>
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
            if(isset($_SESSION['customer-id'])){
                $id=$_SESSION['customer-id'];
                $sql1= "select profile_image from customer where id=$id";
                $res=mysqli_query($conn , $sql1);
                while($row = $res->fetch_assoc()){
                    echo "
                    <li class='sre-icon-list'>
                    <a href='profile.php' class='sre-icon-link'>
                    <div class='sre-main-small-image-container'>
                    <div class='sre-profile-image-small-container'>
                    <img src='".$row['profile_image']."' class='sre-img'>
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
<div class="body1 main-height home">
    <?php
    // include('data-base/constant.php');
    $sql = "select * from seller where status='1' order by rating desc";
    $res = mysqli_query($conn, $sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            if ($row['home_delivery'] == 1) $color = 'black';
            else $color = '#cfcfcf';

            if ($row['rating'] >= 3.5) $rating_color = '#00a80a';
            elseif ($row['rating'] >= 2) $rating_color = '#ff9500';
            else $rating_color = '#e80202';

            $comma = ($row['phone2'] == "") ? "" : " , ";


            echo "
                    <div class='card'>
                    <a style='color : black;' href='shop/product-page.php?id=" . $row['id'] . " ' class='no-text-decoration' target='_blank'>
                    
                    <div>
                    <div class='card-cover-image'>
                    <img class = 'cover-image-inside' src = '" . $row['cover_img'] . "' alt = 'No cover image.'>
                    </div>
                    <div class='name' style='font-size : 95%;font-weight : 900;color:#3d4d54;'> " . ucfirst($row['shop_name']) . " </div>
                    <span class='rating' style ='color : " . $rating_color . ";letter-spacing : 1px;' class='rating'> " . $row['rating'] . " </span>
                    <span><svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' style='fill:" . $rating_color . "' data-name='Layer 1' viewBox='0 0 24 24'><path d='M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z'/></svg>
                    </span>
                    <span class='total-rating'>(" . $row['total_rating'] . ")</span><br>

                    <div class='category' style='color:#3d4d54;font-size : .92rem;padding-bottom:3.5%;margin-top:5%;' class='category'>" . ucfirst($row['category']) . " </div>
                    <table class='table' style='font-size : 80%;transform : translateY(-1.6vh)'>
                    <tr><td>Phn : </td><td>" . $row['phone1'] . "$comma" . $row['phone2'] . "</td></tr>
                    </table>
                    <svg class='home-delivery-icon' style = 'fill :$color;font-size : 85%;' xmlns='http://www.w3.org/2000/svg' data-name='Layer 1' viewBox='0 0 512 512'><path d='M7.5 130.713h56.9a7.5 7.5 0 1 0 0-15H7.5a7.5 7.5 0 0 0 0 15Zm7.5 22.5a7.5 7.5 0 0 0 7.5 7.5h56.9a7.5 7.5 0 1 0 0-15H22.5a7.5 7.5 0 0 0-7.5 7.5Zm489.5 252.765h-28.366a56.034 56.034 0 0 0 18.107-32.544 56.609 56.609 0 0 0-8.888-41.068l4.285-2.55a7.5 7.5 0 0 0 2.61-10.28 67.576 67.576 0 0 0-68.008-32.212c-6.395-15.216-12.978-36.91-19.354-57.935-3.717-12.256-7.53-24.827-11.346-36.253h4.071a7.5 7.5 0 0 0 7.5-7.5v-44.092a7.5 7.5 0 0 0-7.5-7.5h-30.365a29.597 29.597 0 0 0-28.579 22.046h-28.696a7.5 7.5 0 0 0 0 15h28.696a29.49 29.49 0 0 0 5.96 11.482 7.53 7.53 0 0 0 .312 1.296c4.178 12.225 11.535 39.694 12.063 42.188 8.204 38.745 9.352 86.831-31.768 95.886a51.983 51.983 0 0 1-49.721-16.227c-15.472-17.714-16.5-44.979-2.505-66.316a21.154 21.154 0 0 0-11.386-38.995h-27.337a17.478 17.478 0 0 0 .2-2.5v-89.382a17.52 17.52 0 0 0-17.5-17.5h-97.586a17.52 17.52 0 0 0-17.5 17.5v89.382a17.52 17.52 0 0 0 17.5 17.5h11.68a21.078 21.078 0 0 0 6.149 21.922 96.484 96.484 0 0 0-7.584 3.927c-25.7 14.852-47.443 43.78-55.395 73.699-4.953 18.635-3.852 35.564 3.08 47.74l.017.032c.057.101.107.208.166.309.027.046.061.086.089.132.114.187.237.368.367.544.044.06.083.123.13.181a7.495 7.495 0 0 0 .564.637c.058.06.12.115.181.172q.24.228.5.435c.064.05.126.1.19.148a7.452 7.452 0 0 0 .692.46l.038.023a7.46 7.46 0 0 0 .813.4c.06.025.12.045.18.069q.322.126.659.224c.086.025.173.048.26.07.08.02.158.047.239.064.14.03.28.046.42.068.08.012.16.029.24.039a7.53 7.53 0 0 0 .93.064c.015 0 .03-.004.044-.004h.043l26.59-.346a56.215 56.215 0 0 0 19.181 39.565H7.5a7.5 7.5 0 0 0 0 15h497a7.5 7.5 0 0 0 0-15Zm-70.33-104.404a52.594 52.594 0 0 1 40.893 19.46l-3.592 2.138a7.463 7.463 0 0 0-2.347 1.396l-86.316 51.364a52.56 52.56 0 0 1 21.64-65.22l2.972-1.769a52.164 52.164 0 0 1 26.75-7.369Zm15.71 64.256a11.305 11.305 0 0 1-22.117.805l18.6-11.068a11.314 11.314 0 0 1 3.517 10.263ZM352.7 163.59a14.563 14.563 0 0 1 14.546-14.546h22.865v29.092h-22.865A14.563 14.563 0 0 1 352.7 163.59Zm-91.078 51.814a6.17 6.17 0 0 1 .087 12.341h-71.374a122.145 122.145 0 0 0-13.997.005h-25.009a6.173 6.173 0 1 1 0-12.346Zm-142.223-15a2.503 2.503 0 0 1-2.5-2.5v-89.382a2.503 2.503 0 0 1 2.5-2.5h97.585a2.503 2.503 0 0 1 2.5 2.5v89.382a2.503 2.503 0 0 1-2.5 2.5Zm-30.654 118.4c6.98-26.262 25.98-51.604 48.404-64.563a89.893 89.893 0 0 1 39.62-11.492h77.46c-10.658 24.741-7.144 53.22 9.987 72.833a67.17 67.17 0 0 0 64.245 21.01c41.453-9.13 56.8-49.489 43.216-113.643-.511-2.414-4.429-17.149-8.225-30.065a29.65 29.65 0 0 0 3.794.252h10.456c4.275 12.399 8.615 26.71 12.83 40.606 6.228 20.542 12.653 41.711 19.09 57.486a67.62 67.62 0 0 0-9.873 4.825l-2.973 1.77a67.4 67.4 0 0 0-32.494 50.29l-114.912 1.495c-7.575-34.812-31.88-62.7-62.047-70.428-20.545-5.265-43.885-1.138-64.039 11.32a102.702 102.702 0 0 0-36.746 39.88 78.82 78.82 0 0 1 2.207-11.575Zm5.077 32.827c6.586-20.246 19.85-37.556 37.349-48.372 16.705-10.325 35.816-13.803 52.43-9.549 23.886 6.12 43.375 28.15 50.418 56.098Zm84.233 13.906a11.299 11.299 0 0 1-22.218.289Zm-11.131 39.395a41.361 41.361 0 0 1-41.224-38.714l15.032-.196a26.301 26.301 0 0 0 52.436-.682l15.032-.195a41.358 41.358 0 0 1-41.276 39.787Zm37.045 1.046a56.212 56.212 0 0 0 19.236-41.028l19.508-.254a7.516 7.516 0 0 0 1.016-.013l120.492-1.567a67.058 67.058 0 0 0 9.072 27.204 7.5 7.5 0 0 0 10.28 2.61l5.176-3.079a56.323 56.323 0 0 0 12.569 16.127Zm234.788-.74a41.348 41.348 0 0 1-37.088-23.075l12.973-7.72a26.296 26.296 0 1 0 44.84-26.683l12.965-7.714a40.899 40.899 0 0 1 7.009 30.854 41.376 41.376 0 0 1-40.7 34.338ZM190.692 145.713h-15v-15a7.5 7.5 0 1 0-15 0v15h-15a7.5 7.5 0 0 0 0 15h15v15a7.5 7.5 0 0 0 15 0v-15h15a7.5 7.5 0 0 0 0-15Zm-183.192 45h56.9a7.5 7.5 0 1 0 0-15H7.5a7.5 7.5 0 0 0 0 15Z'/></svg>
                    </div>
                    </a>
                    </div>
                    ";
        }
    }



    ?>
</div>
<!--footer-->
<?php include('elements/footer.php') ?>
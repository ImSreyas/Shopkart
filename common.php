<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <script src="js/responsiveNavigation.js" defer></script>
</head>

<body class="my-body">


    <!-- menu start -->
    <nav class="nav-bar" responsiveNavigation=false>
        <ul>
            <a href="index.php" class="no-text-decoration">
                <li class="index ">home</li>
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
            <a href="log-in.php" class="no-text-decoration">
                <li class="login">log in</li>
            </a>
        </ul>
        <button class="nav-button"></button>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1">
        <br>
        <p>common</p>
    </div>
    <!--footer-->
    <?php include('elements/footer.html') ?>
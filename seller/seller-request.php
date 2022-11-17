<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>shop-finder</title>
        <link rel="stylesheet" type="text/CSS" href="../css/main.css">
        <link rel="stylesheet" type="text/CSS" href="css/seller-request.css">
    </head>
    <body class="my-body">
        <!--menu-->
        <?php include('../nav-bar/nav.php');?>
        <!--body-->
        <div class="body1 main-height">
        <div class="seller-request">
            <div class="container">
                <?php include('../animated/waiting-for-admin-confirmation.php') ?>
            </div>
            <div class="message">
                Waiting for admin confirmation...!
            </div>
            <a href="../index.php" class='homepage-link'><div class="request-page-btn">Go back to home page</div></a>
        </div>
        </div>
        <!--footer-->
        <?php include('elements/seller-footer.php')?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/otp-varify.css">
</head>

<body class="my-body">
    <!--menu-->
    <?php include('../nav-bar/nav.html'); ?>
    <!--body-->
    <div class="body1 otp-varify-body">
        <div class="wrap">
            <div class="otp-varify">

                <?php
                $otpErr = "";
                $otp = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $otp = $_POST["otp"];
                    if ($otp == 123456) {
                        header("location:ca-pass.php");
                    } else {
                        $otpErr = "*Invalid OTP";
                    }
                }
                ?>
                <form method="post" action="" id="form">
                    <label for="otp">Enter OTP</label>
                    <a class="no-text-decoration" href="ca-phone.php"><span class="edit-phone">Edit phone</span></a>
                    <span class="or">OR</span>
                    <a class="no-text-decoration" href="ca-email.php"><span class="edit-email">Edit email</span></a>
                    <br>
                    <input type="text" id="otp" name="otp" placeholder="Eg.123456" value="<?php echo $otp; ?>" <?php if ($otpErr != "") echo "class='shake'"; ?>><br>
                    <span class="error"><?php echo $otpErr; ?></span><br>
                    <input type="submit" id="submit" value="verify">
                </form>
            </div>
            <?php include('../animated/otp.html'); ?>
            <!-- <div  class="page-number">
                <div>
            <svg height="10" width="10">
                <circle cx="5" cy="5" r="4" fill="rgb(235, 235, 235)" stroke="rgb(150, 150, 150)" stroke-width="1"/>
            </svg>
                </div>
                <div>
            <svg height="10" width="10">
                <circle cx="5" cy="5" r="4" fill="rgb(150, 150, 150)" stroke="rgb(150, 150, 150)" stroke-width="1"/>
            </svg>
                </div>
                <div>
            <svg height="10" width="10">
                <circle cx="5" cy="5" r="4" fill="rgb(235, 235, 235)" stroke="rgb(150, 150, 150)" stroke-width="1"/>
            </svg>
                </div>
                <div>
            <svg height="10" width="10">
                <circle cx="5" cy="5" r="4" fill="rgb(235, 235, 235)" stroke="rgb(150, 150, 150)" stroke-width="1"/>
            </svg>
                </div>
            </div> -->
        </div>
    </div>

    <!--footer-->
    <?php include('elements/customer-footer.html') ?>
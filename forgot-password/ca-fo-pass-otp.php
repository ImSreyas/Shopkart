<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="../customer/css/otp-varify.css">
    <style>
        .imag {
            margin: 0 auto 0 0;
        }

        @media (max-width : 980px) {
            .wrap {
                flex-direction: column-reverse;
            }

            .imag {
                margin: 0 auto;
                width: 100vw;
            }

            .ca-phn {
                margin: 0 auto;
            }

            .imag-sub {
                width: 65%;
            }
        }
    </style>
    <script src="js/responsiveNavigation.js" defer></script>
</head>

<body class="my-body">
    <!--menu-->
    <?php include('../nav-bar/nav.html'); ?>
    <!--body-->
    <div class="body1 otp-varify-body">
        <div class="wrap">
            <?php
            $otpErr = "";
            $otp = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $otp = $_POST["otp"];
                if ($otp == 3968) {
                    header("location:ca-forgot-password.php");
                } else {
                    $otpErr = "*Invalid OTP";
                }
            }
            ?>
            <?php include('../animated/forotpca.html'); ?>
            <div class="otp-varify">


                <form method="post" action="" id="form">
                    <label for="otp">Enter OTP</label>
                    <a class="no-text-decoration" href="../log-in.php">
                        <span class="edit-email" style="margin-left : 8.9rem;">Edit username</span></a>
                    <br>
                    <input type="text" id="otp" name="otp" placeholder="Eg.3968" value="<?php echo $otp; ?>" <?php if ($otpErr != "") echo "class='shake'"; ?>><br>
                    <span class="error"><?php echo $otpErr; ?></span><br>
                    <input type="submit" id="submit" value="verify">
                </form>
            </div>

            <!-- <div  class="page-number" style="width: 4%;">
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
            </div> -->
        </div>
    </div>

    <!--footer-->
    <?php include('../elements/forgot-pass-footer.html') ?>
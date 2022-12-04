<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/sa-phone.css">
</head>

<body class="my-body">
    <!--menu-->
    <?php include('../nav-bar/nav.php'); ?>
    <!--body-->
    <div class="body1 ca-phone-body">
        <div class="wrap">
            <div class="ca-phn">
                <?php
                $phoneErr = "";
                $phone = "";
                $flag = 0;
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    include('../data-base/constant.php');
                    $phone = $_POST["user-phone"];
                    if (preg_match('/^[0-9]{10}+$/', $phone)) {
                        $sql = "SELECT username FROM seller_login WHERE username='$phone'";
                        $res = mysqli_query($conn, $sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                if ($row["username"] == $phone) {
                                    $flag = 1;
                                }
                            }
                        }
                        if ($flag != 1) {
                            session_start();
                            $_SESSION['username'] = $phone;
                            header("location:seller-otp-varify.php");
                        } else {
                            $phoneErr = "*User already exist";
                        }
                    } else {
                        $phoneErr = "*Invalid phone number";
                    }
                }

                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="user-phone">Phone</label><a class="no-text-decoration" href="sa-email.php"><span class="mailedit">Email</span></a>
                    <br>
                    <input type="text" id="user-phone" name="user-phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>" <?php if ($phoneErr != "") echo "class='shake'"; ?>>
                    <br>
                    <span class="error"><?php echo $phoneErr; ?></span>
                    <?php if ($phoneErr == "*User already exist") echo "<span class='us-ex'><a href='../log-in-seller.php'>log-in</a></span>" ?>
                    <br>
                    <input type="submit" id="send-otp" name="check" value="send OTP">
                </form>
            </div>
            <?php include('../animated/phonesa.html'); ?>
            <!-- <div  class="page-number">
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
                <div>
            <svg height="10" width="10">
                <circle cx="5" cy="5" r="4" fill="rgb(235, 235, 235)" stroke="rgb(150, 150, 150)" stroke-width="1"/>
            </svg>
                </div>
            </div> -->
        </div>
    </div>
    <!--footer-->
    <?php include('elements/seller-footer.php') ?>
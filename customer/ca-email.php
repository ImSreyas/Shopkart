<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/ca-email.css">
</head>

<body class="my-body">
    <!--menu-->
    <?php include('../nav-bar/nav.html'); ?>
    <!--body-->
    <div class="body1 ca-phone-body">
        <div class="wrap">
            <div class="ca-phn">
                <?php
                $mailErr = "";
                $mail = "";
                $flag = 0;
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    include('../data-base/constant.php');
                    $mail = $_POST["user-mail"];
                    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $mailErr = "*Invalid email";
                    } else {
                        $sql = "SELECT username FROM customer_login WHERE username='$mail'";
                        $res = mysqli_query($conn, $sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                if ($row["username"] == $mail) {
                                    $flag = 1;
                                }
                            }
                        }
                        if ($flag != 1) {
                            session_start();
                            $_SESSION['username'] = $mail;
                            header("location:otp-varify.php");
                        } else {
                            $mailErr = "*User already exist";
                        }
                    }
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="user-mail">Email</label><a class="no-text-decoration" href="ca-phone.php">
                        <span class="phoneedit">Phone</span></a>
                    <br>
                    <input type="text" id="user-mail" name="user-mail" placeholder="Enter your email id" value="<?php echo $mail; ?>" <?php if ($mailErr != "") echo "class='shake'"; ?>>
                    <br>
                    <span class="error"><?php echo $mailErr; ?></span><br>
                    <?php if ($mailErr == "*User already exist") echo "<span class='us-ex'><a href='../log-in.php'>log-in</a></span>" ?>
                    <input type="submit" id="send-otp" name="check" value="send OTP">
                </form>
            </div>
            <?php include('../animated/emailca.html'); ?>
        </div>
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
    <!--footer-->
    <?php include('elements/customer-footer.html') ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/sa-pass.css">
</head>

<body class="my-body">
    <!--menu-->
    <?php include('../nav-bar/nav.html'); ?>
    <!--body-->
    <div class="body1 ca-phone-body">
        <div class="wrap">

            <?php
            $pass = "";
            $pass2 = "";
            $passErr = "";
            $passErr2 = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pass = $_POST['seller-pass'];
                $pass2 = $_POST['seller-pass2'];
                if ($pass == "") {
                    $passErr = "*password cannot be empty";
                }
                if (
                    !preg_match("/(?=.*\d).(?=.*[a-zA-Z]).(?=.*[\!\@\#\$\%\^\&\*]).{6,25}+$/", $pass)
                    && !preg_match("/(?=.*[a-zA-Z]).(?=.*[\!\@\#\$\%\^\&\*]).(?=.*\d).{6,25}+$/", $pass)
                    && !preg_match("/(?=.*[\!\@\#\$\%\^\&\*]).(?=.*\d).(?=.*[a-zA-Z]).{6,25}+$/", $pass)
                ) {
                    if ($pass != "") {
                        $passErr = "*Password is not strong";
                    }
                }
                if ($pass != $pass2 && $pass != "" && $passErr != "*Password is not strong") {
                    $passErr2 = "*password is not the same";
                }
                if ($pass2 == "" && $pass != "" && $passErr != "*Password is not strong") {
                    $passErr2 = "*re-enter password";
                }
                if ($passErr == "" && $passErr2 == "") {
                    session_start();
                    $_SESSION['password'] = md5($pass);
                    header("location:sellerform.php");
                }
            }
            ?>
            <div class="ca-phn">
                <form action="" method="post" id="pp">
                    <label for="seller-pass">Enter password</label>

                    <div class="forgot-pass-wrap">
                        <input id="seller-pass" name="seller-pass" placeholder="Enter your password" value="<?php echo $pass; ?>" <?php if ($passErr != "") echo "class='shake'"; ?>><br>
                        <button type="button" id="eye1" class="forgot-pass-img" onclick="forgotPassIcon1()"></button>
                    </div>

                    <span class="error"><?php echo $passErr; ?></span><br>

                    <div style="padding-top:.6rem;">
                        <label for="seller-pass2">Confirm password</label>

                        <div class="forgot-pass-wrap">
                            <input id="seller-pass2" name="seller-pass2" placeholder="Confirm your password" value="<?php echo $pass2; ?>" <?php if ($passErr2 != "") echo "class='shake'"; ?>><br>
                            <button type="button" id="eye2" class="forgot-pass-img" onclick="forgotPassIcon2()"></button>
                        </div>

                    </div>

                    <span class="error"><?php echo $passErr2; ?></span><br>
                    <input type="submit" id="send-pass" value="Create account">
                </form>

                <div class="pass-note">
                    <span style="color:<?php if ($passErr == "*Password is not strong") echo "red";
                                        else echo "black"; ?>;">
                        <i style="color: rgb(186,104,200);font-style :normal;">NOTE :</i> Password must atleast contain 6 characters including letters , digits and special characters -(!,@,#,$,%,^,&,*)</span>
                </div>

                <script>
                    let status1 = 1;
                    let status2 = 1;
                    document.getElementById("seller-pass").setAttribute("type", "password");
                    document.getElementById("seller-pass2").setAttribute("type", "password");
                    document.getElementById("eye1").setAttribute("class", "forgot-pass-img");
                    document.getElementById("eye2").setAttribute("class", "forgot-pass-img");

                    function forgotPassIcon1() {
                        if (status1 == 0) {
                            document.getElementById("seller-pass").setAttribute("type", "password");
                            document.getElementById("eye1").setAttribute("class", "forgot-pass-img");
                            status1 = 1;
                        } else {
                            document.getElementById("seller-pass").setAttribute("type", "text");
                            document.getElementById("eye1").setAttribute("class", "forgot-password-click");
                            status1 = 0;
                        }
                    }

                    function forgotPassIcon2() {
                        if (status2 == 0) {
                            document.getElementById("seller-pass2").setAttribute("type", "password");
                            document.getElementById("eye2").setAttribute("class", "forgot-pass-img");
                            status2 = 1;
                        } else {
                            document.getElementById("seller-pass2").setAttribute("type", "text");
                            document.getElementById("eye2").setAttribute("class", "forgot-password-click");
                            status2 = 0;
                        }
                    }
                </script>

            </div>
            <?php include('../animated/passsa.html'); ?>
            <!-- <div  class="page-number">
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
    <?php include('elements/seller-footer.html'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="../customer/css/ca-pass.css">
</head>
<?php include('../nav-bar/nav.php'); ?>
<!--body-->
<div class="body1 ca-phone-body">
    <div class="wrap">
        <?php
        session_start();
        unset($_SESSION['ca-username']);
        if (isset($_SESSION['sa-username'])) {
            $pass = "";
            $pass2 = "";
            $passErr = "";
            $passErr2 = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pass = $_POST['user-pass'];
                $pass2 = $_POST['user-pass2'];
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
                    $username = $_SESSION['sa-username'];
                    include('../data-base/constant.php');
                    $pass_d = md5($pass);
                    $sql = "UPDATE seller_login SET password='$pass_d' WHERE username='$username'";
                    $res = mysqli_query($conn, $sql);
                    unset($_SESSION['sa-username']);
                    header("location:../log-in-seller.php");
                }
            }
        } else {
            header('location:../index.php');
        }
        ?>
        <div class="ca-phn">
            <form action="" method="post" id="pp">
                <label for="user-pass">New password</label>

                <div class="forgot-pass-wrap">
                    <input id="user-pass" name="user-pass" placeholder="Enter your password" value="<?php echo $pass; ?>" <?php if ($passErr != "") echo "class='shake'"; ?>><br>
                    <button type="button" id="eye1" class="forgot-pass-img" onclick="forgotPassIcon1()"></button>
                </div>

                <span class="error"><?php echo $passErr; ?></span><br>

                <div style="padding-top:.6rem;">
                    <label for="user-pass2">Confirm password</label>

                    <div class="forgot-pass-wrap">
                        <input id="user-pass2" name="user-pass2" placeholder="Confirm your password" value="<?php echo $pass2; ?>" <?php if ($passErr2 != "") echo "class='shake'"; ?>><br>
                        <button type="button" id="eye2" class="forgot-pass-img" onclick="forgotPassIcon2()"></button>
                    </div>

                </div>

                <span class="error"><?php echo $passErr2; ?></span><br>
                <input type="submit" id="send-pass" value="Change password">
            </form>

            <div class="pass-note">
                <span style="color:<?php if ($passErr == "*Password is not strong") echo "red";
                                    else echo "black"; ?>;">
                    <i style="color: rgb(186,104,200);font-style :normal;">NOTE :</i> Password must atleast contain 6 characters including letters , digits and special characters -(!,@,#,$,%,^,&,*)</span>
            </div>

            <script>
                let status1 = 1;
                let status2 = 1;
                document.getElementById("user-pass").setAttribute("type", "password");
                document.getElementById("user-pass2").setAttribute("type", "password");
                document.getElementById("eye1").setAttribute("class", "forgot-pass-img");
                document.getElementById("eye2").setAttribute("class", "forgot-pass-img");

                function forgotPassIcon1() {
                    if (status1 == 0) {
                        document.getElementById("user-pass").setAttribute("type", "password");
                        document.getElementById("eye1").setAttribute("class", "forgot-pass-img");
                        status1 = 1;
                    } else {
                        document.getElementById("user-pass").setAttribute("type", "text");
                        document.getElementById("eye1").setAttribute("class", "forgot-password-click");
                        status1 = 0;
                    }
                }

                function forgotPassIcon2() {
                    if (status2 == 0) {
                        document.getElementById("user-pass2").setAttribute("type", "password");
                        document.getElementById("eye2").setAttribute("class", "forgot-pass-img");
                        status2 = 1;
                    } else {
                        document.getElementById("user-pass2").setAttribute("type", "text");
                        document.getElementById("eye2").setAttribute("class", "forgot-password-click");
                        status2 = 0;
                    }
                }
            </script>

        </div>
        <?php include('../animated/hidden.html'); ?>
        <!-- <div  class="page-number" style="width: 4%;">
                
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
            </div> -->
    </div>

</div>
<!--footer-->
<?php include('../elements/forgot-pass-footer.php'); ?>
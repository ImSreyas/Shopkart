<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/log-in.css">
</head>

<body>


    <!-- menu start -->
    <nav class="nav-bar">
        <ul>
            <a href="index.php" class="no-text-decoration">
                <li class="index ">home</li>
            </a>
            <a href="search.php" class="no-text-decoration">
                <li class="category ">search</li>
            </a>
            <a href="order.php" class="no-text-decoration">
                <li class="order ">order</li>
            </a>
            <a href="profile.php" class="no-text-decoration">
                <li class="profile">profile</li>
            </a>
            <a href="log-in.php" class="no-text-decoration">
                <li class="login highlight">log in</li>
            </a>
        </ul>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 body2 main-height">
        <?php
        $flag = 0;
        $username = "";
        $password = "";
        $usernameErr = "";
        $passwordErr = "";
        $password_check = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            include('data-base/constant.php');
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM customer_login WHERE username='$username'";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $id = $row["id"];
                    $password_check = $row["password"];
                    if ($row["username"] == $username) {
                        $flag = 1;

                        $_SESSION['ca-username'] = $username;
                    }
                }
            }
            if ($flag == 0) {
                $usernameErr = "*Invalid username";
            }
            if ($username == "") {
                $usernameErr = "*Fill the username";
            }
            if ($flag == 1) {
                if (md5($password) == $password_check) {
                    unset($_SESSION['username']);
                    $_SESSION['customer-id'] = $id;
                    header('location:index.php?from=logging_in');
                } else {
                    $passwordErr = "*Wrong password";
                }
                if ($password == "") {
                    $passwordErr = "*Fill the password";
                }
            }
        }
        ?>
        <?php include('animated/signinphone.php'); ?>

        <div class="log-in-body">
            <form action="" method="post" name="form">
                <label class="text-left" for="username">Username </label>
                <span class="label">@customer</span>
                <input class="<?php if ($usernameErr != "") echo 'shake'; ?>" type="text" id="username" name="username" placeholder="phone/email" value="<?php echo $username; ?>" /><br>
                <span class="error"><?php echo $usernameErr; ?></span>
                <br>
                <label class="dis" for="password">Password </label>

                <div class="forgot-pass-wrap">
                    <input class="<?php if ($passwordErr != "") echo 'shake'; ?>" id="password" name="password" placeholder="password" value="<?php echo $password; ?>" /><br>
                    <button type="button" id="eye" class="forgot-pass-img" onclick="forgotPassIcon()"></button>
                </div>

                <span class="error"><?php echo $passwordErr; ?></span>
                <?php
                if ($usernameErr == "") {
                    if ($passwordErr == "*Wrong password") echo "<span class='forgot-password'><a href='forgot-password/ca-fo-pass-otp.php'>forgot password</a></span>";
                }
                ?>
                <br>
                <input type="submit" id="log-in" value="Log-in" />
            </form>

            <script>
                let status = 1;
                document.getElementById("password").setAttribute("type", "password");
                document.getElementById("eye").setAttribute("class", "forgot-pass-img");

                function forgotPassIcon() {
                    if (status == 0) {
                        document.getElementById("password").setAttribute("type", "password");
                        document.getElementById("eye").setAttribute("class", "forgot-pass-img");
                        status = 1;
                    } else {
                        document.getElementById("password").setAttribute("type", "text");
                        document.getElementById("eye").setAttribute("class", "forgot-password-click");
                        status = 0;
                    }
                }
            </script>

            <div class="padding-CAC">
                Don't have an account , create one...?
                <a class="link-fit-content no-text-decoration" href="customer/ca-phone.php">
                    sign-in
                </a><br>
                <span class="small-text">
                    I am a seller...?
                    <a class="link-fit-content no-text-decoration small-font" href="log-in-seller.php">log-in</a></span>
                <span class="login-margin small-text1">
                    I am an admin...!
                    <a class="link-fit-content no-text-decoration small-font1" href="log-in-admin.php">log-in</a></span>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php include('elements/footer.php') ?>
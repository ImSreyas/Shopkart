<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/customer-form.css">
</head>

<body class="my-body">
    <!--menu-->
    <?php include('../nav-bar/nav.html'); ?>
    <!--body-->
    <div class="body1 body3">
        <div class="wrap">
            <?php
            $name = "";
            $location = "";
            $address = "";
            $email = "";
            $phone_one = "";
            $phone_two = "";
            $pin = "";
            $nameErr = "";
            $locationErr = "";
            $addressErr = "";
            $emailErr = "";
            $phone1Err = "";
            $phone2Err = "";
            $pinErr = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['customername'];
                $location = $_POST['customerlocation'];
                $address = $_POST['customeraddress'];
                $email = $_POST['customeremail'];
                $phone_one = $_POST['customerphone1'];
                $phone_two = $_POST['customerphone2'];
                $pin = $_POST['customerpin'];
                if ($name == "") {
                    $nameErr = "*";
                }
                if ($location == "") {
                    $locationErr = "*";
                }
                if (!preg_match("/.{15,}/", $address)) {
                    $addressErr = "*";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "*";
                }
                if (!preg_match("/^[0-9]{10}+$/", $phone_one)) {
                    $phone1Err = "*";
                }
                if ($phone_two != "") {
                    if (!preg_match("/^[0-9]{10}+$/", $phone_two)) {
                        $phone2Err = "*";
                    }
                }
                if (!preg_match("/^[0-9]{6}+$/", $pin)) {
                    $pinErr = "*";
                }
                if ($nameErr == "" && $locationErr == "" && $addressErr == "" && $emailErr == "" && $phone1Err == "" && $phone2Err == "" && $pinErr == "") {
                    include('../data-base/constant.php');
                    session_start();
                    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                        $username = $_SESSION['username'];
                        $password = $_SESSION['password'];
                        $sql = "INSERT INTO customer_login SET username='$username',password='$password'";
                        $res = mysqli_query($conn, $sql);
                        $sql2 = "SELECT * FROM customer_login WHERE username='$username' && password='$password'";
                        $res2 = mysqli_query($conn, $sql2);
                        if ($res2->num_rows > 0) {
                            while ($row = $res2->fetch_assoc()) {
                                $_SESSION['customer-id'] = $row["id"];
                                $id = $_SESSION['customer-id'];
                            }
                        }
                        $sql3 = "INSERT INTO customer SET id='$id' , name='$name' , location='$location' , address='$address' , email='$email' , phone1='$phone_one' , phone2='$phone_two' , pin='$pin' ";
                        $res3 = mysqli_query($conn, $sql3);
                        unset($_SESSION['username']);
                        unset($_SESSION['password']);
                        header("location:../index.php");
                    } else {
                        header('location:ca-phone.php');
                    }
                }
            }
            ?>
            <!--<div class="text-center customeracc">
                <h4>ACCOUNT DETAILS</h4>
            </div>-->
            <div class="div1-customer-form">
                <form class="form4578" action="" method="POST">

                    <label for="customername">Name</label>
                    <input type="text" id="customername" name="customername" placeholder="Enter your name (required)" value="<?php echo $name; ?>" style="border: 2px solid; border-color :<?php if ($nameErr != '') echo 'red';
                                                                                                                                                                                            else echo 'white'; ?>;" <?php if ($nameErr != "") echo "class='shake'"; ?> /><br><br>

                    <label for="customerlocation">Location</label>
                    <input type="text" id="customerlocation" name="customerlocation" placeholder="Enter your location (required)" value="<?php echo $location; ?>" style="border: 2px solid; border-color :<?php if ($locationErr != '') echo 'red';
                                                                                                                                                                                                            else echo 'white'; ?>;" <?php if ($locationErr != "") echo "class='shake'"; ?> /><br><br>

                    <label for="customeraddress">Address</label>
                    <textarea id="customeraddress" name="customeraddress" cols="50" rows="3" placeholder="Enter your address (required)" style="border: 2px solid; border-color :<?php if ($addressErr != '') echo 'red';
                                                                                                                                                                                    else echo 'white'; ?>;" <?php if ($addressErr != "") echo "class='shake'"; ?>></textarea><br><br>

                    <label for="customeremail">Email</label>
                    <input type="text" id="customeremail" name="customeremail" placeholder="Enter your email (required)" value="<?php echo $email; ?>" style="border: 2px solid; border-color :<?php if ($emailErr != '') echo 'red';
                                                                                                                                                                                                else echo 'white'; ?>;" <?php if ($emailErr != "") echo "class='shake'"; ?> /><br><br>

                    <label for="customerphone1">Phone</label>
                    <input type="text" id="customerphone1" name="customerphone1" placeholder="Enter your phone number (required)" value="<?php echo $phone_one; ?>" style="border: 2px solid; border-color :<?php if ($phone1Err != '') echo 'red';
                                                                                                                                                                                                            else echo 'white'; ?>;" <?php if ($phone1Err != "") echo "class='shake'"; ?> /><br><br>

                    <label for="customerphone2">Phone 2</label>
                    <input type="text" id="customerphone2" name="customerphone2" placeholder="Enter your second phone number (optional)" value="<?php echo $phone_two; ?>" style="border: 2px solid; border-color :<?php if ($phone2Err != '') echo 'red';
                                                                                                                                                                                                                    else echo 'white'; ?>;" <?php if ($phone2Err != "") echo "class='shake'"; ?> /><br><br>

                    <label for="customerpin">Pin</label>
                    <input type="text" id="customerpin" name="customerpin" placeholder="Enter your pin (required)" value="<?php echo $pin; ?>" style="border: 2px solid; border-color :<?php if ($pinErr != '') echo 'red';
                                                                                                                                                                                        else echo 'white'; ?>;" <?php if ($pinErr != "") echo "class='shake'"; ?> /><br><br><br>

                    <input type="submit" id="createacc" value="Create">
                </form>
            </div>
            <?php include('../animated/formca.html'); ?>
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
    <?php include('elements/customer-footer.html') ?>
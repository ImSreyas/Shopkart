<?php session_start();  ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/seller-form.css">
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
            $sellerlicense = "";
            $email = "";
            $phone_one = "";
            $phone_two = "";
            $CATEGORY = "";
            $nameErr = "";
            $locationErr = "";
            $licenseErr = "";
            $emailErr = "";
            $phone1Err = "";
            $phone2Err = "";
            $CATEGORYErr = "";
            $seller_imageErr = "";
            $coverImageError = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['sellername'];
                $location = $_POST['sellerlocation'];
                $sellerlicense = $_POST['sellerlicense'];
                $email = $_POST['selleremail'];
                $phone_one = $_POST['sellerphone1'];
                $phone_two = $_POST['sellerphone2'];
                $CATEGORY = $_POST['sellerCATEGORY'];

                $cover_image = $_FILES['image'];
                $fileName = $_FILES['image']['name'];
                $fileTempName = $_FILES['image']['tmp_name'];
                $fileSize = $_FILES['image']['size'];
                $fileError = $_FILES['image']['error'];
                $fileType = $_FILES['image']['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));


                if ($name == "") {
                    $nameErr = "*";
                }
                if ($location == "") {
                    $locationErr = "*";
                }
                if (!preg_match("/^[0-9]{12}+$/", $sellerlicense)) {
                    $licenseErr = "*";
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
                if ($nameErr == "" && $locationErr == "" && $licenseErr == "" && $emailErr == "" && $phone1Err == "" && $phone2Err == "" && $CATEGORYErr == "") {

                    if (!$fileName == "") {
                        if ($fileError === 0) {
                            if ($fileSize < 1000000) {
                                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                                $fileDestination = '../cover-images/' . $fileNewName;
                                move_uploaded_file($fileTempName, $fileDestination);
                                $fileDestination_new = 'cover-images/' . $fileNewName;
                            } else {
                                $coverImageError = "*Image size is too big";
                            }
                        } else {
                            $coverImageError = "*Some error occured.Please choose an image one more time.";
                        }
                    } else {
                        $coverImageError = "*Select an image";
                    }

                    if ($coverImageError == "") {

                        include('../data-base/constant.php');
                        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                            $username = $_SESSION['username'];
                            $password = $_SESSION['password'];
                            $sql = "INSERT INTO seller_login SET username='$username',password='$password'";
                            $res = mysqli_query($conn, $sql);
                            $sql2 = "SELECT * FROM seller_login WHERE username='$username' && password='$password'";
                            $res2 = mysqli_query($conn, $sql2);
                            if ($res2->num_rows > 0) {
                                while ($row = $res2->fetch_assoc()) {
                                    $_SESSION['id'] = $row["id"];
                                    $id = $_SESSION['id'];
                                }
                            }
                            $sql3 = "INSERT INTO seller SET 
                    id='$id' , 
                    shop_name='$name' , 
                    location='$location' , 
                    license_no='$sellerlicense' , 
                    email='$email' , 
                    cover_img = '$fileDestination_new' ,
                    phone1='$phone_one' , 
                    phone2='$phone_two' , 
                    category='$CATEGORY' ";

                            $res3 = mysqli_query($conn, $sql3);
                            unset($_SESSION['username']);
                            unset($_SESSION['password']);
                            unset($_SESSION['id']);
                            header("location:seller-request.php");
                        } else {
                            header('location:sa-phone.php');
                        }
                    }
                }
            }
            ?>
            <!--<div class="text-center selleracc">
                <h4>ACCOUNT DETAILS</h4>
            </div>-->
            <div class="div1-seller-form">
                <form class="form4578" action="" method="POST" enctype="multipart/form-data">

                    <label for="sellername">Shop name</label>
                    <input type="text" id="sellername" name="sellername" placeholder="Enter your Shop name (required)" value="<?php echo $name; ?>" style="border: 2px solid; border-color :<?php if ($nameErr != '') echo 'red';
                                                                                                                                                                                            else echo 'white'; ?>;" <?php if ($nameErr != "") echo "class='shake'"; ?> /><br><br>

                    <label for="sellerlocation">Location</label>
                    <input type="text" id="sellerlocation" name="sellerlocation" placeholder="Enter your location (required)" value="<?php echo $location; ?>" style="border: 2px solid; border-color :<?php if ($locationErr != '') echo 'red';
                                                                                                                                                                                                        else echo 'white'; ?>;" <?php if ($locationErr != "") echo "class='shake'"; ?> /><br><br>

                    <label for="selleraddress">License number</label>
                    <input type="text" id="sellerlicense" name="sellerlicense" placeholder="Enter your shop license number (required)" value="<?php echo $sellerlicense; ?>" style="border: 2px solid; border-color :<?php if ($licenseErr != '') echo 'red';
                                                                                                                                                                                                                        else echo 'white'; ?>;" <?php if ($licenseErr != "") echo "class='shake'"; ?> /><br><br>

                    <label for="selleremail">Email</label>
                    <input type="text" id="selleremail" name="selleremail" placeholder="Enter your email (required)" value="<?php echo $email; ?>" style="border: 2px solid; border-color :<?php if ($emailErr != '') echo 'red';
                                                                                                                                                                                            else echo 'white'; ?>;" <?php if ($emailErr != "") echo "class='shake'"; ?> /><br><br>

                    <label for="sellerphone1">Phone</label>
                    <input type="text" id="sellerphone1" name="sellerphone1" placeholder="Enter your phone number (required)" value="<?php echo $phone_one; ?>" style="border: 2px solid; border-color :<?php if ($phone1Err != '') echo 'red';
                                                                                                                                                                                                        else echo 'white'; ?>;" <?php if ($phone1Err != "") echo "class='shake'"; ?> /><br><br>

                    <label for="sellerphone2">Phone 2</label>
                    <input type="text" id="sellerphone2" name="sellerphone2" placeholder="Enter your second phone number (optional)" value="<?php echo $phone_two; ?>" style="border: 2px solid; border-color :<?php if ($phone2Err != '') echo 'red';
                                                                                                                                                                                                                else echo 'white'; ?>;" <?php if ($phone2Err != "") echo "class='shake'"; ?> /><br><br>

                    <label for="sellerCATEGORY">Category</label>


                    <select type="dropdown" id="sellerCATEGORY" name="sellerCATEGORY" placeholder="Enter your CATEGORY (required)" style="border: 2px solid; border-color :<?php if ($CATEGORYErr != '') echo 'red';
                                                                                                                                                                            else echo 'white'; ?>;" <?php if ($CATEGORYErr != "") echo "class='shake'"; ?>>

                        <option value="grocery" class="text-black" <?php if ($CATEGORY == "grocery") echo 'selected'; ?>>Grocery</option>
                        <option value="medical" class="text-black" <?php if ($CATEGORY == "medical") echo 'selected'; ?>>Medical</option>
                        <option value="clothing" class="text-black" <?php if ($CATEGORY == "clothing") echo 'selected'; ?>>Clothing</option>
                        <option value="meat" class="text-black" <?php if ($CATEGORY == "meat") echo 'selected'; ?>>Meat</option>
                        <option value="book-store" class="text-black" <?php if ($CATEGORY == "book-store") echo 'selected'; ?>>Book store</option>

                    </select><br><br><br>

                    <label for="seller-image" class="seller-image-label">Choose cover image</label>

                    <div class="seller-image-wrapper">
                        <label for="seller-image" class="on-top-image-selecter">up</label>
                        <div class="cover-image-div">
                            <div class="cover-image-inside"></div>
                        </div>
                        <div class="cover-image-div2"></div>

                        <input type="file" accept="image/*" id="seller-image" name="image" style="border: 2px solid; border-color :<?php if ($coverImageError != '') echo 'red';
                                                                                                                                    else echo 'white'; ?>;" /><br>
                        <span class="error"><?php echo $coverImageError; ?></span>

                    </div>

                    <input type="submit" id="createacc" value="Create">
                </form>
            </div>
            <?php include('../animated/formsa.html'); ?>
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
    <?php include('elements/seller-footer.html') ?>
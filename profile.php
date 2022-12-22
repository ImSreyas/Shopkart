<?php session_start();
include('data-base/constant.php');
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer</title>
<link rel="stylesheet" type="text/CSS" href="css/main.css">
<link rel="stylesheet" type="text/CSS" href="css/profile.css">
<?php include('loader/loading-div.html') ?>
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
                <li class="order">orders</li>
            </a>
            <a href="profile.php" class="no-text-decoration">
                <li class="profile highlight">profile</li>
            </a>
            <?php
            $user = (!isset($_SESSION['customer-id'])) ? "<a href='log-in.php' class='no-text-decoration'><li class='login'>log in</li></a>" :
                "<a href='log-out.php' class='no-text-decoration'><li class='login'>log out</li></a>";
            echo $user;
            ?>
            <?php
            if (isset($_SESSION['customer-id'])) {
                // include('data-base/constant.php');
                $id = $_SESSION['customer-id'];
                $sql1 = "select profile_image from customer where id=$id";
                $res = mysqli_query($conn, $sql1);
                while ($row = $res->fetch_assoc()) {
                    echo "
                    <li class='sre-icon-list'>
                    <a href='profile.php' class='sre-icon-link'>
                    <div class='sre-main-small-image-container'>
                    <div class='sre-profile-image-small-container'>
                    <img src='" . $row['profile_image'] . "' class='sre-img'>
                    </div>
                    </div>
                    </a></li>
                    ";
                }
            }
            ?>
        </ul>
    </nav>
    <!-- menu end -->


    <!--body-->
    <?php
    if (!isset($_SESSION['customer-id'])) {
        echo "<div class='user-not-found'>
            <div class='user-not-logged-in-container'>
            ";
        include('animated/user-not-logged-in.html');
        echo "
            <div class='question'>It seems like you are not logged in...!</div>
            <a href='log-in.php' class='p-t-l-link'>
            <div class='profile-to-log-in-page-link-container'>log in</div>
            </a>
            </div>
            </div>";
    }
    ?>
    <div class="body1 main-height">
        <div class="container-1">
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
            $whiteflag = 1;
            $total = 0;
            $total_order = 0;
            $coverImageError = "";
            $fileName = "";
            $coverImageError = "";



            $fileDestination_new = "";


            if (isset($_POST['submit'])) {
                $name = $_POST['customername'];
                $location = $_POST['customerlocation'];
                $address = $_POST['customeraddress'];
                $email = $_POST['customermail'];
                $phone_one = $_POST['customerphone1'];
                $phone_two = $_POST['customerphone2'];
                $pin = $_POST['customerpin'];

                if (isset($_FILES['image']['name'])) {
                    $cover_image = $_FILES['image'];
                    $fileName = $_FILES['image']['name'];
                    $fileTempName = $_FILES['image']['tmp_name'];
                    $fileSize = $_FILES['image']['size'];
                    $fileError = $_FILES['image']['error'];
                    $fileType = $_FILES['image']['type'];


                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));
                }

                if ($name == "") {
                    $nameErr = "border-bottom:2px solid red;border-radius:0px;box-shadow:none;";
                }
                if ($location == "") {
                    $locationErr = "border-bottom:2px solid red;border-radius:0px;";
                }
                if (!preg_match("/.{15,}/", $address)) {
                    $addressErr = "border-bottom:2px solid red;border-radius:0px;";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "border-bottom:2px solid red;border-radius:0px;";
                }
                if (!preg_match("/^[0-9]{10}+$/", $phone_one)) {
                    $phone1Err = "border-bottom:2px solid red;border-radius:0px;";
                }
                if ($phone_two != "") {
                    if (!preg_match("/^[0-9]{10}+$/", $phone_two)) {
                        $phone2Err = "border-bottom:2px solid red;border-radius:0px;";
                    }
                }
                if (!preg_match("/^[0-9]{6}+$/", $pin)) {
                    $pinErr = "border-bottom:2px solid red;border-radius:0px;";
                }



                if ($nameErr == "" && $locationErr == "" && $addressErr == "" && $emailErr == "" && $phone1Err == "" && $phone2Err == "" && $pinErr == "") {


                    if (!$fileName == "") {
                        if ($fileError === 0) {
                            if ($fileSize < 1000000) {
                                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                                $fileDestination = 'profile-images/' . $fileNewName;
                                move_uploaded_file($fileTempName, $fileDestination);
                                $fileDestination_new = 'profile-images/' . $fileNewName;
                            } else {
                                $coverImageError = "*Image size is too big";
                            }
                        } else {
                            $coverImageError = "*Some error occurred.Please choose an image one more time.";
                        }
                    } else {
                        $coverImageError = "*image is empty";
                    }
                    $r = $_SESSION['customer-id'];
                    $s = "select profile_image from customer where id=$r";
                    $profile_image_name_from_database = mysqli_query($conn, $s);
                    if ($fileDestination_new == "") {
                        while ($row = $profile_image_name_from_database->fetch_assoc()) {
                            $fileDestination_new = $row['profile_image'];
                        }
                    } else {
                        while ($row = $profile_image_name_from_database->fetch_assoc()) {
                            unlink($row['profile_image']);
                        }
                    }
                    if (($coverImageError == "" || $coverImageError == "*image is empty")) {
                        $id = $_SESSION['customer-id'];
                        $sql_query = "update customer SET name='$name' , location='$location' , address='$address' , email='$email' , phone1='$phone_one' , phone2='$phone_two' , pin='$pin' , profile_image='$fileDestination_new' where id=$id";
                        mysqli_query($conn, $sql_query);
                    } else {
                        $whiteflag = 0;
                    }
                } else $whiteflag = 0;
            }
            ?>
            <?php
            if (isset($_SESSION['customer-id'])) {
                $id = $_SESSION['customer-id'];
                $sql = "select * from customer where id=$id";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) {
                    $total_order = $row['t_order'];
                    $total = $row['t_money'];
                    if ($whiteflag == 1) {
                        echo "

                      
                      <form action='?from=true' method='POST' id='profile-form' autocomplete='off' enctype='multipart/form-data'>

                      <div class='profile-image-container'>
                      <div class='circle'><img src='" . $row['profile_image'] . "' class='img'>
                      <div class='edit-btn1 hidden' id='edit-img-btn'>
                      <div class='upload-image'><input type='file' class='upload-img-input' name='image' accept='image/*'>
                      </div>
                      </div>
                      </div>
                      </div>

                      <input name='customername' id='wrap1' class='name' type='text' value='" . $row['name'] . "' style='box-shadow:none;width=100%;padding:1%;' disabled>
                      <div class='wrap-content'>
                      <div class='location'><input name='customerlocation' id='wrap2' class='ex-name' type='text' value='" . ucfirst($row['location']) . "' disabled></div>
                      <div class='address'><input name='customeraddress' id='wrap3' class='ex-name' type='text' value='" . $row['address'] . "' disabled></div>
                      <div class='email'><input name='customermail' id='wrap4' class='ex-name' type='text' value='" . $row['email'] . "' disabled></div>
                      <div class='phone1'><input name='customerphone1' id='wrap5' class='ex-name' type='text' value='" . $row['phone1'] . "' disabled></div>
                      ";
                        echo "<div class='phone2'><input name='customerphone2' id='wrap6' class='ex-name' type='text' value='" . $row['phone2'] . "' disabled></div>";
                        echo "<div class='pin'><input name='customerpin' id='wrap7' class='ex-name' type='text' value='" . $row['pin'] . "' disabled></div>";
                        echo "</div></form>";
                    } else {
                        echo "
                      <form action='' method='POST' id='profile-form' autocomplete='off' enctype='multipart/form-data'>

                      <div class='profile-image-container'>
                      <div class='circle'><img src='" . $row['profile_image'] . "' class='img'>
                      <div class='edit-btn1 hidden' id='edit-img-btn'>
                      <div class='upload-image'><input type='file' class='upload-img-input' name='image' accept='image/*'>
                      </div>
                      </div>
                      </div>
                      </div>";

                        if (!($coverImageError == "*image is empty")) {
                            echo "<div class='sreyas-image-error'>" . $coverImageError . "</div>";
                        }
                        echo "
                      <input name='customername' id='wrap1' class='name' style='" . $nameErr . "box-shadow:none;width=100%;padding:0 1% 1%;' type='text' value='" . $name . "' disabled>
                      <div class='wrap-content'>
                      <div class='location'><input name='customerlocation' id='wrap2' class='ex-name' style='" . $locationErr . "' type='text' value='" . $location . "' disabled></div>
                      <div class='address'><input name='customeraddress' id='wrap3' class='ex-name' style='" . $addressErr . "' type='text' value='" . $address . "' disabled></div>
                      <div class='email'><input name='customermail' id='wrap4' class='ex-name' style='" . $emailErr . "' type='text' value='" . $email . "' disabled></div>
                      <div class='phone1 bor'><input name='customerphone1' id='wrap5' class='ex-name' style='" . $phone1Err . "' type='text' value='" . $phone_one . "' disabled></div>
                      ";
                        echo "<div class='phone2'><input name='customerphone2' id='wrap6' class='ex-name' style='" . $phone2Err . "' type='text' value='" . $phone_two . "' disabled></div>";
                        echo "<div class='pin'><input name='customerpin' id='wrap7' class='ex-name' style='" . $pinErr . "' type='text' value='" . $pin . "' disabled></div>";
                        echo "</div></form>";
                    }
                }
            }
            ?>
            <div class="update-button-container">
                <?php
                if (!($nameErr == "" && $locationErr == "" && $addressErr == "" && $emailErr == "" && $phone1Err == "" && $phone2Err == "" && $pinErr == "" && ($coverImageError == "" || $coverImageError == "*image is empty"))) {
                    echo "<a href='profile.php' class='fix'><div class='fix-container'>fix</div></a>";
                }
                ?>
                <button id="edit-btn" type="submit" name="submit" form="profile-form" class="update-btn" value="update">update</button>
                <button id="edit-button" form="profile-form" class="update-button" value="hello" onclick="editProfile()">Edit</button>
            </div>
        </div>
        <div class="image-container-1">
            <?php include('animated/profile.html'); ?>
        </div>
        <div class="image-container-2">
            <?php include('animated/profile2.html'); ?>
        </div>
        <div class="container-2">
            <div class="container-2-div-1">
                <div class="money-spent">
                    Total money spent
                </div>
                <div class="money-container">
                    <?php echo $total . "<span class='indian-money'>₹</span>"; ?>
                </div>
            </div>
            <div class="container-2-div-2">
                <div class="total-order">
                    Total order placed
                </div>
                <div class="total-order-container">
                    <?php echo $total_order; ?>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <script>
        document.getElementById("edit-button").setAttribute("type", "button");

        function editProfile() {


            let wrap1 = document.getElementById("wrap1")
            wrap1.removeAttribute("disabled")
            wrap1.style.backgroundColor = "#303a41"
            wrap1.style.borderBottom = "2px solid #252f33"
            wrap1.style.borderRadius = "0"
            wrap1.style.boxShadow = "0 0 0 0 #303a41"

            //$("edit-button").childern().foreach(v => v.removeAttribute("diabled))
            let wrap2 = document.getElementById("wrap2")
            wrap2.removeAttribute("disabled")
            wrap2.style.backgroundColor = "#303a41"
            wrap2.style.borderBottom = "2px solid #252f33"
            wrap2.style.borderRadius = "0"
            wrap2.style.boxShadow = "0 0 0 0 #303a41"

            let wrap3 = document.getElementById("wrap3")
            wrap3.removeAttribute("disabled")
            wrap3.style.backgroundColor = "#303a41"
            wrap3.style.borderBottom = "2px solid #252f33"
            wrap3.style.borderRadius = "0"
            wrap3.style.boxShadow = "0 0 0 0 #303a41"

            let wrap4 = document.getElementById("wrap4")
            wrap4.removeAttribute("disabled")
            wrap4.style.backgroundColor = "#303a41"
            wrap4.style.borderBottom = "2px solid #252f33"
            wrap4.style.borderRadius = "0"
            wrap4.style.boxShadow = "0 0 0 0 #303a41"

            let wrap5 = document.getElementById("wrap5")
            wrap5.removeAttribute("disabled")
            wrap5.style.backgroundColor = "#303a41"
            wrap5.style.borderBottom = "2px solid #252f33"
            wrap5.style.borderRadius = "0"
            wrap5.style.boxShadow = "0 0 0 0 #303a41"

            let wrap6 = document.getElementById("wrap6")
            wrap6.removeAttribute("disabled")
            wrap6.style.backgroundColor = "#303a41"
            wrap6.style.borderBottom = "2px solid #252f33"
            wrap6.style.borderRadius = "0"
            wrap6.style.boxShadow = "0 0 0 0 #303a41"

            let wrap7 = document.getElementById("wrap7")
            wrap7.removeAttribute("disabled")
            wrap7.style.backgroundColor = "#303a41"
            wrap7.style.borderBottom = "2px solid #252f33"
            wrap7.style.borderRadius = "0"
            wrap7.style.boxShadow = "0 0 0 0 #303a41"



            document.getElementById("edit-btn").setAttribute("class", "clickable");


            // making the image edit button visible when clicking on the edit button 

            let editBtn = document.getElementById("edit-img-btn")
            editBtn.classList.remove('hidden')
        }
    </script>
    <?php include('elements/footer.html') ?>
<?php
session_start();
$id = $_SESSION['seller-id'];
if (!isset($_SESSION['seller-id'])) {
    header('location:../index.php');
}
include("../data-base/constant.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/profile.css">
    <link rel="stylesheet" type="text/CSS" href="css/profile2.css">
    <link rel="stylesheet" href="../css/load.css">
</head>

<body class="my-body">
    <?php include('../loader/loading-div.html'); ?>
    <script src="../js/loading-div-normal.js"></script>
    <script>
        history.replaceState({}, '', '')
    </script>



    <!-- menu start -->
    <nav class="nav-bar">
        <ul>
            <a href="seller-index.php" class="no-text-decoration">
                <li class="request">request</li>
            </a>
            <a href="delivery.php" class="no-text-decoration">
                <li class="delivery">delivery</li>
            </a>
            <a href="list.php" class="no-text-decoration">
                <li class="list">list</li>
            </a>
            <a href="product.php" class="no-text-decoration">
                <li class="product">product</li>
            </a>
            <a href="control.php" class="no-text-decoration">
                <li class="control">control</li>
            </a>
            <a href="profile.php" class="no-text-decoration">
                <li class="profile highlight">profile</li>
            </a>
            <a href="log-out.php" class="no-text-decoration">
                <li class="log-out">log out</li>
            </a>
        </ul>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">
        <div class="main-profile-container">
            <div class="main-image-update-container">
                <div class="image-container-inside">
                    <?php include("../animated/seller-profile-image.html"); ?>
                </div>
            </div>
            <div class="main-details-update-container">

                <?php
                $name = "";
                $rating = "";
                $total_rating = "";
                $location = "";
                $category = "";
                $phone_one = "";
                $phone_two = "";
                $phone1Err = "";
                $phone2Err = "";
                $whiteflag = 1;
                $coverImageError = "";
                $fileName = "";
                $coverImageError = "";
                $rating_color = "";



                $fileDestination_new = "";


                if (isset($_POST['submit'])) {
                    $phone_one = $_POST['sellerphone1'];
                    $phone_two = $_POST['sellerphone2'];


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


                    if (!preg_match("/^[0-9]{10}+$/", $phone_one)) {
                        $phone1Err = "border-bottom:2px solid red;border-radius:0px;";
                    }
                    if ($phone_two != "") {
                        if (!preg_match("/^[0-9]{10}+$/", $phone_two)) {
                            $phone2Err = "border-bottom:2px solid red;border-radius:0px;";
                        }
                    }



                    if ($phone1Err == "" && $phone2Err == "") {


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
                                $coverImageError = "*Some error occurred.Please choose an image one more time.";
                            }
                        } else {
                            $coverImageError = "*image is empty";
                        }
                        $r = $_SESSION['seller-id'];
                        $s = "select cover_img from seller where id=$r";
                        $profile_image_name_from_database = mysqli_query($conn, $s);
                        if ($fileDestination_new == "") {
                            while ($row = $profile_image_name_from_database->fetch_assoc()) {
                                $fileDestination_new = $row['cover_img'];
                            }
                        } else {
                            while ($row = $profile_image_name_from_database->fetch_assoc()) {
                                unlink("../" . $row['cover_img']);
                            }
                        }
                        if (($coverImageError == "" || $coverImageError == "*image is empty")) {
                            $id = $_SESSION['seller-id'];
                            $sql_query = "update seller SET phone1='$phone_one' , phone2='$phone_two', cover_img='$fileDestination_new' where id=$id";
                            mysqli_query($conn, $sql_query);
                        } else {
                            $whiteflag = 0;
                        }
                    } else $whiteflag = 0;
                }
                ?>
                <?php
                if (isset($_SESSION['seller-id'])) {
                    $id = $_SESSION['seller-id'];
                    $sql = "select * from seller where id=$id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                        $rating_color = ($row['rating'] < 2) ? "red" : (($row['rating'] <= 3.5) ? "yellow" : "#00df00");
                        if ($whiteflag == 1) {
                            echo "

                      
                      <form action='?from=updating_details' method='POST' id='profile-form' autocomplete='off' enctype='multipart/form-data'>

                      <div class='profile-image-container'>
                      <div class='circle'><img src='../" . $row['cover_img'] . "' class='img'>
                      <div class='edit-btn1 hidden' id='edit-img-btn'>
                      <div class='upload-image'><input type='file' class='upload-img-input' name='image' accept='image/*'>
                      </div>
                      </div>
                      </div>
                      </div>

                      <div id='wrap1' class='name' style='box-shadow:none;width=100%;padding:1%;'>" . ucfirst($row['shop_name']) . "</div>
                      <div class='rating-container'>
                      <span class='address'><span name='sellerrating' id='wrap2' class='ex-name' style='color:" . $rating_color . "'>" . $row['rating'] . "</span></span><span class='star-img' >
                      <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' style='fill:" . $rating_color . "' class='i' data-name='Layer 1' viewBox='0 0 24 24'><path d='M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z'/></svg></span>
                      <span class='t_rating'><span name='sellertrating' id='wrap3' class='ex-name'>(" . $row['total_rating'] . ")</span></div></span>
                      <div class='wrap-content'>
                      <div class='location'><div name='sellerlocation' id='wrap4' class='ex-name'>" . ucfirst($row['location']) . "</div></div>
                      <div calss='category'><div name='sellercategory' id='wrap5' class='ex-name'>" . $row['category'] . "</div></div>
                      <div class='phone1'><input name='sellerphone1' id='wrap6' class='ex-name' type='text' value='" . $row['phone1'] . "' disabled placeholder='phone 1'></div>
                      ";
                            echo "<div class='phone2'><input name='sellerphone2' id='wrap7' class='ex-name' type='text' value='" . $row['phone2'] . "' disabled placeholder='phone 2'></div>";
                            echo "</div></form>";
                        } else {
                            echo "
                      <form action='' method='POST' id='profile-form' autocomplete='off' enctype='multipart/form-data'>

                      <div class='profile-image-container'>
                      <div class='circle'><img src='../" . $row['cover_img'] . "' class='img'>
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
                      <div name='sellername' id='wrap1' class='name' box-shadow:none;width=100%;padding:0 1% 1%;'>" . ucfirst($row['shop_name']) . "</div>
                      <div class='wrap-content'>
                      <div class='rating-container'>
                      <span class='address'><span name='sellerrating' id='wrap2' class='ex-name'>" . $row['rating'] . "</span></span><span class='star-img'>
                      <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' style='fill:" . $rating_color . "' class='i' data-name='Layer 1' viewBox='0 0 24 24'><path d='M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z'/></svg></span>
                      <span class='t_rating'><span name='sellertrating' id='wrap3' class='ex-name'>(" . $row['total_rating'] . ")</span></span>
                      </div>
                      <div class='location'><input name='sellerlocation' id='wrap4' class='ex-name' type='text' value='" . $row['location'] . "' disabled></div>
                      <div calss='category'><div name='sellercategory' id='wrap5' class='ex-name'>" . $row['category'] . "</div></div>
                      <div class='phone1 bor'><input name='sellerphone1' id='wrap6' class='ex-name' style='" . $phone1Err . "' type='text' value='" . $phone_one . "' disabled placeholder='phone 1'></div>
                      ";
                            echo "<div class='phone2'><input name='sellerphone2' id='wrap7' class='ex-name' style='" . $phone2Err . "' type='text' value='" . $phone_two . "' disabled placeholder='phone 2'></div>";
                            echo "</div></form>";
                        }
                    }
                }
                ?>
                <div class="update-button-container">
                    <?php
                    if (!($phone1Err == "" && $phone2Err == "" && ($coverImageError == "" || $coverImageError == "*image is empty"))) {
                        echo "<a href='profile.php' class='fix'><div class='fix-container'>fix</div></a>";
                    }
                    ?>
                    <button id="edit-btn" type="submit" name="submit" form="profile-form" class="update-btn" value="update">update</button>
                    <button id="edit-button" form="profile-form" class="update-button" value="hello" onclick="editProfile()">Edit</button>
                </div>
            </div>
            <script>
                document.getElementById("edit-button").setAttribute("type", "button");

                function editProfile() {

                    document.querySelector(".main-details-update-container").style.backgroundColor = "#3d4d54"
                    document.querySelector(".rating-container").style.backgroundColor = "#3d4d54"

                    let wrap6 = document.getElementById("wrap6")
                    wrap6.removeAttribute("disabled")
                    wrap6.style.backgroundColor = "#3d4d54"
                    wrap6.style.borderBottom = "2px solid #252f33"
                    wrap6.style.borderRadius = "0"
                    wrap6.style.boxShadow = "0 0 0 0 #3d4d54"

                    let wrap7 = document.getElementById("wrap7")
                    wrap7.removeAttribute("disabled")
                    wrap7.style.backgroundColor = "#3d4d54"
                    wrap7.style.borderBottom = "2px solid #252f33"
                    wrap7.style.borderRadius = "0"
                    wrap7.style.boxShadow = "0 0 0 0 #3d4d54"



                    document.getElementById("edit-btn").setAttribute("class", "clickable");
                    console.log("hello world")


                    // making the image edit button visible when clicking on the edit button 

                    let editBtn = document.getElementById("edit-img-btn")
                    editBtn.classList.remove('hidden')
                }
            </script>
        </div>
        <div class="shop-images-text">Shop Images</div>


        <?php
        $fileNamef = "";
        $fileErrorf = "";
        $fileSizef = "";
        $shopImageError = "";
        if (isset($_FILES['imf']['name'])) {
            $cover_imagef = $_FILES['imf'];
            $fileNamef = $_FILES['imf']['name'];
            $fileTempNamef = $_FILES['imf']['tmp_name'];
            $fileSizef = $_FILES['imf']['size'];
            $fileErrorf = $_FILES['imf']['error'];
            $fileTypef = $_FILES['imf']['type'];


            $fileExt = explode('.', $fileNamef);
            $fileActualExt = strtolower(end($fileExt));
        }
        if (!$fileNamef == "") {
            if ($fileErrorf === 0) {
                if ($fileSizef < 1000000) {
                    $fileNewNamef = uniqid('', true) . "." . $fileActualExt;
                    $fileDestinationf = '../img/shop-images/' . $fileNewNamef;
                    move_uploaded_file($fileTempNamef, $fileDestinationf);
                    $fileDestination_newf = 'img/shop-images/' . $fileNewNamef;

                    $id = $_SESSION['seller-id'];
                    $sql_query164 = "insert into shop_images SET image='$fileDestination_newf',s_id=$id";
                    mysqli_query($conn, $sql_query164);
                } else {
                    $shopImageError = "*Image size is too big";
                }
            } else {
                $shopImageError = "*Some error occurred.Please choose an image one more time.";
            }
        } else {
            $shopImageError = "*image is empty";
        }
        ?>


        <div class="multi-image-container">
            <?php
            if (isset($_POST['cross-btn'])) {
                $delete_id = $_POST['cross-btn'];

                $sql699 = "select image from shop_images where i_id='$delete_id'";
                $res699 = mysqli_query($conn, $sql699);
                while ($row699 = $res699->fetch_assoc()) {
                    unlink("../" . $row699['image']);
                }

                $sql693 = "delete from shop_images where i_id='$delete_id'";
                mysqli_query($conn, $sql693);
            }
            ?>

            <?php
            $sql154 = "select * from shop_images where s_id='$id'";
            $res154 = mysqli_query($conn, $sql154);
            while ($row154 = $res154->fetch_assoc()) {
                $img_id = $row154['i_id'];
                echo
                "<div class='rmic'>
                <div class='cross-btn-container'>
                <form action='' method='POST'>
                <button type='submit' class='cross-btn' name='cross-btn' value='$img_id'><img src='../images/close.png' class='cross-btn-img'></button>
                </form>
                </div>
                <img src='../" . $row154['image'] . "' class='rmic-image'>
                </div>";
            }
            ?>


            <div class="multi-image-container-inside">
                <form action="" method="POST" enctype="multipart/form-data" class="mic-form">
                    <input type="file" accept="images/*" name="imf" id="image-file" oninput="fileSet();">
                    <div class="drag-image-container"><img src="../images/layer-plus.svg"></div>
                    <button type="submit" value="mic" class="mic-btn" id="button">Upload</button>
                </form>
            </div>
        </div>
        <script>
            document.getElementById("button").style.visibility = "hidden"
            const fileSet = () => {
                document.getElementById("button").style.visibility = "visible"
            }
        </script>
    </div>
    <!-- body ends here  -->
    <!--footer-->
    <?php include('../elements/forgot-pass-footer.html') ?>
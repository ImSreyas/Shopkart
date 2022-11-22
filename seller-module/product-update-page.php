<?php
include('../data-base/constant.php');
session_start();
if (!isset($_SESSION['seller-id'])) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seller</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/product-page.css">
    <link rel="stylesheet" type="text/CSS" href="css/product.css">
    <style>
        @media (max-width : 750px) {
            .product-adding-main-container {
                display: flex;
                flex-direction: column;
            }
        }
    </style>

</head>

<body class="my-body">

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
                <li class="product highlight">product</li>
            </a>
            <a href="control.php" class="no-text-decoration">
                <li class="control">control</li>
            </a>
            <a href="profile.php" class="no-text-decoration">
                <li class="profile">profile</li>
            </a>
            <a href="log-out.php" class="no-text-decoration">
                <li class="log-out">log out</li>
            </a>
        </ul>
    </nav>
    <!-- menu end -->


    <!--body-->
    <?php
    $coverImageError = "";
    ?>
    <?php
    $parameter = $_GET['id'];
    $result12 = mysqli_query($conn, "select * from product where p_id='$parameter'");
    while ($row = $result12->fetch_assoc()) {
        $name = $row['name'];
        $sub_category = $row['p_category'];
        $category = $row['category'];
        $price = $row['price'];
        $weight = $row['weight'];
        $stock = $row['stock'];
        $desc = $row['description'];
    }
    $nameErr = "";
    $sub_categoryErr = "";
    $priceErr = "";
    $weightErr = "";
    $stockErr = "";
    $descErr = "";
    $coverImageError = "";
    $flag = 0;
    $seller_id = $_SESSION['seller-id'];
    if (isset($_POST['sub'])) {
        $name = $_POST['product-name'];
        $sub_category = $_POST['product-sub-category'];
        $category = $_POST['product-category'];
        $price = $_POST['product-price'];
        $weight = $_POST['product-weight'];
        $stock = $_POST['product-stock'];
        $desc = $_POST['product-description'];

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
        if ($sub_category == "") {
            $sub_categoryErr = "*";
        }
        if ($price < 1) {
            $priceErr = "*";
        }
        if ($weight < 1) {
            $weightErr = "*";
        }
        if ($stock > 10000000) {
            $stockErr = "*";
        }
        if (!preg_match("/^.{0,250}+$/", $desc)) {
            $descErr = "*";
        }
        if ($nameErr == "" && $sub_categoryErr == "" && $priceErr == "" && $weightErr == "" && $stockErr == "" && $descErr == "") {
            if (!$fileName == "") {
                if ($fileError === 0) {
                    if ($fileSize < 1024000) {

                        $fileNewName = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = '../img/product-images/' . $fileNewName;

                        $sql189 = "select image from product where p_id='$parameter'";
                        $res189 = mysqli_query($conn, $sql189);
                        while ($row189 = $res189->fetch_assoc()) {
                            unlink('../img/product-images/'.$row189['image']);
                        }

                        move_uploaded_file($fileTempName, $fileDestination);
                        $fileDestination_new = $fileNewName;
                    } else {
                        $coverImageError = "*Image size is too big";
                    }
                } else {
                    $coverImageError = "*Some error occurred.Please choose an image one more time.";
                }
            } else {
                $coverImageError = "*";
            }
            if ($coverImageError == "") {
                $sql2 = "update product set 
                name='$name',
                p_category='$sub_category',
                category = '$category',
                weight = '$weight',
                price = '$price',
                description = '$desc',
                stock = '$stock',
                image = '$fileDestination_new' where p_id='$parameter'
                ";
                mysqli_query($conn, $sql2);
                header('location:product.php?from=product_updating');
            } elseif ($coverImageError == "*") {
                $sql2 = "update product set 
                name='$name',
                p_category='$sub_category',
                category = '$category',
                weight = '$weight',
                price = '$price',
                description = '$desc',
                stock = '$stock' where p_id='$parameter'
                ";
                mysqli_query($conn, $sql2);
                header('location:product.php?from=product_updating');
            }
        }
    }
    ?>
    <div class="body1 main-height">
        <div class="product-adding-main-container">




            <!-- image upload container starting here -->
            <div class="update-div-container">
                <div class="update-div">
                    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="div-holder">
                            <div class="product-image-container">

                                <!-- <div class="visible-btn-container"> -->
                                <input type="file" accept="image/*" class="product-image" name="image">
                                <div class="visible-btn" style="box-sizing:border-box;<?php if ($coverImageError != "") echo 'border:2px solid red;'; ?>">
                                    <div class="icon-inside">
                                    </div>
                                    <div class="insert-product-image">Upload product image
                                    </div>
                                </div>

                            </div>
                            <div class="product-details-container">
                                <input type="text" class="product-name" name="product-name" placeholder="Product name" value="<?php echo $name; ?>" style="<?php if ($nameErr != "") echo 'border-bottom:2px solid red;'; ?>">
                                <input type="text" class="product-sub-category" name="product-sub-category" placeholder="Product sub category" value="<?php echo $sub_category; ?>" style="<?php if ($sub_categoryErr != "") echo 'border-bottom:2px solid red;'; ?>">
                                <select class="product-category" name="product-category" placeholder="Product category" value="<?php echo $category; ?>">
                                    <?php include('../all/category-options/options.php'); ?>
                                    <input type="number" class="product-price" name="product-price" placeholder="Product price" value="<?php echo $price; ?>" style="<?php if ($priceErr != "") echo 'border-bottom:2px solid red;'; ?>">
                                    <input type="number" class="product-weight" name="product-weight" placeholder="Unit weight in grams" value="<?php echo $weight; ?>" style="<?php if ($weightErr != "") echo 'border-bottom:2px solid red;'; ?>">
                                    <input type="number" class="product-stock" name="product-stock" placeholder="Stock" value="<?php echo $stock; ?>" style="<?php if ($stockErr != "") echo 'border-bottom:2px solid red;'; ?>">
                                    <input type="text" class="product-description" name="product-description" placeholder="Product description" value="<?php echo $desc; ?>" style="<?php if ($descErr != "") echo 'border-bottom:2px solid red;'; ?>">
                                    <input type="submit" class="submit-btn" value="Add" name="sub">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- image uploading container ending here -->
            <div class="adding-product-animation-container">
                <?php include('../animated/product-update-page2.php'); ?>
            </div>

        </div>

    </div>
    <!--footer-->
    <?php include('../elements/forgot-pass-footer.php') ?>
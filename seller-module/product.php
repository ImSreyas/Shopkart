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
    <title>Seller</title>
    <link rel="stylesheet" href="../css/load.css">
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <!-- <link rel="stylesheet" type="text/CSS" href="css/product-page.css"> -->
    <link rel="stylesheet" type="text/CSS" href="css/product.css">

</head>

<body class="my-body">
    <?php
    include('../loader/loading-div.html');
    ?>
    <script src="../js/loading-div-normal.js"></script>
    <script defer>
        history.replaceState({}, '', 'http://localhost/shop-finder/seller-module/product.php')
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
    $name = "";
    $sub_category = "";
    $category = "";
    $price = "";
    $weight = "";
    $stock = "";
    $desc = "";
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
        include('php/product-upload-validations.php');
    }
    if (isset($_POST['add'])) {
        $stock_value = $_POST['stock'];
        $stock_ = $_POST['add'];
        if ($stock_value != "") {
            $sql10 = "UPDATE product SET stock='$stock_value' WHERE p_id='$stock_'";
            mysqli_query($conn, $sql10);
        }
    }
    if (isset($_POST['remove'])) {
        $remove_id = $_POST['remove'];
        mysqli_query($conn, "UPDATE product SET status=0 WHERE p_id='$remove_id'");
    }
    ?>
    <div class="body1 main-height">
        <div class="product-adding-main-container">


            <div class="adding-product-animation-container">
                <?php include('../animated/adding-product.html'); ?>
            </div>


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
                                    <?php include('../all/category-options/options.html'); ?>
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

        </div>

        <!-- list products available -->

        <div class="product-list-main-container">
            <?php
            $sql153 = "SELECT * from product WHERE status='1' order by name";
            $result153 = mysqli_query($conn, $sql153);
            while ($row = $result153->fetch_assoc()) {
                $id = $row['p_id'];
                echo "<div class='product-container-parent'><div class='product-container'>
                <div class='image-container'><img src='../img/product-images/" . $row['image'] . "' class='image-container-inside'></div>
                <div class='data-container'>

                <div class='container-1'>

                <div class='product-name'>" . ucfirst($row['name']) . "</div>
                <div class='p_category'>" . $row['p_category'] . "</div>
                <div class='which-category'>" . $row['category'] . "</div>
                <div class='price'>" . $row['price'] . "₹</div>
                <div class='weight'>" . $row['weight'] . "g</div>
                <div class='stock'>" . $row['stock'] . "</div>
                </div>

                <div class='container-2'>
                <div class='desc'>" . $row['description'] . "</div>
                </div>
                
                </div>
                
                </div>
                <div class='option-main-container'>

                <div class='option-container-form'>
                <form action='' method='POST'>
                <input type='number' placeholder='stock' name='stock' class='i-field'>
                <button type='submit' name='add' value='" . $id . "' class='update-btn'>Update stock</button>
                <button type='submit' name='remove' class='remove-btn' value='" . $id . "'>Remove</button>
                <a href='product-update-page.php?id=" . $id . "' class='update-btn-small-link'><div class='update-product-small-btn'>Update</div></a>
                </form>
                </div>
              
                </div>

                </div>";
            }
            ?>
        </div>
    </div>
    <!--footer-->
    <?php include('../elements/forgot-pass-footer.html') ?>
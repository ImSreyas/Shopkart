<?php session_start();
include('../data-base/constant.php');
if (isset($_POST['submit'])) {
    if (!isset($_SESSION['customer-id'])) header('location:../log-in.php');
}
if (isset($_SESSION['customer-id'])) $customer_id = $_SESSION['customer-id'];
$seller_id = $_GET['id'];

$duplicate = 1;

if (isset($_POST['submit'])) {

    $sql033 = "select * from product order by p_id desc";
    $res003 = mysqli_query($conn, $sql033);
    while ($row003 = $res003->fetch_assoc()) {
        $total_rows = $row003['p_id'];
        break;
    }

    $sql334 = "SELECT id from order_list where c_id='$customer_id' && s_id='$seller_id' order by id desc";
    $res334 = mysqli_query($conn, $sql334);

    while ($row334 = $res334->fetch_assoc()) {
        $duplicate = $row334['id'] + 1;
        break;
    }

    for ($i = 1; $i <= $total_rows; $i++) {
        if (isset($_POST['name' . $i])) {
            $product_name = $_POST['name' . $i]; // todo:don't go to the ordering page when the selected stock is empty or 0
            // if(isset($_POST['stock']))
            $stock = $_POST['stock' . $i];
            // else continue;
            $sql610 = "INSERT into order_list set id='$duplicate',c_id='$customer_id',s_id='$seller_id',products='$product_name',stock='$stock'";
            mysqli_query($conn, $sql610);
            mysqli_query($conn, "UPDATE product SET stock = stock-$stock WHERE p_id=$product_name");
            // $res444 = mysqli_query($conn, "SELECT stock FROM product WHERE p_id=$product_name");
            // if($row444 = $res444->fetch_assoc())
            // if($row444['stock']==0)mysqli_query($conn, "UPDATE product SET status=-1 WHERE p_id=$product_name");
            header("location:place-order.php?id=" . $seller_id);
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="../seller-module/css/product.css">
    <link rel="stylesheet" type="text/CSS" href="css/product-page.css">
    <script src='../js/popup-notification.js'></script>
    <script>
        window.history.replaceState({}, '', window.location.href)
    </script>
    <script src="../js/responsiveNavigation.js" defer></script>
</head>

<body class="my-body">
    <div class="body1 main-height">

        <?php
        $sql129 = "select * from seller where id='$seller_id'";
        $res129 = mysqli_query($conn, $sql129);
        while ($row129 = $res129->fetch_assoc()) {
            $shop_name = $row129['shop_name'];
            $shop_description = $row129['description'];
            $shop_cover_image = $row129['cover_img'];
            $shop_location = $row129['location'];
            $shop_rating = $row129['rating'];
            $shop_t_rating = $row129['total_rating'];
            $shop_category = $row129['category'];
            $shop_phone_one = $row129['phone1'];
            $shop_phone_two = $row129['phone2'];
            $shop_status = ($row129['shop_status'])? 'opened' : 'closed';
            $discount = $row129['discount'];
        }
        ?>
        <!-- menu start -->

        <!-- there is no menu in this page...  -->

        <!-- menu end -->

        <!--body-->


        <div class="top-header-container">
            <div class="shop-name-main-container">
                <div class="shop-name-text-container">
                    <span class="shopName-wrapper">
                        <a class="search-page-link" href='../search.php'><span class="show-images"></span></a>
                        <span class="shopName-wrapper-content"><?php echo ucfirst($shop_name); ?></span>
                    </span>
                    <span class="button-main-container">
                        <a href="#product-section" class="to-productSection-link">
                            <span class="goto-shopping-link">
                                purchase
                            </span>
                        </a>
                    </span>
                </div>
            </div>
            
                <div class="image-container-parent">
                    <div class="image-container">
                        <img src="../<?php echo $shop_cover_image; ?>" class="shop-cover-image">
                    </div>
                    <div class="other-info-container">
                        <div class="status-container">
                            <span class="circle-container status-image"></span>
                            <span class="status-content-container">
                                <?php echo $shop_status ?>
                            </span>
                        </div>
                        <div class="off-container">
                            <span class="circle-container off-image"></span>
                            <span class="off-content-container">
                                <?php echo $discount ?>% off
                            </span>
                        </div>
                    </div>
                    <div class="shop-description">
                        <header>Description</header>
                        <content>
                            <?php echo $shop_description ?>
                        </content>
                    </div>
                </div>
                <div class="details-container">
                    <div class="product-details">
                        <div class="location-container">
                            <span class="setImageBackground"></span>
                            <span class="details-label">location</span>
                            <span>
                                <?php echo ucfirst($shop_location); ?>
                            </span>
                        </div>
                        <div class="category-container">
                            <span class="setImageBackground"></span>
                            <span class="details-label">category</span>
                            <span>
                                <?php echo ucfirst($shop_category); ?>
                            </span>
                        </div>

                        <span class="shop-rating-container">
                            <span class="setImageBackground"></span>
                            <span class="details-label">rating</span>
                            <span>
                                <?php echo $shop_rating; ?>
                                <span class="setImageBackground star-icon"></span>
                                <span class="shop-total-rating-container">
                                    ( <?php echo $shop_t_rating; ?> ) 
                                </span>
                            </span>
                        </span>
                        <div class="phone1-container">
                            <span class="setImageBackground"></span>
                            <span class="details-label">phone 1</span>
                            <span class="phone1-container-content">
                                <?php echo $shop_phone_one; ?>
                                <span class="copy-image" id="ci1"></span>
                            </span>
                        </div>
                        <span class="phone2-container" id="phone2-container">
                            <span class="setImageBackground"></span>
                            <span class="details-label">phone 2</span>
                            <span class="phone2-container-content" isThere=
                            <?php if($shop_phone_two == '') echo 'false'; else echo 'true' ?>
                            >
                                <?php echo $shop_phone_two; ?>
                                <span class="copy-image" id="ci2"></span>
                            </span>
                        </span>
                    </div>
                </div>
        </div>

        <script>
            let number = document.getElementById("phone2-container").innerHTML

            if (number.length < 55) document.getElementById("ci2").style.display = "none"

            document.getElementById("ci1").addEventListener("click", () => {
                navigator.clipboard.writeText(document.querySelector(".phone1-container-content").textContent)
                popup(string=`phone number <u>${document.querySelector(".phone1-container-content").textContent}</u> copied to clipboard`, color='blue')
            });
            document.getElementById("ci2").addEventListener("click", () => {
                navigator.clipboard.writeText(document.querySelector(".phone2-container-content").textContent)
                popup(string=`phone number <u>${document.querySelector(".phone2-container-content").textContent}</u> copied to clipboard`, color='blue')
            });
            const phn2 = document.querySelector('.phone2-container-content')
            if(phn2.getAttribute('isThere') === 'false')
                phn2.parentElement.style.display = 'none'
        </script>

        <div class="image-purchase-container">
            <!-- <a href="#product-section" class="purchase-container-a">
                <div class="purchase-product-container" hidden>
                    <img src="" class="purchase-product-image-inside">
                    <div class="purchase">purchase</div>
                </div>
            </a> -->

            <!-- <div class="shop-images-container-main">
                <button class="move-btn prev" moveBtn="prev"></button>
                <button class="move-btn next" moveBtn="next"></button>
                <ul data-slides>
                    <?php
                    $sql462 = "select image from shop_images where s_id='$seller_id'";
                    $res462 = mysqli_query($conn, $sql462);
                    if ($res462->num_rows > 0) {
                        while ($row462 = $res462->fetch_assoc()) {
                            echo "<li class='slide'><img src='../" . $row462['image'] . "' slide-active></li>";
                        }
                    } else {
                        echo "<i class='no-shop-images'></i>";

                        echo "</li>";
                    }
                    ?>
                </ul>
            </div> -->
            <div class="circle-images-wrapper">
                <?php
                $sql462 = "select image from shop_images where s_id='$seller_id'";
                $res462 = mysqli_query($conn, $sql462);
                if ($res462->num_rows > 0) {
                    while ($row462 = $res462->fetch_assoc()) {
                        echo "<div class='__images'><img src='../" . $row462['image'] . "'></div>";
                    }
                } else {
                    echo "<div class='no-shop-images'></div>";
                }
                ?>
            </div>

        </div>
        <script>
            document.querySelectorAll(".slide")[0].setAttribute('data-active', '')
            const buttons = document.querySelectorAll(".move-btn")
            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    const offset = (button.getAttribute("moveBtn") == "next") ? 1 : -1
                    const slides = document.querySelector("[data-slides]")
                    const activeSlide = slides.querySelector("[data-active]")

                    let newIndex = [...slides.children].indexOf(activeSlide) + offset
                    if (newIndex < 0) newIndex = slides.children.length - 1
                    if (newIndex >= slides.children.length) newIndex = 0

                    slides.children[newIndex].dataset.active = true
                    delete activeSlide.dataset.active
                })
            })
        </script>


        <section id="product-section">
            <div class="product-list-main">
                <div class="product-head-container">
                    <div class="products-head">PRODUCTS</div>
                </div>
                <form action="" method="POST">
                    <div class="product-list-container">
                        <?php
                        $sql153 = "SELECT * from product where s_id='$seller_id' && status=1 order by name";
                        $result153 = mysqli_query($conn, $sql153);
                        while ($row = $result153->fetch_assoc()) {
                            $id = $row['p_id'];
                            if ($row['stock'] == 0) $ia = 0;
                            else $ia = 1;
                            echo "<div class='wrapper'>

                            <input type='checkbox' class='checkbox' name='name" . $id . "' value='$id'>

                            <div class='stock-wrapper'>
                            <label for'stockInput' class='stock-label'>Quantity : </label>
                            <input type='number' class='stock-input' name='stock" . $id . "' id='stockInput' value='$ia' min='0' max='" . $row['stock'] . "'>
                            </div>

                            <div class='product-container-parent'>

                            
                            <div class='product-container'>
                            <div class='product-image-container'><img src='../img/product-images/" . $row['image'] . "' class='image-container-inside'></div>
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
                            
                            </div></div></div>";
                        }
                        ?>
                    </div>
                    <div class="buy-cancel-container">
                        <button type="reset" class="cancel-btn">Cancel</button>
                        <button type="submit" class="buy-btn" name='submit'>Buy Now</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!--footer-->
    <?php include('../elements/forgot-pass-footer.html') ?>
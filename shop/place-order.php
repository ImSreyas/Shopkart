<?php
session_start();
include('../data-base/constant.php');
if (!isset($_SESSION['customer-id'])) header('location:../log-in.php');
if (isset($_SESSION['customer-id'])) $customer_id = $_SESSION['customer-id'];
$seller_id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" href="css/place-order.css">
    <script src="../js/responsiveNavigation.js" defer></script>
</head>

<body class="my-body">


    <!-- menu start -->

    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">

        <div class='product-list-main-container'>
            <?php
            $sum = 0;
            $res109 = mysqli_query($conn, "SELECT * FROM order_list WHERE s_id='$seller_id' && c_id='$customer_id' ORDER BY id DESC");
            while ($row109 = $res109->fetch_assoc()) {
                $final = $row109['id'];
                break;
            }
            $sql469 = "SELECT * FROM order_list WHERE s_id='$seller_id' && c_id='$customer_id' && id='$final'";
            $res469 = mysqli_query($conn, $sql469);
            if ($res469->num_rows != 0) {
                while ($row469 = $res469->fetch_assoc()) {

                    $product_id = $row469['products'];
                    $stock_amount = $row469['stock'];

                    $res006 = mysqli_query($conn, "SELECT * FROM product WHERE p_id='$product_id'");


                    while ($row006 = $res006->fetch_assoc()) {


                        $product_name = $row006['name'];
                        $product_price_total = $stock_amount * $row006['price'];
                        $sum += $product_price_total;
                        $product_price = $row006['price'];
                        $product_weight_total = $stock_amount * $row006['weight'];
                        $product_weight = $row006['weight'];

                        echo "
                    <div class='product-one-container'>
                    <div class='product-name-container'>" . ucfirst($product_name) . "</div>
                    <table>
                    <tr><td>quantity</td><td class='stock-container'>" . $stock_amount . "</td></tr>
                    <tr><td>weight</td><td><span class='total-weight'>" . $product_weight_total . "g</span><span class='net-weight'> ( " . $stock_amount . " x " . $product_weight . "g ) </span></td></tr>
                    <tr><td>price</td><td><span class='product-price' id='price-total-individual' value='$product_price_total'>" . $product_price_total . "₹  </span><span class='product-net-container'>  ( " . $stock_amount . " x " . $product_price . "₹ )</span></td></tr>
                    </table>
                    </div>
                    ";
                    }
                }
                echo "<table><tr><td>TOTAL</td><td class='total_price_new'>" . $sum . "₹</td></tr></table>";
            } else {
                echo "
            <div class='something-went-wrong-container'>something went wrong
            </div>
            ";
            }

            ?>
            <?php
            if (isset($_POST['buy'])) {
                $location_select = $_POST['location'];
                $delivery_method = $_POST['del_method'];
                $res559 = mysqli_query($conn, "SELECT max(id) FROM order_list WHERE c_id='$customer_id' && s_id='$seller_id'");
                $row559 = $res559->fetch_array();
                $lar = $row559[0];
                echo $lar;

                $sql734 = mysqli_query($conn, "UPDATE order_list SET location='$location_select',delivery='$delivery_method',total='$sum',active='1' WHERE c_id='$customer_id' && s_id='$seller_id' && id='$lar'");
                header('location:../order.php?from=order&duration=2000');
            }
            ?>
        </div>
        <form action="" method="POST">


            <?php
            if (isset($_POST['cancel_order'])) {
                $sql_cancel_order = mysqli_query($conn, "DELETE FROM order_list WHERE s_id='$seller_id' && c_id='$customer_id' && id='$final'");
                echo "
                <script>location.href = 'product-page.php?id=" . $seller_id . "'</script>
                ";
                // header('location:product-page.php?id=' . $seller_id);
            }
            ?>


            <div class='cancel-btn-middle'><button type="submit" name='cancel_order'>cancel</button></div>
            <div class="location-container">
                <?php
                $res620 = mysqli_query($conn, "select location from customer where id='$customer_id'");
                while ($row620 = $res620->fetch_assoc()) {
                    $location = $row620['location'];
                    break;
                }
                echo "<div class='location-header'>Location</div>";
                echo "<div class='location-container-inside'>
                <input type='text' name='location' id='location' value='$location' disabled required><br>
                <button type='button' onclick='changeLocation();'>change</button>
                </div>";
                $res339 = mysqli_query($conn, "select home_delivery from seller where id=$seller_id");
                while ($row339 = $res339->fetch_assoc()) {
                    $delivery_status_d = $row339['home_delivery'];
                    break;
                }
                ?>

            </div>
            <script>
                const changeLocation = () => {
                    document.getElementById("location").removeAttribute("disabled")
                    document.getElementById("location").style.borderBottom = "1px solid black"
                }
            </script>
            <div class="delivery-method-main-container">
                <div class="delivery-method-header">Delivery method</div>
                <div class="delivery-method-body">
                    <div>
                        <input type="radio" name="del_method" id="del_method2" value="0" checked>
                        <label for="del_method2">Pick up from shop</label>
                    </div>
                    <div>
                        <input type="radio" name="del_method" id="del_method" value="1" <?php if ($delivery_status_d == 0) echo "disabled" ?>>
                        <label for="del_method">Home delivery</label><br>
                    </div>
                </div>
            </div>
            <div class="buy-btn-container">
                <button type="submit" name="buy" class="buy-btn" onclick="changeLocation();">buy</button>
            </div>
        </form>
    </div>
    <!--footer-->
    <?php include('../elements/forgot-pass-footer.html') ?>
<?php
session_start();
include('../../data-base/constant.php');
if (!isset($_SESSION['seller-id'])) header('location:../../log-in-seller.php');
if (isset($_SESSION['seller-id'])) $seller_id = $_SESSION['seller-id'];
$order_id = $_GET['oid'];
$customer_id = $_GET['cid'];
mysqli_query($conn, "UPDATE order_list SET delivery_stage='1' WHERE id='$order_id' && c_id='$customer_id'");
?>

<?php 
if(isset($_POST['submit'])){
mysqli_query($conn, "UPDATE order_list SET delivery_stage='2' WHERE id='$order_id' && c_id='$customer_id'");
header('location:../seller-index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="../css/main.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../shop/css/place-order.css">
    <link rel="stylesheet" href="../css/request-process.css">
    <script>window.history.replaceState({},'',window.location.href)</script>
</head>

<body class="my-body">


    <!-- menu start -->

    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">
        
        <div class='product-list-main-container'>
            <?php
            $sum = 0;
            $sql469 = "SELECT * FROM order_list WHERE id='$order_id' && c_id='$customer_id'";
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
        </div>
        <div class="packed-btn-container">
            <form action="" method="POST">
            <button type="submit" class="pack-btn" name="submit">Packed</button>
            </form>
        </div>
    </div>
    <!--footer-->
</body>
</html>
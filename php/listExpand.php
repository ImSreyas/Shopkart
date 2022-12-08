<?php 
include('../data-base/constant.php');
$customer_id = $_POST['customer_id'];
$shop_id = $_POST['shop_id'];
$shop_name = $_POST['shop_name'];
$id = $_POST['id'];

// -MAIN CONTENT starts here 
echo "
<div class='shop-name-container-expanded'>".ucfirst($shop_name)."</div>
<div class='product-list-name'>Product list</div>
";
echo "<div class='single-product-details-container-parent'>"; //-MAIN CONTAINER holding products
//-select all PRODUCTS
$products = mysqli_query($conn, "SELECT * FROM order_list WHERE id=$id && c_id=$customer_id && s_id=$shop_id");
while($row = $products->fetch_assoc()){
    $product_id = $row['products'];
    $quantity = $row['stock'];
    $total_price = $row['total'];
    //*selecting PRODUCT DETAILS
    $product_details = mysqli_query($conn, "SELECT * FROM product WHERE p_id=$product_id");
    while($details = $product_details->fetch_assoc()){
        $product_name = $details['name'];
        $price = $details['price']*$quantity;
        echo "
        <div class='single-product-details-container'> 
            <table>
                <tr>
                    <td>$product_name</td>
                    <td>$quantity
                        <span class='net-quantity'>(NET)</span>
                    </td>
                    <td class='price-of-product'>₹$price</td>
                </tr>
            </table>
        </div>
        ";
    }
}
echo "</div>";
echo "
<div class='total-price-container'>Total 
<div class='total-money-text'>₹$total_price</div>
</div>";
// <div class='range-container'><input type='range' min=1 max=1000000000 value=2></div>
// ";
?>



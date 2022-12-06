<?php
include('../data-base/constant.php');
$button = null;
$customer_id = $_POST['customer_id'];
if (isset($_POST['button'])) {
    $button = $_POST['button'];
}
switch ($button) {
    case "wait":
        $num = 0;
        break;
    case "process":
        $num = 1;
        break;
    case "pack":
        $num = 2;
        break;
    case "ofd":
        $num = 3;
        break;
    case "complete":
        $num = 4;
        break;
    default:
        $num = 100;
}
$sql = ($num == 100) ? "SELECT * FROM order_list WHERE c_id=$customer_id && active=1" : "SELECT * FROM order_list WHERE c_id=$customer_id && delivery_stage=$num && active=1";
$res = mysqli_query($conn, $sql);
$count = $c = 0;
// -select all orders of the customer
// ?also it will skip after when same id comes and same seller comes....  
while ($row = $res->fetch_assoc()) {
    if ($row['id'] == $count && $row['s_id'] == $c) {
        break;
    }
    $total = $row['total'];
    $count = $row['id'];
    $shop_id = $c = $row['s_id'];
    // -this will take the name of the shop from table seller
    while ($row_1 = mysqli_query($conn, "SELECT shop_name FROM seller where id=$shop_id")->fetch_assoc()) {
        $shop_name = $row_1['shop_name'];
        break;
    }
    echo "
    <div class='single-order-container'>
    <div class='shop-name-container'>$shop_name</div>";
    
    $productCountRemember = 1; 
    $secondProduct = "";
    $queryToExecute = ($num == 100) ? "SELECT * FROM order_list WHERE id=$count && c_id=$customer_id && active=1" : "SELECT * FROM order_list WHERE id=$count && c_id=$customer_id && delivery_stage=$num && active=1";
    $res1 = mysqli_query($conn, $queryToExecute);
    // -select a single order individually (id : 111 222 3 44 11 11 2 333 4444 1 22 3 444)
    while ($row_2 = $res1->fetch_assoc()) {
        $product_id = $row_2['products'];
        $res2 = mysqli_query($conn, "SELECT name FROM product where p_id = $product_id");
        // -select individual products 
        while ($row_3 = $res2->fetch_assoc()) {
            if($productCountRemember == 3){
                break;
            }
            if($productCountRemember == 2){
                $secondProduct = "...";
            }
            $productCountRemember++;
            $product_name = $row_3['name'];
            echo "<div class='product-reference'>
            $product_name$secondProduct
            </div>";
        }
    }
    // *delivery stage setting process 
    switch($row['delivery_stage']){
        case 0 : $delivery_stage = "Waiting";break;
        case 1 : $delivery_stage = "Processing";break;
        case 2 : $delivery_stage = "Packed";break;
        case 3 : $delivery_stage = "Out for delivery";break;
        case 4 : $delivery_stage = "Delivered";break;
        default : $delivery_stage = "canceled";break;
    }
    // *delivery stage setting process is over 
    echo "
    <div class='total-money-container'>Total<span class='total-money'>$total</span></div>
    <div class='delivery-status-container'>$delivery_stage</div>
    </div>
    ";
}
if ($res->num_rows == 0 && $num == 100) {
    echo "
    <div class='no-list-available'>
    <div class='no-list-container'>It seems like you don't purchased anything...!</div>
    <div><button class='go-to-purchase-button'>Go to purchase</button></div>
    </div>
    ";
} elseif ($res->num_rows == 0) {
    echo "
    <div class='no-list-available'>
    <div class='no-list-container'>No orders are available in this stage.</div>
    </div>
    ";
}

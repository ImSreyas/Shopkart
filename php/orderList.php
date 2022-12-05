<?php
include('../data-base/constant.php');
$button = null;
$customer_id = $_POST['customer_id'];
if(isset($_POST['button'])){
    $button = $_POST['button'];
}
switch($button){
    case "wait" : $num = 0;break;
    case "process" : $num = 1;break;
    case "pack" : $num = 2;break;
    case "ofd" : $num = 3;break;
    case "complete" : $num = 4;break;
    default : $num = 100;
}
$sql = ($num == 100) ? "SELECT * FROM order_list WHERE c_id=$customer_id && active=1" : "SELECT * FROM order_list WHERE c_id=$customer_id && delivery_stage=$num && active=1";
$res = mysqli_query($conn, $sql);
while($row = $res->fetch_assoc()){
    echo $row['total'];
    echo "<br>";
}
if($res->num_rows == 0 && $num == 100){
    echo "
    <div class='no-list-available'>
    <div class='no-list-container'>It seems like you don't purchased anything...!</div>
    <div><button class='go-to-purchase-button'>Go to purchase</button></div>
    </div>
    ";
}elseif($res->num_rows == 0){
    echo "
    <div class='no-list-available'>
    <div class='no-list-container'>No orders are available in this stage.</div>
    </div>
    ";
}
?>
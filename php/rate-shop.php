<?php 
$rating = $_POST['rating'];
$shop_id = $_POST['shop_id'];
include("../data-base/constant.php");
$update = "UPDATE seller SET rating=(((total_rating*rating)+$rating)/(total_rating+1)), total_rating=(total_rating+1) WHERE id=$shop_id";
$res = mysqli_query($conn, $update);
if($res)echo "what the fuck"
?>
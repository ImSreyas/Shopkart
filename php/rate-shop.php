<?php 
include("../data-base/constant.php");
$rating = $_POST['rating'];
$shop_id = $_POST['shop_id'];
$customer_id = $_POST['customer_id'];
$get_rating = mysqli_query($conn, "SELECT * FROM rating WHERE c_id=$customer_id && s_id=$shop_id");
while($rating_row = $get_rating->fetch_assoc()){
    $old_rating = $rating_row['rating'];
    $rating_change = $rating - $old_rating;
    break;
}
//-updating SELLER TABLE
$update =($get_rating->num_rows == 0) ?
"UPDATE seller SET rating=(((total_rating*rating)+$rating)/(total_rating+1)), total_rating=(total_rating+1) WHERE id=$shop_id":
"UPDATE seller SET rating=(((total_rating*rating)+$rating_change)/(total_rating)) WHERE id=$shop_id";
mysqli_query($conn, $update);

//-exist or not : INSERT
$ex = ($get_rating->num_rows == 0) ? 
"INSERT INTO rating SET c_id=$customer_id, s_id=$shop_id, rating=$rating" :
"UPDATE rating SET rating=$rating WHERE c_id=$customer_id && s_id=$shop_id";
mysqli_query($conn, $ex);

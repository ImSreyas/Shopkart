<?php 
session_start();
include('../data-base/constant.php');
$sort_filter = $_POST['sort'];
$category_filter = $_POST['category'];
$customer_id = (isset($_SESSION['customer-id']))
? $_SESSION['customer-id']
: 0;
if($customer_id != 0){
$customer_location = mysqli_query($conn, "SELECT location FROM customer WHERE id=$customer_id");
$customer_location = $customer_location->fetch_assoc();
$customer_location = $customer_location['location'];
}

$category_filter = ($category_filter == "All")
? ""
: "&& category='$category_filter'";

switch($sort_filter){
    case 0: $ex = "SELECT * FROM seller WHERE removed=false && status=1 $category_filter ORDER BY rating DESC";
    break;
    case 1: $ex = "SELECT * FROM seller WHERE removed=false && status=1 $category_filter ORDER BY shop_name";
    break;
    case 2: $ex = "SELECT * FROM seller WHERE removed=false && status=1 $category_filter ORDER BY total_rating DESC";
    break;
    case 3: $ex = "SELECT * FROM seller WHERE removed=false && status=1 $category_filter && location='$customer_location'";
    break;
}
$seller_details = mysqli_query($conn, $ex);
if($seller_details->num_rows == 0){ 
    echo "
    <div class='not-found-message-o'>
        <content-head>No <content-word-label>shops</content-word-label> available</content-head>
        <content-body>
            <span>We</span>
            <span>are</span>
            <span>really</span>
            <span>sorry</span>
            <span>for</span>
            <span>the</span>
            <span>inconvenience.</span> 
            <span>More</span>
            <span>shops</span>
            <span>will</span>
            <span>be</span>
            <span>available</span>
            <span>soon.</span> 
            <span>Please</span>
            <span>search</span>
            <span>for</span>
            <span>other</span>
            <span>shops.</span> 
            <span>Have</span>
            <span>a</span>
            <span>nice</span>
            <span>day...!</span>
            <span>😉</span>
        </content-body>
    </div>";
    echo "<div class='animation'>";
    include('../animated/no-user.html');
    echo"</div>";
}
while($seller = $seller_details->fetch_assoc()){
    $seller_id = $seller['id'];
    $seller_name = $seller['shop_name'];
    $seller_location = $seller['location'];
    $seller_category = $seller['category'];
    $home_delivery = ($seller['home_delivery'] == 0)
    ? "Not available"
    : "Available";
    $rating = $seller['rating'];
    $total_rating = $seller['total_rating'];
    $status = ($seller['shop_status']==0)
    ? "Closed"
    : "Opened";
    $seller_phone_one = $seller['phone1'];
    $seller_phone_two = $seller['phone2'];
    $ph = ($seller_phone_two == "" || $seller_phone_two == 0)
    ? ""
    : " , <span>$seller_phone_two</span><span class='clipboard-icon-container clipboard2'></span>";
    $seller_profile_image = $seller['cover_img'];

    if ($rating >= 3.5) $rating_color_class = 'rating-green';
    else if($rating >= 2) $rating_color_class = 'rating-yellow';
    else $rating_color_class = 'rating-red';

    echo "
    <a href='shop/product-page.php?id=$seller_id' class='pinterest-layout shop-container-link scroll-animation-hidden'>
    <div class='seller-card-container' show=true>
        <div class='profile-and-name-container'>
            <div class='profile-container'>
                <img src='$seller_profile_image'>
            </div>
            <div class='name-container'>
                <div class='label'>shop name</div>
                <div class='name'>".ucfirst($seller_name)."</div>
            </div>
        </div>
        <div class='details-and-remove-btn-container'>
            <div class='seller-details-container'>
                <div class='label'>Details</div>
                <div class='details'>
                    <div class='rating-container'>
                        <span class='rating $rating_color_class'>$rating</span>
                        <span class='star-container'><svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' class='$rating_color_class' data-name='Layer 1' viewBox='0 0 24 24'><path d='M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z'/></svg></span>
                        <span class='total-rating'>($total_rating)</span>
                    </div><br>
                    <div>location</div><span class='sl'>$seller_location</span><br>
                    <div>category</div><span class='sc'>$seller_category</span><br>
                    <div>status</div><span class='s'>$status</span><br>
                    <div>home delivery</div><span class='hd'>$home_delivery</span><br>
                    <div>phone</div>
                    <span class='sp1'>
                        <span>$seller_phone_one</span>
                        <span class='clipboard-icon-container clipboard1'></span>
                        $ph
                    </span><br>
                </div>
            </div>
        </div>
        <div class='products' list='
        ";
        $product_list = mysqli_query($conn, "SELECT name FROM product WHERE s_id=$seller_id && status=1");
        while($productName = $product_list->fetch_assoc()){
            echo $productName['name'].",";
        }
        echo "'></div></div></a>";
}
?>
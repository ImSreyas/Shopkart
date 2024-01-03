<?php 
include('../../data-base/constant.php');

$value = $_POST['wh'];
$ex = ($value == 1) 
? "SELECT * FROM seller WHERE removed=false" 
: "SELECT * FROM seller WHERE removed=true";
$seller_details = mysqli_query($conn, $ex);
if($seller_details->num_rows == 0 && $value == 1){ 
    echo "
    <div class='not-found-message-o'>
        <content-head>No <content-word-label>sellers</content-word-label> data found</content-head>
        <content-body>
            <span>Here</span>
            <span>you</span>
            <span>can</span>
            <span>see</span>
            <span>all</span>
            <span>the</span>
            <span>registered</span>
            <span>sellers.</span>
            <span> Admin</span> 
            <span>can</span> 
            <span>remove</span> 
            <span>the</span> 
            <span>sellers</span> 
            <span>if</span> 
            <span>they</span> 
            <span>are</span> 
            <span>not</span> 
            <span>genuine.</span>
        </content-body>
    </div>";
    echo "<div class='animation'>";
    include('../../animated/no-user.html');
    echo"</div>";
} elseif($seller_details->num_rows == 0) {
    echo "
    <div class='not-found-message-o'>
        <content-head>No <content-word-label>sellers</content-word-label> removed yet</content-head>
        <content-body>
            <span>Here</span>
            <span>you</span>
            <span>can</span>
            <span>see</span>
            <span>all</span>
            <span>the</span>
            <span>removed</span>
            <span>sellers.</span>
            <span> Removed</span>
            <span>sellers</span>
            <span>can</span>
            <span>be</span>
            <span>retained</span>
            <span>back</span>
            <span>easily</span>
            <span>by</span>
            <span>undo</span>
            <span>option.</span>
        </content-body>
    </div>";
    echo "<div class='animation'>";
    include('../../animated/no-user.html');
    echo"</div>";
}
while($seller = $seller_details->fetch_assoc()){
    $seller_id = $seller['id'];
    $seller_name = $seller['shop_name'];
    $seller_location = $seller['location'];
    $seller_category = $seller['category'];
    $home_delivery = ($seller['home_delivery']==0)
    ? "Home delivery not available."
    : "Home delivery available.";
    $rating = $seller['rating'];
    $total_rating = $seller['total_rating'];
    $status = ($seller['shop_status']==0)
    ? "Closed"
    : "Opened";
    $seller_phone_one = $seller['phone1'];
    $seller_phone_two = $seller['phone2'];
    $seller_profile_image = $seller['cover_img'];

    if($value == 1){
        $f_name = "removeSeller(this)";
        $content = "Remove";
    } else {
        $f_name = "undoRemove(this)";
        $content = "Undo";
    }

    echo "
    <div class='seller-card-container scroll-animation-hidden' show=true>
        <div class='profile-and-name-container'>
            <div class='profile-container'>
                <img src='../$seller_profile_image'>
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
                    <div>$seller_location</div>
                    <div>
                        <span class='rating'>$rating</span>
                        <span class='total-rating'>($total_rating)</span>
                    </div>
                    <div>$seller_category</div>
                    <div>$status</div>
                    <div>$home_delivery</div>
                    <div>$seller_phone_one</div>
                    <div>$seller_phone_two</div>
                </div>
            </div>
            <div class='remove-btn-container'>
                <button class='remove-btn' onclick=$f_name id='$seller_id'>$content</button>
            </div>
        </div>
    </div>
    ";
}

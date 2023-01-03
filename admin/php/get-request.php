<?php
include('../../data-base/constant.php');
$sql = "SELECT * FROM seller WHERE status=0";
$seller_list = mysqli_query($conn, $sql);

if ($seller_list->num_rows > 0) {
    while ($seller = $seller_list->fetch_assoc()) {
        $license_number = $seller['license_no'];
        $seller_id = $seller['id'];
        $seller_name = $seller['shop_name'];
        $seller_location = $seller['location'];
        $seller_category = $seller['category'];
        $email = $seller['email'];
        $seller_phone_one = $seller['phone1'];
        $seller_phone_two = ($seller['phone2'] == 0) ? "" : $seller['phone2'];
        $seller_profile_image = $seller['cover_img'];

        echo " 
        <div class='seller-card-request-container scroll-animation-hidden' show=true>
            <div class='profile-and-name-container'>
                <div class='profile-container'>
                    <img src='../$seller_profile_image'>
                </div>
                <div class='name-container'>
                    <div class='label'>shop name</div>
                    <div class='name'>" . ucfirst($seller_name) . "</div>
                </div>
            </div>
            <div class='details-and-remove-btn-container'>
                <div class='seller-details-container'>
                    <div class='label'>Details</div>
                    <div class='details'>
                        <div class='l-no'>$license_number</div>
                        <div>$seller_location</div>
                        <div>$seller_category</div>
                        <div>$email</div>
                        <div>$seller_phone_one</div>
                        <div>$seller_phone_two</div>
                    </div>
                </div>
                <div class='remove-btn-container'>
                    <button class='accept' onclick=acceptOrReject(this,1) id='$seller_id'>Accept</button>
                    <button class='reject' onclick='acceptOrReject(this,2)' id='$seller_id'>Reject</button>
                </div>
            </div>
        </div>
        ";
    }
} else {
    echo "
    <div class='not-found-message-o'>
        <content-head>No <content-word-label>requests</content-word-label> found yet</content-head>
        <content-body>
            <span>Here</span>
            <span>you</span>
            <span>can</span>
            <span>see</span>
            <span>the</span>
            <span>request</span>
            <span>from</span>
            <span>the</span>
            <span>sellers.</span>
            <span>Seller</span>
            <span>can</span>
            <span>only</span>
            <span>start</span>
            <span>selling</span>
            <span>product</span>
            <span>after</span>
            <span>the</span>
            <span>admin</span>
            <span>verify</span>
            <span>the</span>
            <span>seller.</span>
            <span>Admin</span>
            <span>can</span>
            <span>reject</span>
            <span>the</span>
            <span>request</span>
            <span>if</span>
            <span>the</span>
            <span>seller</span>
            <span>is</span>
            <span>not</span>
            <span>genuine.</span>
        </content-body>
    </div>";
    echo "<div class='animation'>";
    include('../../animated/no-user.html');
    echo "</div>";
}

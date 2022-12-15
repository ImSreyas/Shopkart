<?php 
include('../../data-base/constant.php');

$value = $_POST['wh'];
$ex = ($value == 1) 
? "SELECT * FROM customer WHERE removed=false" 
: "SELECT * FROM customer WHERE removed=true";
$customer_details = mysqli_query($conn, $ex);
if($customer_details->num_rows == 0){ 
    echo "<div class='animation'>";
    include('../../animated/no-user.html');
    echo"</div>";
}
while($customer = $customer_details->fetch_assoc()){
    $customer_id = $customer['id'];
    $customer_name = $customer['name'];
    $customer_location = $customer['location'];
    $customer_phone_one = $customer['phone1'];
    $customer_phone_two = $customer['phone2'];
    $customer_profile_image = $customer['profile_image'];

    if($value == 1){
        $f_name = "removeUser(this)";
        $content = "Remove";
    } else {
        $f_name = "undoRemove(this)";
        $content = "Undo";
    }

    echo "
    <div class='customer-card-container' show=true>
        <div class='profile-and-name-container'>
            <div class='profile-container'>
                <img src='../$customer_profile_image'>
            </div>
            <div class='name-container'>
                <div class='label'>Name</div>
                <div class='name'>".ucfirst($customer_name)."</div>
            </div>
        </div>
        <div class='details-and-remove-btn-container'>
            <div class='customer-details-container'>
                <div class='label'>Details</div>
                <div class='details'>
                    <div>$customer_location</div>
                    <div>$customer_phone_one</div>
                    <div>$customer_phone_two</div>
                </div>
            </div>
            <div class='remove-btn-container'>
                <button class='remove-btn' onclick=$f_name id='$customer_id'>$content</button>
            </div>
        </div>
    </div>
    ";
}
?>
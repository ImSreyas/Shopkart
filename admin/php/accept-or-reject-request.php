<?php 
include('../../data-base/constant.php');
$id = $_POST['id'];
$value = $_POST['value'];
mysqli_query($conn, "UPDATE seller SET status=$value WHERE id=$id");
?>
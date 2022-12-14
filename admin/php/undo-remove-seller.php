<?php 
include('../../data-base/constant.php');

$id = $_POST['id'];
mysqli_query($conn, "UPDATE seller SET removed=false WHERE id=$id")
?>
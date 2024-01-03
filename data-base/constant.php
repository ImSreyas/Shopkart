<?php
    define('LH','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DB_NAME','shop-finder');

    $conn = mysqli_connect(LH , USERNAME , PASSWORD) or die(mysqli_connect_error());
    $db_select = mysqli_select_db($conn , DB_NAME) or die(mysqli_connect_error());
?>
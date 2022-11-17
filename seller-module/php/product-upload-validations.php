<?php
$name = $_POST['product-name'];
$sub_category = $_POST['product-sub-category'];
$category = $_POST['product-category'];
$price = $_POST['product-price'];
$weight = $_POST['product-weight'];
$stock = $_POST['product-stock'];
$desc = $_POST['product-description'];

$cover_image = $_FILES['image'];
$fileName = $_FILES['image']['name'];
$fileTempName = $_FILES['image']['tmp_name'];
$fileSize = $_FILES['image']['size'];
$fileError = $_FILES['image']['error'];
$fileType = $_FILES['image']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));


if ($name == "") {
    $nameErr = "*";
}
if ($sub_category == "") {
    $sub_categoryErr = "*";
}
if ($price < 1) {
    $priceErr = "*";
}
if ($weight < 1) {
    $weightErr = "*";
}
if ($stock > 10000000) {
    $stockErr = "*";
}
if (!preg_match("/^.{0,250}+$/", $desc)) {
    $descErr = "*";
}
if ($nameErr == "" && $sub_categoryErr == "" && $priceErr == "" && $weightErr == "" && $stockErr == "" && $descErr == "") {
    if (!$fileName == "") {
        if ($fileError === 0) {
            if ($fileSize < 1024000) {
                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../img/product-images/' . $fileNewName;
                move_uploaded_file($fileTempName, $fileDestination);
                $fileDestination_new = $fileNewName;
            } else {
                $coverImageError = "*Image size is too big";
            }
        } else {
            $coverImageError = "*Some error occurred.Please choose an image one more time.";
        }
    } else {
        $coverImageError = "*Select an image";
    }

    if ($coverImageError == "") {

        $sql1 = "select * from product where name='$name' and s_id='$seller_id'";
        $result1 = mysqli_query($conn, $sql1);
        while ($row = $result1->fetch_assoc()) {
            if ($row['price'] == $price || $row['weight'] == $weight) $flag = 1;
        }
        if ($flag == 0) {
            $sql2 = "insert into product set 
            s_id='$seller_id',
            name='$name',
            p_category='$sub_category',
            category = '$category',
            weight = '$weight',
            price = '$price',
            description = '$desc',
            stock = '$stock',
            image = '$fileDestination_new'
            ";
            mysqli_query($conn, $sql2);
            header('location:product.php');
        }
    }
}
?>

<?php
session_start();
if ($_SESSION['admin-id'] != 1) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="css/cu-ma.css">
    <script src='../jquery/jquery.js'></script>
</head>

<body class="real-body">
    <!-- menu -->
    <nav class="nav-bar">
        <ul>
            <a href="manage-seller.php" class="no-text-decoration">
                <li class="category">manage seller</li>
            </a>
            <a href="manage-customer.php" class="no-text-decoration">
                <li class="order highlight">manage customer</li>
            </a>
            <a href="system.php" class="no-text-decoration">
                <li class="profile">system control</li>
            </a>
            <a href="log-out.php" class="no-text-decoration">
                <li class="login">log out</li>
            </a>
        </ul>
    </nav>
    <!-- body -->
    <div class="btn-container">
        <button class="users-btn" selected=true onclick="btnClicked(1)">Users</button>
        <button class="removed-btn" selected=false onclick="btnClicked(2)">Removed</button>
    </div>
    <div class="body admin-body">

    </div>
    <script>
        function btnClicked(value){
            if(value == 1){
                document.querySelector(".users-btn").setAttribute("selected",true)
                document.querySelector(".removed-btn").setAttribute("selected",false)
                getUsers(1)
            } else {
                document.querySelector(".users-btn").setAttribute("selected",false)
                document.querySelector(".removed-btn").setAttribute("selected",true)
                getUsers(2)
            }

        }
        getUsers(1)
        function getUsers(value){
            if(value == 1){
            $.ajax({
                url:'php/get-users.php',
                type:'POST',
                data: {wh: value},
                success: (data) => {
                    $(".body").html(data)
                }
            })
        } else {
            $.ajax({
                url:'php/get-users.php',
                type:'POST',
                data: {wh: value},
                success: (data) => {
                    $(".body").html(data)
                }
            })
        }
        }
        function removeUser(item){
            const id = item.getAttribute("id");
            $.ajax({
                url:'php/remove-user.php',
                type:'POST',
                data: {id : id},
                success: () => {
                    getUsers(1)
                }
            })
        }
        function undoRemove(item){
            const id = item.getAttribute("id");
            $.ajax({
                url:'php/undo-remove.php',
                type:'POST',
                data: {id : id},
                success: () => {
                    getUsers(2)
                }
            })
        }
    </script>
</body>
</html>
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
    <div class="btn-container-wrapper">
        <div class="search-bar-wrapper">
            <?php include('../search-bar/search-bar.html')?>
        </div>
        <div class="btn-container">
            <button class="users-btn" selected=true onclick="btnClicked(1)">Users</button>
        <button class="removed-btn" selected=false onclick="btnClicked(2)">Removed</button>
        </div>
    </div>
    <div class="body admin-body">

    </div>
    <script>
        //-search functionalities : START

        function search(item){
            const cards = document.querySelectorAll(".customer-card-container")
            Array.prototype.forEach.call(cards, (card) => {
                card.setAttribute('show',false)
            })
            let i, j
            const text = item.value.toLowerCase()
            const names = document.querySelectorAll(".name")
            Array.prototype.forEach.call(names, (name) => {
                let check = true
                j = 0
                nameText = name.innerHTML.toLowerCase()
                for(i=0; i<text.length; i++){
                    if(nameText.includes(text[i], j)){
                        j = nameText.indexOf(text[i], j) + 1
                        continue
                    }
                    check = false
                    break
                }
                if(check == true){
                    let c = name.parentElement.parentElement.parentElement
                    c.setAttribute('show',true)
                }
            })
        }
        let searchI = document.querySelector(".search-clear")
        searchI.addEventListener("click", () =>{
            const ch = document.querySelector(".btn-container").children
            Array.prototype.forEach.call(ch, (btn, i) => {
                if((btn.getAttribute("selected")) === 'true') {
                    if(i == 0) getUsers (1)
                    else getUsers(2)
                }
            })
        })

        //-search functionalities : ENDS 

        function btnClicked(value){
            const ch = document.querySelector(".btn-container").children
            console.log(ch)
            Array.prototype.forEach.call(ch, (btn) => {
                btn.setAttribute("selected",false)
            })
            ch[value-1].setAttribute("selected",true)
            if(value == 1) getUsers(1)
            else getUsers(2)
        }
        getUsers(1)
        function getUsers(value){
            $.ajax({
                url:'php/get-users.php',
                type:'POST',
                data: {wh: value},
                success: (data) => {
                    $(".body").html(data)
                }
            })
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
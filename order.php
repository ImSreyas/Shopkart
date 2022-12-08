<?php session_start();
$customer_id = (isset($_SESSION['customer-id'])) ? $_SESSION['customer-id'] : 0;
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop-finder</title>
    <link rel="stylesheet" type="text/CSS" href="css/main.css">
    <link rel="stylesheet" type="text/CSS" href="css/ORDER.css">
    <link rel="stylesheet" href="css/load.css">
    <script src="jquery/jquery.js"></script>
</head>

<body>
    <?php include('loader/loading-div.html'); ?>
    <script src="js/loading-div-too-slow.js"></script>
    <script>
        window.history.replaceState({}, '', 'order.php')
    </script>

    <!-- menu start -->
    <nav class="nav-bar">
        <ul>
            <a href="index.php" class="no-text-decoration">
                <li class="index ">home</li>
            </a>
            <a href="search.php" class="no-text-decoration">
                <li class="category ">search</li>
            </a>
            <a href="order.php" class="no-text-decoration order-link">
                <li class="order highlight">orders</li>
            </a>
            <a href="profile.php" class="no-text-decoration">
                <li class="profile">profile</li>
            </a>
            <?php
            $user = (!isset($_SESSION['customer-id'])) ? "<a href='log-in.php' class='no-text-decoration'><li class='login'>log in</li></a>" :
                "<a href='log-out.php' class='no-text-decoration'><li class='login'>log out</li></a>";
            echo $user;
            ?>
            <?php
            if (isset($_SESSION['customer-id'])) {
                include('data-base/constant.php');
                $id = $_SESSION['customer-id'];
                $sql1 = "select profile_image from customer where id=$id";
                $res = mysqli_query($conn, $sql1);
                while ($row = $res->fetch_assoc()) {
                    echo "
                    <li class='sre-icon-list'>
                    <a href='profile.php' class='sre-icon-link'>
                    <div class='sre-main-small-image-container'>
                    <div class='sre-profile-image-small-container'>
                    <img src='" . $row['profile_image'] . "' class='sre-img'>
                    </div>
                    </div>
                    </a></li>
                    ";
                }
            }
            ?>
        </ul>
    </nav>
    <!-- menu end -->


    <!--body-->
    <div class="body1 main-height">
        <?php
        if (!isset($_SESSION['customer-id'])) {
            echo "<div class='user-not-found'>
            <div class='user-not-logged-in-container'>
            ";
            include('animated/user-not-logged-in.html');
            echo "
            <div class='question'>Please login to see the orders...!</div>
            <a href='log-in.php' class='p-t-l-link'>
            <div class='profile-to-log-in-page-link-container'>log in</div>
            </a>
            </div>
            </div>";
        }
        ?>

        <!-- main body  -->

        <div class="order-main-body">
            <!-- // -js comes here  -->
            <script>
                // -ajax to call the list of orders from the server 
                $.ajax({
                    url: 'php/orderList.php',
                    type: 'POST',
                    data: {
                        customer_id: <?php echo $customer_id ?>
                    },
                    success: (data) => {
                        $("#listContainer").html(data)
                    }
                })

                function getCode(item) {
                    let allButtons = document.querySelector(".options").children
                    Array.prototype.forEach.call(allButtons, button => {
                        button.setAttribute("selected", "false")
                    })
                    item.setAttribute("selected", "true")
                    $.ajax({
                        url: 'php/orderList.php',
                        type: 'POST',
                        data: {
                            button: item.value,
                            customer_id: <?php echo $customer_id ?>
                        },
                        success: (data, status) => {
                            $("#listContainer").html(data)
                        }
                    })
                }
                // -function that will call when an order is selected 
                function selectedList(item) {
                    Array.prototype.forEach.call(document.querySelector(".list-container").children, (s) => s.setAttribute("selected", "false"))
                    item.setAttribute("selected", "true");
                }
                </script>
            <!-- this container contains all the orders placed by the customer  -->
            <div class="list-container-wrapper">
                <div class="options">
                    <button class="all" id="allButton" value="all" onclick="getCode(this)" selected="true">All</button>
                    <button class="waiting" id="waitingButton" value="wait" onclick="getCode(this)" selected="false">Waiting</button>
                    <button class="processing" id="processingButton" value="process" onclick="getCode(this)" selected="false">Processing</button>
                    <button class="packed" id="packedButton" value="pack" onclick="getCode(this)" selected="false">Packed</button>
                    <button class="out-for-delivery" id="ofdButton" value="ofd" onclick="getCode(this)" selected="false">Out for delivery</button>
                    <button class="completed" id="completedButton" value="complete" onclick="getCode(this)" selected="false">Completed</button>
                </div>
                <div class="line"></div> <!-- it is a line between the two div's on the left side  -->
                <div class="list-container" id="listContainer">
                    <!-- incoming code will be here  -->
                </div>
            </div>
            <!-- this container contains the options and selected purchase list and some other details  -->
            <div class="option-container">
                <div class="order-list" id="orderList">
                        <div class="no-product-is-selected">
                        <div class="shop-name-container-expanded">Shop name</div>
                        <div class="product-list-name">Product list</div>
                        <div class="single-product-details-container-parent">
                            <div class="single-product-details-container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>product</td>
                                            <td>X
                                                <span class="net-quantity">(NET)</span>
                                            </td>
                                            <td class="price-of-product">₹XXX</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="single-product-details-container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>product</td>
                                            <td>X
                                                <span class="net-quantity">(NET)</span>
                                            </td>
                                            <td class="price-of-product">₹XXX</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="single-product-details-container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>product</td>
                                            <td>X
                                                <span class="net-quantity">(NET)</span>
                                            </td>
                                            <td class="price-of-product">₹XXX</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="single-product-details-container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>product</td>
                                            <td>X
                                                <span class="net-quantity">(NET)</span>
                                            </td>
                                            <td class="price-of-product">₹XXX</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="single-product-details-container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>product</td>
                                            <td>X
                                                <span class="net-quantity">(NET)</span>
                                            </td>
                                            <td class="price-of-product">₹XXX</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="single-product-details-container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>product</td>
                                            <td>X
                                                <span class="net-quantity">(NET)</span>
                                            </td>
                                            <td class="price-of-product">₹XXX</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="total-price-container">Total
                            <div class="total-money-text">₹XXXX</div>
                        </div>
                    </div>
                    <div class="not-selected-message">Select an order to see the details...!</div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php include('elements/footer.html') ?>
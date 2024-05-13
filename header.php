<?php
session_start();
include ("Connect.php");
if(!isset($_SESSION["User_ID"])){
    header('Location: login.php');
}
$UserID=$_SESSION["User_ID"] ;
if (isset($_POST["checkout"])) {
    if(isset($_POST["Wheel"])){
        $quantityOfWheel = $_POST["Wheel"];
    }else{
        $quantityOfWheel = 0;
    }
    if(isset($_POST["SteeringWheel"])){
        $quantityOfSteeringWheel = $_POST["SteeringWheel"];
    }else{
        $quantityOfSteeringWheel = 0;
    }
    if(isset($_POST["Clutches"])){
        $quantityOfClutches = $_POST["Clutches"];
    }else{
        $quantityOfClutches = 0;
    }
    // Calculate total quantity
    $total = $quantityOfWheel + $quantityOfClutches + $quantityOfSteeringWheel;
    if ($total != 0) {
        $sqlIntoCart = "INSERT INTO cart(TotalQuantity,UserID) VALUES($total,$UserID)";
        if ($conn->query($sqlIntoCart) === TRUE) {
            $cartID = $conn->insert_id;

            // Insert products into cart_accessories table
            $sqlIntoCartProduct = "INSERT INTO CartautoAccessories (CartID, AutoaccessoryID, Quantity) VALUES ";
            if ($quantityOfWheel > 0) {
                $sqlIntoCartProduct .= "($cartID, 1, $quantityOfWheel),";
            }
            if ($quantityOfSteeringWheel > 0) {
                $sqlIntoCartProduct .= "($cartID, 2, $quantityOfSteeringWheel),";
            }
            if ($quantityOfClutches > 0) {
                $sqlIntoCartProduct .= "($cartID, 3, $quantityOfClutches),";
            }
            // Remove the last comma from the SQL query string
            $sqlIntoCartProduct = rtrim($sqlIntoCartProduct, ",");

            // Execute the query
            if ($conn->query($sqlIntoCartProduct) === TRUE) {
                header("Location: /Payment/index.html");
            } else {
                echo "Error: " . $sqlIntoCartProduct . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sqlIntoCart . "<br>" . $conn->error;
        }
    }
    // Insert total quantity into cart table
}

include("CloseConnect.php");
?>
<div id="header">
    <img src="./assets/css/img/Logo/Logo.jpg" alt="" class="logo">
    <ul id="nav">
        <li><a href="#" onclick="navigateTo('/home.php')">Home</a></li>
        <li><a href="#" onclick="navigateTo('/about.php')">About</a></li>
        <li><a href="#" onclick="navigateTo('/AutoItem.php')">Product</a></li>
        <li><a href="#" onclick="navigateTo('/Service.php')">Service</a></li>
        <li><a href="#" onclick="navigateTo('/contact.php')">ConTact</a></li>

    </ul>
    <div class="cart_login">
        <div class="login-section">
            <div class="ti-user" onclick="navigateTo('/profile.php')"></div>
            <div class="login-button">
                <?php
                if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
                    echo "Hello " . $_SESSION["username"];
                } ?>
            </div>
        </div>
        <div class="cart-section">
            <div class="ti-shopping-cart-full">
                <span class="cart-quantity">0</span>
            </div>
            <!-- On process -->
            <div class="cart-list">
                <div class="cart-list-container">
                    <div class="arrow-up"></div>
                    <h2>Shopping Cart</h2>
                    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">

                        <div class="cart-item-container">
                            <!-- <div class="cart-item">
                                    <div class="item-img">
                                        <img src="./assets/css/img/Car_accessories/volang.jpg" alt="">
                                    </div>
                                    <div class="item-name">
                                        Steering wheel
                                    </div>
                                    <div class="cartItem-price">
                                        $99
                                    </div>
                                    <div class="item-quantity">
                                        <span class="minus">-</span>
                                        <input name="SteeringWheel" type="text" value="1" readonly>
                                        <span class="plus">+</span>
                                    </div>
                                </div>
        
                                </div> -->

                        </div>
                        <div class="cart-payment">
                            <div class="payment-information">
                                <div class="total-text">Total</div>
                                <div class="total-price">$0</div>
                            </div>
                            <div class="clear"></div>
                            <div class="paymentBtn">
                                <button class="closeCartListBtn">Close</button>
                                <button name="checkout" type="submit" class="checkOutBtn">Check out</button>
                            </div>
                            <div class="clear"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function navigateTo(url) {
        window.location.href = url;
    }
</script>
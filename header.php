<?php
session_start();
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
            <div class="ti-user"></div>
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
                    <form action="index.php" method="post">

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
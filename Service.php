<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto WorkShop</title>
    <link rel="stylesheet" href="./assets/css/Autoworkshop.css">
    <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="main">
        <?php
        include("./header.php");
        ?>
        <div class="doorstep-text" class="default-margin">
                <div class="doorstep-slider">
                    <div class="doorstep-list">
                        <div class="doorstep-item">
                            <div class="doorstep-img-wrap">
                                <img src="./assets/css/img/Doorstep_services/oilchange.jpg" alt="">
                                <div class="text-container">
                                    <h2 class="text-heading">OIL CHANGE</h2>
                                    <div class="text-sub-heading">Stay at home and have us fixed every thing!</div>
                                    <button class="booking-button">Book now!</button>
                                </div>
                            </div>

                        </div>
                        <div class="doorstep-item">
                            <div class="doorstep-img-wrap">
                                <img src="./assets/css/img/Doorstep_services/batteryTesting.jpg" alt="">
                                <div class="text-container">
                                    <h2 class="text-heading">BATTERY TESTING</h2>
                                    <div class="text-sub-heading">Stay at home and have us fixed every thing!</div>
                                    <button class="booking-button">Book now!</button>
                                </div>
                            </div>

                        </div>
                        <div class="doorstep-item">
                            <div class="doorstep-img-wrap">
                                <img src="./assets/css/img/Doorstep_services/carwashing.jpg" alt="">
                                <div class="text-container">
                                    <h2 class="text-heading">CAR WASHING</h2>
                                    <div class="text-sub-heading">Stay at home and have us fixed every thing!</div>
                                    <button class="booking-button">Book now!</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="buttons">
                        <button id="prev"><</button>
                                <button id="next">></button>
                    </div>
                    <div class="dots">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                    </div>
                </div>
            </div>

        <?php
        include("./header-footer/product.html");
        include("./header-footer/footer.html");
        ?>
    </div>
    <?php
    include("./header-footer/serviceModal.html");
    ?>
</body>
<script src="./assets/JS/common.js"></script>
<script src="./assets/JS/service.js"></script>

</html>


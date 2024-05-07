<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto WorkShop</title>
    <link rel="stylesheet" href="/assets/css/Autoworkshop.css">
    <link rel="stylesheet" href="/assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="main">
        <?php
        include("./header-footer/header.html");
        ?>
        <div id="content">
        <div id="tour" class="tour-section">
                <div class="content-section">
                    <h2 class="section-heading text-white">CAR ACCESSORIES</h2>
                    <div class="section-sub-heading text-white">Feeling the difference!</div>
                    <ul class="ticket-list">
                        <li class="SteeringWheel" data-id="1">Steering wheel <span class="sold-out">Limited!</span></li>
                        <li class="Wheel" data-id="2">Wheel <span class="sold-out">Limited!</span></li>
                        <li class="Clutches" data-id="3">Clutches <span class="sold-out">Limited!</span> </li>
                    </ul>
                    <div class="booking-section">
                        <div class="productList">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("./header-footer/footer.html");
        ?>
    </div>
    <?php
    include("./header-footer/serviceModal.html");
    ?>
</body>
<script src="./assets/JS/common.js"></script>

</html>
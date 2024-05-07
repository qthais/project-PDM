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
        include("./header-footer/header.html");
        ?>
        <div id="content">
            <div id="about" class="content-section">
                <h2 class="section-heading">My team</h2>
                <div class="section-sub-heading">We love you guys</div>
                <div class="about-text">
                    Welcome to our innovative Web portal for motor servicing at home! Say goodbye to the hassle of
                    traditional auto repair shops. With our convenient doorstep service, we bring the garage to you,
                    saving you time and effort. Our certified technicians offer a comprehensive range of services, from
                    routine maintenance to complex repairs, all performed at your location. Enjoy transparent pricing,
                    easy online booking, and top-notch service quality. Experience the convenience of having your
                    vehicle serviced without leaving your home. Trust us to keep your vehicle running smoothly while you
                    relax in the comfort of your own space. Welcome to hassle-free motor servicing!
                </div>
                <div class="member-list">
                    <div class="member-item">
                        <p class="member-name">Dedicated!</p>
    
                        <img class="member-img" src="./assets/css/img/About/about1.jpg" alt="Name">
                    </div>
                    <div class="member-item">
                        <p class="member-name">Affordable!</p>
    
                        <img class="member-img" src="./assets/css/img//About/about2.jpg" alt="Name">
                    </div>
                    <div class="member-item">
                        <p class="member-name">Flexible!</p>
    
                        <img class="member-img" src="./assets/css/img/About/about3.jpg" alt="Name">
                    </div>
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

</html>
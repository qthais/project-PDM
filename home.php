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
        <div id="slider" class="default-margin">
            <div class="text-content">
                <div class="text-heading">
                    <h2>So Convenient!</h2>
                </div>
                <div class="text-description">
                    <p>Convenient doorstep service - We come to you for all your needs.</p>
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
<script src="./assets/JS/home.js"></script>
<script src="./assets/JS/common.js"></script>
</html>



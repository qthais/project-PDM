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
        <div class="payment-container default-margin">
        <form action="">
            <div class="row">
                <div class="column">
                    <h3 class="title">Billing Address</h3>
                    <div class="input-box">
                        <span>Full name:</span>
                        <input type="text" placeholder="Ambatukam">
                    </div>
                    <div class="input-box">
                        <span>E-mail:</span>
                        <input type="email" placeholder="nigger@licious.com">
                    </div>
                    <div class="input-box">
                        <span>Address:</span>
                        <input type="text" placeholder="Number - Street - Ward - City - Province - Country">
                    </div>
                    <div class="input-box">
                        <span>City:</span>
                        <input type="text" placeholder="HoChiMinhCity">
                    </div>
                    <div class="flex">
                        <div class="input-box">
                            <span>Province:</span>
                            <input type="text" placeholder="HoChiMinhCity">
                        </div>
                        <div class="input-box">
                            <span>Zip code:</span>
                            <input type="number" placeholder="6969 6969">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h3 class="title">Payment</h3>
                    <div class="input-box">
                        <span>Card Accepted:</span>
                        <img src="./assets/css/img/Payment/imgcards.png" alt="">
                    </div>
                    <div class="input-box">
                        <span>Card Owner:</span>
                        <input type="text" placeholder="Ambatukam">
                    </div>
                    <div class="input-box">
                        <span>Card Number:</span>
                        <input type="number" placeholder="1111 2222 3333 4444">
                    </div>
                    <div class="input-box">
                        <span>Exp Year:</span>
                        <input type="number" placeholder="2077">
                    </div>
                    <div class="flex">
                        <div class="input-box">
                            <span>Exp Month:</span>
                            <input type="text" placeholder="October">
                        </div>
                        <div class="input-box">
                            <span>CVV:</span>
                            <input type="number" placeholder="132">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
        <?php
        include("./header-footer/product.html");
        include("./header-footer/footer.html");
        ?>
    </div>
    <?php
        include("serviceModal.php");
    ?>
</body>
<script src="./assets/JS/common.js"></script>

</html>
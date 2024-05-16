<?php
$localDateTime = date('Y-m-d H:i:s');
?>
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
        <?php
        include("Connect.php");
        $totalPrice = null;
        if (isset($_COOKIE['totalPrice'])) {
            $totalPrice = $_COOKIE['totalPrice'];
        }
        if (isset($_POST["paymentBtn"])) {
            $cartID = $_SESSION['cartID'];
            $cardHolder = $_POST["cardHolder"];
            $cardNumber = $_POST["cardNumber"];
            $expYear = $_POST['expYear'];
            $expMonth = $_POST['expMonth'];
            $CVV = $_POST['cvv'];
            $sql = "INSERT INTO Payment (CartID, PaymentDate, CardNumber, CardHolderName, ExpirationYear, ExpirationMonth, CVV) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssss", $cartID, $localDateTime, $cardNumber, $cardHolder, $expYear, $expMonth, $CVV);
            $stmt->execute(); // Execute the prepared statement
            $stmt->close(); // Close the statement after execution
            header("Location: home.php");
        }
        include("CloseConnect.php");

        ?>
        <div class="payment-container default-margin">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                <div class="row">
                    <div class="column">
                        <h3 class="title">Billing Address</h3>
                        <div class="input-box">
                            <span>Full name:</span>
                            <input name="name" type="text" placeholder="Ambatukam" readonly value="<?php echo $_SESSION["username"] ?>">
                        </div>
                        <div class="input-box">
                            <span>E-mail:</span>
                            <input name="mail" type="email" placeholder="nigger@licious.com" readonly value="<?php echo $_SESSION["usermail"] ?>">
                        </div>
                        <div class="input-box">
                            <span>Phone:</span>
                            <input name="phone" type="text" readonly value="<?php echo $_SESSION["phone"] ?>">
                        </div>
                        <div class="input-box">
                            <span>Price:</span>
                            <input type="number" placeholder="HoChiMinhCity" readonly value="<?php echo $totalPrice ?>">
                        </div>
                        <div class="flex">
                            <div class="input-box">
                                <span>Date:</span>
                                <input type="datetime-local" readonly value="<?php echo $localDateTime ?>">
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
                            <input name="cardHolder" type="text" placeholder="BA TU KHAN">
                        </div>
                        <div class="input-box">
                            <span>Card Number:</span>
                            <input name="cardNumber" type="number" placeholder="1111 2222 3333 4444">
                        </div>
                        <div class="input-box">
                            <span>Exp Year:</span>
                            <input name="expYear" type="number" placeholder="2077">
                        </div>
                        <div class="flex">
                            <div class="input-box">
                                <span>Exp Month:</span>
                                <input name="expMonth" type="text" placeholder="October">
                            </div>
                            <div class="input-box">
                                <span>CVV:</span>
                                <input name="cvv" type="number" placeholder="132">
                            </div>
                        </div>
                    </div>
                </div>
                <button name="paymentBtn" type="submit" class="btn">Submit</button>
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
<script src="./assets/JS/Payment.js"></script>

</html>
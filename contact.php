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
        $temp = "Send successfully!";
        include("Connect.php");
        $UserID = $_SESSION["User_ID"];
        $sql = "SELECT * FROM Users WHERE UserID='{$UserID}' ";
        $doorstepSql = "SELECT * FROM userdoorstepservice WHERE UserID='{$UserID}'";
        $result = $conn->query($sql);
        $doorstepResult = $conn->query($doorstepSql);
        $row = $result->fetch_assoc();
        $username = $row["Name"];
        $_SESSION["username"] = $username;
        $userphone = $row["Phone"];
        $_SESSION["phone"] = $userphone;
        $useremail = $row["Mail"];
        $_SESSION["usermail"] = $useremail;
        if (isset($_POST["ContactSubmit"])) {
            $message = $_POST['message'];
            $sqlContact = "INSERT INTO Contact(UserID,Message) VALUES({$UserID},'{$message}')";
            if ($conn->execute_query($sqlContact)===true) {
                $statusMessage = 'success';
                $_SESSION['statusMessage'] = $statusMessage;
            }
        }
        include("CloseConnect.php");
        ?>
        <div id="content" class="default-margin">
            <div class="contact-form text-white" action="">
                <div id="contact" class="contact-section">
                    <h2 class="section-heading">CONTACT US</h2>
                    <div class="section-sub-heading">Car service encompasses essential maintenance tasks to ensure the optimal performance and longevity of vehicles, including oil changes, tire rotations, and brake inspections.</div>
                    <div class="contact-content">
                        <div class="contact-information">
                            <div class="information-container">
                                <div class="contact-icon fa fa-home"></div>
                                <div class="information-description">
                                    <h4 class="description-heading">Address</h4>
                                    <div class="description-text">HCMC, Viet Nam</div>
                                </div>

                            </div>
                            <div class="information-container">
                                <div class="contact-icon fa fa-phone"></div>
                                <div class="information-description">
                                    <h4 class="description-heading">Phone</h4>
                                    <div class="description-text">+84123456789</div>
                                </div>

                            </div>
                            <div class="information-container">
                                <div class="contact-icon fa fa-envelope"></div>
                                <div class="information-description">
                                    <h4 class="description-heading">Email</h4>
                                    <div class="description-text">thaiallb63@gmail.com</div>
                                </div>

                            </div>
                        </div>
                        <div class="contact-send">
                            <div class="contact-sender">
                                <h2>Send Message</h2>
                                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                                    <input required name="name" placeholder="Full Name" class="name-input input-member" type="text" value="<?php echo $_SESSION["username"]; ?>" readonly>
                                    <input required name="mail" placeholder="Email" type="email" class="email-input input-member" value="<?php echo $_SESSION["usermail"]; ?>" readonly>
                                    <input required name="message" class="input-member" type="text" placeholder="Type your Message">
                                    <input type="submit" name="ContactSubmit" class="send-button" value="Send"></input>
                                    <?php
                                    if (isset($_SESSION["statusMessage"])) {
                                        $statusMessage=$_SESSION["statusMessage"];
                                        echo
                                        "
                        <div class=\"{$statusMessage}-msg\">
                            <i class=\"fa fa-check\"></i>
                            {$temp}
                        </div>
                        ";
                        unset($_SESSION["statusMessage"]);
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </>
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
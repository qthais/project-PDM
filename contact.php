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
        <div id="content">
        <form class="contact-form text-white" action="">
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
                                <input required name="" placeholder="Full Name" class="name-input input-member" type="text">
                                <input required name="" placeholder="Email" type="email" class="email-input input-member">
                                <input required name="" class="input-member" type="text" placeholder="Type your Message">
                                <input type="submit" class="send-button" value="Send"></input>
                            </div>    
                        </div>
                    </div>                    
                </div>
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
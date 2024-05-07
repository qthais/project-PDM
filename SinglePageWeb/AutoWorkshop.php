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
        <div id="slider">
            <div class="text-content">
                <div class="text-heading">
                    <h2>So Convenient!</h2>
                </div>
                <div class="text-description">
                    <p>Convenient doorstep service - We come to you for all your needs.</p>
                </div>
            </div>
        </div>

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
            <div class="doorstep-text">
                <div class="doorstep-slider">
                    <div class="doorstep-list">
                        <div class="doorstep-item">
                            <div class="doorstep-img-wrap">
                                <img src="./assets/css/img/Doorstep_services/oilchange.jpg" alt="">
                                <div class="text-container">
                                    <h2 class="text-heading">DOORSTEP SERVICES</h2>
                                    <div class="text-sub-heading">Stay at home and have us fixed every thing!</div>
                                    <button class="booking-button">Book now!</button>
                                </div>
                            </div>

                        </div>
                        <div class="doorstep-item">
                            <div class="doorstep-img-wrap">
                                <img src="./assets/css/img/Doorstep_services/batteryTesting.jpg" alt="">
                                <div class="text-container">
                                    <h2 class="text-heading">DOORSTEP SERVICES</h2>
                                    <div class="text-sub-heading">Stay at home and have us fixed every thing!</div>
                                    <button class="booking-button">Book now!</button>
                                </div>
                            </div>

                        </div>
                        <div class="doorstep-item">
                            <div class="doorstep-img-wrap">
                                <img src="./assets/css/img/Doorstep_services/carwashing.jpg" alt="">
                                <div class="text-container">
                                    <h2 class="text-heading">DOORSTEP SERVICES</h2>
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
        include("./header-footer/footer.html");
        ?>
    </div>

    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
            <header class="modal-header">
                <div class="heading">
                    <i class="ti-bag"></i>
                    <p class="icon-heading">Information</p>
                </div>
            </header>
            <form action="">
                <div class="modal-body">
                    <label for="quantity" class="modal-label">
                        <i class="ti-shopping-cart"></i>
                        Phone
                    </label>
                    <input type="tel" id="telephone" required type="text" class="modal-input" placeholder="Your phone?" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" >

                    <label for="address" class="modal-label">
                        <i class="ti-user"></i>
                        Address
                    </label>
                    <input id="address" required type="text" class="modal-input" placeholder="Enter address">
                    <button id="buy-tickets" type="submit">
                        Confirm <i class="ti-check"></i>
                    </button>
                </div>
            </form>
            <footer class="modal-footer">
                <p class="modal-help">Need <a href="">help?</a></p>
            </footer>
        </div>
    </div>
</body>
<script src="./assets/AutoWorkshop.js"></script>

</html>


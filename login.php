<?php
session_start();
include("Connect.php");
$temp = "Or sign in with social platforms";
$status="success";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $_SESSION["email"] = $email;

    $sql = "SELECT UserID,Name, Mail, Password FROM Users WHERE Mail='$email' AND Password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the first row
        $_SESSION["username"] = $row["Name"]; // Store the username in session
        $_SESSION["User_ID"] = $row["UserID"];
        $_SESSION["login"] = true;
        header("Location: home.php"); // Redirect to header.php after successful login
        exit();
    } else {
        $status="error";
        $temp = "Incorrect email or password!!";
    }
}
if (isset($_POST["sign-up"])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize username
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL); // Validate email on server-side
    $phone = $_POST["phone"];
    if ($email === false) { // Check if validation failed
        $status="error";
        $temp = "Invalid email address !";
    } else {
        $check_email_sql = "SELECT * FROM Users WHERE Mail='$email'";
        $check_email_result = $conn->query($check_email_sql);
        if ($check_email_result->num_rows > 0) {
            $temp = "Email has already existed!";
            $status="warning";
        } else {
            $password = $_POST["password"];
            $sql = "INSERT INTO Users(Name, Mail, Password,Phone) VALUES('$username','$email','$password','$phone')";
            $result = $conn->query($sql);
            $status="success";
            $temp = "Create Users successfully!";
        }
    }
}
include("CloseConnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/login.css">

</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="./login.php" method="POST" class="sign-in-form">
                    <h2 class="title">Sign In</h2>
                    <?php
                    if (isset($_POST["login"])||isset($_POST["sign-up"])){
                        echo
                        "
                        <div class=\"{$status}-msg\">
                            <i class=\"fa fa-check\"></i>
                            {$temp}
                        </div>
                        "
                        ;
                    } 
                    ?>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input required name="email" type="email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-lock-alt'></i>
                        <input required name="password" type="password" placeholder="Password">
                    </div>
                    <input required name="login" type="submit" value="Login" class="btn solid">
                    <p class="social-text">Or sign in with social platforms</p>

                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class='bx bxl-facebook'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-twitter'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-google'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-linkedin'></i>
                        </a>
                    </div>
                </form>
                <form class="sign-up-form" action="./login.php" method="POST">
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input required name="username" type="text" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-envelope'></i>
                        <input required name="email" type="text" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-lock-alt'></i>
                        <input required name="password" type="password" placeholder="Password">
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-phone'></i>
                        <input required name="phone" type="tel" pattern="[0-9]{10}" placeholder="Phone">
                    </div>
                    <input required name="sign-up" type="submit" value="Sign Up" class="btn solid">
                    <p class="social-text">Or sign in with social platforms</p>

                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class='bx bxl-facebook'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-twitter'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-google'></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class='bx bxl-linkedin'></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, illo. Vitae, nesciunt.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="./assets/css/imagesLogin/Profiling_Monochromatic.png" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, illo. Vitae, nesciunt.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img src="./imagesLogin/Authentication_Outline.png" class="image" alt="">
            </div>
        </div>
    </div>
    <script src="./assets/JS/login.js"></script>
</body>

</html>
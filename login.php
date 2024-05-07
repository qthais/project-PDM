<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn__SignUp__Landing__Page</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./login.css">

</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
            <form action="./header.php" method="POST" class="sign-in-form">
                <h2 class="title">Sign In</h2>
                <div class="input-field">
                    <i class='bx bxs-user'></i>
                    <input  required name="email" type="email" placeholder="Email" >
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
            <form class="sign-up-form" action="test.php" method="POST">
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
                <input required name="sign-up" type="submit" value="Sign Up" class="btn solid">
                <p class="social-text">Or sign up with social platforms</p>

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
    <script src="./login.js"></script>
</body>
</html>
<!-- <?php
$host="localhost";
$user="root";
$pass="";
$db="test";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}else{
    echo"Connected!";
}

if(isset($_POST ["login"])){
    $email = $_POST ["email"];   
    $password = $_POST ["password"];
    $_SESSION["email"]=$email;
    $sql="SELECT Name,Mail,Password FROM Account WHERE Mail='$email' AND Password='$password'";
    $result = $conn->query($sql);
    echo $result->num_rows;
    while($row = $result->fetch_assoc()){
        echo $row["Password"].$row["Name"]."<br>".$row["Mail"];
    }
    if($result->num_rows > 0){
        $username= $result->fetch_assoc()["Name"];
        $_SESSION["username"]=$username;
    }else{
        echo"<br> No account!";
    }
    $_SESSION["login"]=true;
}
if(isset($_POST ["sign-up"])){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize username
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL); // Validate email on server-side

    if ($email === false) { // Check if validation failed
        echo "Invalid email address!";
        exit(); // Stop script execution
    }

    $password = $_POST["password"];

    $sql = "INSERT INTO Account(Name, Mail, Password) VALUES('$username','$email','$password')";
    $result = $conn->query($sql);

    echo "Hello {$username}";
}
?> -->
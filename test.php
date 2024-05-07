<?php
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
?>
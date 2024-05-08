<?php
include("Connect.php");

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $_SESSION["email"] = $email;

    $sql = "SELECT Name, Mail, Password FROM Account WHERE Mail='$email' AND Password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the first row
        $_SESSION["username"] = $row["Name"]; // Store the username in session
        $_SESSION["login"] = true;
        header("Location: header.php"); // Redirect to header.php after successful login
        exit();
    } else {
        echo "<br> No account!";
    }
}
echo $_SESSION["username"];
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
    include("CloseConnect.php");
}
?>
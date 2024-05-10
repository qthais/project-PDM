<?php
session_start();
include("Connect.php");
$UserID = $_SESSION["User_ID"];
$sql = "SELECT * FROM Users WHERE UserID='{$UserID}' ";
$doorstepSql = "SELECT * FROM userdoorstepservice WHERE UserID='{$UserID}'";
$result = $conn->query($sql);
$doorstepResult = $conn->query($doorstepSql);
$row = $result->fetch_assoc();
$username = $row["Name"];
$userphone = $row["Phone"];
$useremail = $row["Mail"];
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
        <div class="profile" class="default-margin">
            <div class="card">
                <div class="left-container">
                    <img src="https://cdn.pixabay.com/photo/2015/01/08/18/29/entrepreneur-593358__480.jpg" alt="Profile Image">
                    <h2 class="gradienttext"><?php echo $username ?></h2>
                    <div class="appointment">
                        <h4>Your appointment with our staff</h4>
                        <div class="appointment-container">
                            <?php
                            while ($temp = $doorstepResult->fetch_assoc()) {
                                echo
                                "
                                <div class=\"appointment-item\">
                                <span>{$temp['Date']}</span>
                                <span>{$temp['Address']}</span>
                                <button>Cancel</button>
                                </div>
                                ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="right-container">
                    <h3 class="gradienttext">Profile Details</h3>
                    <table>
                        <tr>
                            <td>Name :</td>
                            <td><input type="text" value="<?php echo $username ?>"> </td>
                        </tr>
                        <tr>
                            <td>Mobile :</td>
                            <td><input type="text" value="<?php echo $userphone ?>"></td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td><input type="text" value="<?php echo $useremail ?>"></td>
                        </tr>
                    </table>
                    <button class="logout"> <span class="fa fa-sign-out">Sign out</span></button>
                    <div class="clear"></div>
                </div>
            </div>
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
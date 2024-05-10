<?php
session_start();
include("Connect.php");
$UserID = $_SESSION["User_ID"];
$doorstepSql = "SELECT * FROM userdoorstepservice WHERE UserID='{$UserID}'";
$doorstepResult = $conn->query($doorstepSql);
while ($temp = $doorstepResult->fetch_assoc()) {
    echo $temp['Date'];
}
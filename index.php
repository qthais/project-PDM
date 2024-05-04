<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
if (isset($_POST["checkout"])) {
    echo "get ok";
    $quantityOfWheel = $_POST["Wheel"];
    $quantityOfSteeringWheel = $_POST["SteeringWheel"];
    $quantityOfClutches = $_POST["Clutches"];
    echo $quantityOfWheel+$quantityOfClutches+$quantityOfSteeringWheel;
}
?>
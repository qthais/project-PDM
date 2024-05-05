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

$conn=mysqli_connect("localhost","root","","workshop");
if(mysqli_connect_errno()){
    echo "". mysqli_connect_error();
}else{
    echo"Connect successfully!!<br>";
}
if (isset($_POST["checkout"])) {
    echo "get ok";
    $quantityOfWheel = $_POST["Wheel"];
    echo $quantityOfWheel ."<br>";
    $quantityOfSteeringWheel = $_POST["SteeringWheel"];
    echo $quantityOfSteeringWheel ."<br>";
    $quantityOfClutches = $_POST["Clutches"];
    echo $quantityOfClutches ."<br>";
    $total= $quantityOfWheel+$quantityOfClutches+$quantityOfSteeringWheel;


    $sqlIntoCart="INSERT INTO cart(TotalQuantity) 
    VALUES($total)";
    $resultIntoCart=mysqli_query($conn,$sqlIntoCart);
    $cartID = mysqli_insert_id($conn);
    //
    $sqlIntoCartProduct="INSERT INTO cart_accessories (Cart_ID,Accessories_ID,Quantity)
                            VALUES({$cartID},1,{$quantityOfWheel}),
                                    ({$cartID},2,{$quantityOfSteeringWheel}),
                                    ({$cartID},3,{$quantityOfClutches})";

    $sqlIntoCartProduct=mysqli_query($conn,$sqlIntoCartProduct);
}
?>
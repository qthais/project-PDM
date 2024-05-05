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

    // Calculate total quantity
    $total = $quantityOfWheel + $quantityOfClutches + $quantityOfSteeringWheel;
    // Insert total quantity into cart table
    $sqlIntoCart = "INSERT INTO cart(TotalQuantity) VALUES($total)";
    $resultIntoCart = mysqli_query($conn, $sqlIntoCart);
    $cartID = mysqli_insert_id($conn);

    // Insert products into cart_accessories table
    $sqlIntoCartProduct = "INSERT INTO cart_accessories (Cart_ID, Accessories_ID, Quantity) VALUES ";
    if ($quantityOfWheel > 0) {
        $sqlIntoCartProduct .= "($cartID, 1, $quantityOfWheel),";
    }
    if ($quantityOfSteeringWheel > 0) {
        $sqlIntoCartProduct .= "($cartID, 2, $quantityOfSteeringWheel),";
    }
    if ($quantityOfClutches > 0) {
        $sqlIntoCartProduct .= "($cartID, 3, $quantityOfClutches),";
    }
    // Remove the last comma from the SQL query string
    $sqlIntoCartProduct = rtrim($sqlIntoCartProduct, ",");
    
    // Execute the query
    $resultIntoCartProduct = mysqli_query($conn, $sqlIntoCartProduct);
}

?>
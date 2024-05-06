<?php

include ("Connect.php");

if (isset($_POST["checkout"])) {
    echo "get ok";
    $quantityOfWheel = $_POST["Wheel"];
    echo $quantityOfWheel . "<br>";
    $quantityOfSteeringWheel = $_POST["SteeringWheel"];
    echo $quantityOfSteeringWheel . "<br>";
    $quantityOfClutches = $_POST["Clutches"];
    echo $quantityOfClutches . "<br>";

    // Calculate total quantity
    $total = $quantityOfWheel + $quantityOfClutches + $quantityOfSteeringWheel;
    if ($total != 0) {
        $sqlIntoCart = "INSERT INTO cart(TotalQuantity) VALUES($total)";
        if ($conn->query($sqlIntoCart) === TRUE) {
            $cartID = $conn->insert_id;

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
            if ($conn->query($sqlIntoCartProduct) === TRUE) {
                echo "New records created successfully";
            } else {
                echo "Error: " . $sqlIntoCartProduct . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sqlIntoCart . "<br>" . $conn->error;
        }
    }
    // Insert total quantity into cart table
}

include("CloseConnect.php");

?>

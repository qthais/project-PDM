<?php
session_start();
include("Connect.php");
$UserID = $_SESSION["User_ID"];
$sql = "SELECT * FROM autoaccessories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $products = array();

    // Fetching data and constructing JSON array
    while ($row = $result->fetch_assoc()) {
        $product = array(
            "id" => $row["ID"],
            "name" => $row["Name"],
            "price" => $row["Cost"],
            "description" => $row["Description"],
            "image" => $row["Image"]
        );

        array_push($products, $product);
    }

    // Writing JSON to file
    $json_string = json_encode($products, JSON_PRETTY_PRINT);
    file_put_contents('./assets/Data/test.json', $json_string);

    echo "JSON file generated successfully.";
} else {
    echo "No records found.";
}

<?php
// Retrieve the raw POST data
$postData = file_get_contents('php://input');
echo $postData;
// Decode the JSON data into a PHP array
$cartsData = json_decode($postData, true);
echo $cartsData;
// Log the received data to the console

echo json_encode($cartsData);
?>
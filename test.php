<?php
// Check if the "ServiceID" cookie is set
if(isset($_COOKIE["ServiceID"])) {
    // Retrieve the value of the "ServiceID" cookie
    $serviceID = $_COOKIE["ServiceID"];
    // Echo the value of the "ServiceID" cookie
    echo "Value of ServiceID cookie: " . $serviceID;
} else {
    // If the "ServiceID" cookie is not set
    echo "ServiceID cookie is not set.";
}

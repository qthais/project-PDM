<?php
include("Connect.php");
if(!empty($_SESSION["User_ID"])&&!empty($_COOKIE["ServiceID"])){
    if (isset($_POST["confirm"])) {
        $UserID = $_SESSION["User_ID"];
        $ServiceID = $_COOKIE["ServiceID"];
        $date = $_POST["date"];
        $address = $_POST["address"];
    
        // Properly formatted SQL query with column names and values
        $sql = "INSERT INTO UserDoorstepService (UserID, DoorstepServiceID, Address, Date) 
                VALUES ($UserID, $ServiceID, '$address', '$date')";
    
        $result = $conn->query($sql);
    
        if (!$result) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo $UserID;
        }
    }
}
include("CloseConnect.php");
?>
<div class="modal js-modal">
    <div class="modal-container js-modal-container">
        <div class="modal-close js-modal-close">
            <i class="ti-close"></i>
        </div>
        <header class="modal-header">
            <div class="heading">
                <i class="ti-bag"></i>
                <p class="icon-heading">Information</p>
            </div>
        </header>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <div class="modal-body">
                <label for="quantity" class="modal-label">
                    <i class="fa fa-calendar"></i>
                    Date
                </label>
                <input type="date" name="date" required class="modal-input" placeholder="Time">

                <label for="address" class="modal-label">
                    <i class="fa fa-home"></i>
                    Address
                </label>
                <input id="address" name="address" required type="text" class="modal-input" placeholder="Enter address">
                <button name="confirm" id="buy-tickets" type="submit">
                    Confirm <i class="ti-check"></i>
                </button>
            </div>
        </form>
        <footer class="modal-footer">
            <p class="modal-help">Need <a href="">help?</a></p>
        </footer>
    </div>
</div>
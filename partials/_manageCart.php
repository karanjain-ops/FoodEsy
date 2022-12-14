<?php
include '_dbconnect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if(isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        // Check whether this item exists
        $existSql = "SELECT * FROM `viewcart` WHERE foodId = '$itemId' AND `userId`='$userId'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Item Already Added.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $sql = "INSERT INTO `viewcart` (`foodId`, `itemQuantity`, `userId`, `addedDate`) VALUES ('$itemId', '1', '$userId', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `foodId`='$itemId' AND `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['checkout'])) {
        $amount = $_POST["amount"];   
        $takeAwayTime = $_POST["takeAwayTime"];
        $phone = $_POST["phone"];
        $sql = "INSERT INTO `orders` (`userId`, takeAwayTime, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES ('$userId', '$takeAwayTime', '$phone', '$amount', '0', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $orderId = $conn->insert_id;
        if ($result){
            $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'"; 
            $addResult = mysqli_query($conn, $addSql);
            while($addrow = mysqli_fetch_assoc($addResult)){
                $foodId = $addrow['foodId'];
                $itemQuantity = $addrow['itemQuantity'];
                $itemSql = "INSERT INTO `orderitems` (`orderId`, `foodId`, `itemQuantity`) VALUES ('$orderId', '$foodId', '$itemQuantity')";
                $itemResult = mysqli_query($conn, $itemSql);
            }
            $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
            $deleteresult = mysqli_query($conn, $deletesql);
            echo '<script>alert("Thanks for ordering with us. Your order id is ' .$orderId. '.");
                window.location.href="http://localhost/FoodEsy/index.php";  
                </script>';
                exit();
        }   
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $foodId = $_POST['foodId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `foodId`='$foodId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
    }
    
}
?>
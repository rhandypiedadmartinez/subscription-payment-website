<?php
session_start();
include ("../config.php");
$current_user = $_SESSION["login"];
$isAdmin = $_SESSION["isAdmin"];
$e_wallet = $_SESSION["e_wallet"];
$myID = $_SESSION["userID"];
include ("../model/get-billers-list.php");
include ("../model/mybills.php");

foreach ($bills as $bill) {
    $billname = $bill->billname;
    $billername = $bill->billername;
    $amount = $bill->amount;
    
    if (isset($_POST[$billername])) {
        if ($e_wallet >= ($amount)) {
            $sql = "UPDATE persons SET e_wallet=e_wallet-$billname, $billname=0 WHERE email='$current_user';";
            if ($mysqli->query($sql) == TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $mysqli->error;
            }
            
            $sql1 = "INSERT INTO `billing_history`(`customer_id`, `customer_name`, `subscription_paid`, `amount_paid`, `payment_timestamp`) VALUES ('$myID','$current_user','$billername','$amount',CURRENT_TIMESTAMP())";
            if ($mysqli->query($sql1) == TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $mysqli->error;
            }
        }
        $mysqli->close();
        break;
    }
}

if ($isAdmin == "true") {
    header("location: ../admin-page.php");
} else {
    header("location: ../index.php");
}

?>


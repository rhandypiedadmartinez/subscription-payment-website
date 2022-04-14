<?php
session_start();
include ("../config.php");
$current_user = $_SESSION["login"];
$isAdmin = $_SESSION["isAdmin"];
$e_wallet = $_SESSION["e_wallet"];
echo $e_wallet;
include ("../model/get-billers-list.php");
include ("../model/mybills.php");

foreach ($bills as $bill) {
    if (isset($_POST[$bill->billername])) {
        $billname = $bill->billname;
        if ($e_wallet >= ($bill->amount))
            $sql = "UPDATE persons SET e_wallet=e_wallet-$billname, $billname=0 WHERE email='$current_user'";
        if ($mysqli->query($sql) == TRUE) {
               echo "Record updated successfully";
         } else {
              echo "Error updating record: " . $mysqli->error;
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


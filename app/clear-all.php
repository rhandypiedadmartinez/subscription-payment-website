<?php
session_start();
$current_user = $_SESSION["login"];

$isAdmin = $_SESSION["isAdmin"];
include ("config.php");

$sql = "UPDATE persons SET spotify_bill=0, discord_nitro_bill=0, ph_premium_bill=0, e_wallet=0 WHERE email='$current_user'";

if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $mysqli->error;
}

$mysqli->close();

if ($isAdmin == "true") {
    header("location: admin-page.php");
} else {
    header("location: index.php");
}
?>


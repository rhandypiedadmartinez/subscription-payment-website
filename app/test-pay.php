<?php
session_start();
$current_user = $_SESSION["login"];
$isAdmin = $_SESSION["isAdmin"];
include ("config.php");

$sql = "SELECT e_wallet FROM persons";

//$sql = "UPDATE persons SET e_wallet=1000 WHERE email='rhandy'";

if (isset($_POST['spotify'])) {
 
    $sql = "UPDATE persons SET e_wallet=e_wallet-spotify_bill, spotify_bill=spotify_bill-spotify_bill WHERE email='$current_user'";
    
} elseif (isset($_POST['discord'])) {

    $sql = "UPDATE persons SET e_wallet=e_wallet-discord_nitro_bill, discord_nitro_bill=discord_nitro_bill-discord_nitro_bill WHERE email='$current_user'";
} elseif (isset($_POST['ph'])) {

    $sql = "UPDATE persons SET e_wallet=e_wallet-ph_premium_bill, ph_premium_bill=ph_premium_bill-ph_premium_bill WHERE email='$current_user'";
}

if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $mysqli->error;
}

$mysqli->close();

if ($isAdmin=="true"){
    echo 'yes';
    header("location: admin-page.php");
} else {
    header("location: index.php");
}

?>


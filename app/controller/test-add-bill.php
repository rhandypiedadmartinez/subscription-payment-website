<?php
session_start();

$current_user = $_SESSION["login"];
$isAdmin = $_SESSION["isAdmin"];
include ("../config.php");

if (isset($_POST['Spotify'])) {
    $sql = "UPDATE persons SET spotify_bill=spotify_bill+200 WHERE email='$current_user'";

} elseif (isset($_POST['Discord'])) {
    $sql = "UPDATE persons SET discord_nitro_bill=discord_nitro_bill+500 WHERE email='$current_user'";

} elseif (isset($_POST['PhilHealth'])) {
    $sql = "UPDATE persons SET ph_premium_bill=ph_premium_bill+300 WHERE email='$current_user'";
    }
if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $mysqli->error;
}

$mysqli->close();


if ($isAdmin=="true"){
      header("location: ../admin-page.php");
} else {
      header("location: ../index.php");
}
?>


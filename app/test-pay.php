<?php
session_start();
$current_user = $_SESSION["login"];
$isAdmin = $_SESSION["isAdmin"];
include ("config.php");

$sql1 = "SELECT * FROM persons where email='$current_user'";
if ($result = mysqli_query($mysqli, $sql1)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $e_wallet = $row['e_wallet'];
            $spotify = $row['spotify_bill'];
            $discord = $row['discord_nitro_bill'];
            $ph = $row['ph_premium_bill'];
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($mysqli);
}

echo '<br>wallet: ' . $e_wallet . '<br>spotify: ' . $spotify . '<br>discord: ' . $discord . '<br>ph: ' . $ph . '<br>';

if (isset($_POST['spotify'])) {
    if ($e_wallet > $spotify) {
        $sql = "UPDATE persons SET e_wallet=e_wallet-spotify_bill, spotify_bill=spotify_bill-spotify_bill WHERE email='$current_user'";
    }
    if ($mysqli->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
    $mysqli->close();
}

if (isset($_POST['discord'])) {
    if ($e_wallet > $discord) {
        $sql = "UPDATE persons SET e_wallet=e_wallet-discord_nitro_bill, discord_nitro_bill=discord_nitro_bill-discord_nitro_bill WHERE email='$current_user'";
        if ($mysqli->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
        $mysqli->close();
    }
}

if (isset($_POST['ph'])) {
    if ($e_wallet > $ph) {
        $sql = "UPDATE persons SET e_wallet=e_wallet-ph_premium_bill, ph_premium_bill=ph_premium_bill-ph_premium_bill WHERE email='$current_user'";
        if ($mysqli->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
        $mysqli->close();
    }
}

if ($isAdmin == "true") {
    header("location: admin-page.php");
} else {
    header("location: index.php");
}

?>


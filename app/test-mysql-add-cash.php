<?php
	session_start ();
	$current_user=$_SESSION["login"];
	include("config.php");

$sql = "UPDATE persons SET e_wallet=e_wallet+1000 WHERE email='$current_user'"; 

if ($mysqli->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $mysqli->error;
}

$mysqli->close();

header("location: index.php");

?>


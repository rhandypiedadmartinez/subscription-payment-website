<?php
usleep(500000);
set_exception_handler(
    function(Throwable $e) {
        echo $e->getMessage();
    }
);

$servername = "localhost";
$username = "admin";
$password = "IcedCoffee";
$dbname = "earth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE persons SET e_wallet=e_wallet+1000 WHERE first_name='Clark'"; 

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

include 'index.php';
$conn->close();

?>


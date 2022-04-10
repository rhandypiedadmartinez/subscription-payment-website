<?php

$databaseHost = 'localhost';//or localhost
$databaseName = 'earth'; // your db_name
$databaseUsername = 'admin'; // root by default for localhost
$databasePassword = 'IcedCoffee';  // by defualt empty for localhost

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>

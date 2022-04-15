<?php
$mysqli = new mysqli("localhost", "admin", "IcedCoffee", "earth");

$mysqli->query('SET foreign_key_checks = 0');
if ($result = $mysqli->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$mysqli->query('SET foreign_key_checks = 1');


$sql2 = file_get_contents('console.sql');
/* execute multi query */
$mysqli->multi_query($sql2);

header("location: ../login.php");
?>


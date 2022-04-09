<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "admin", "IcedCoffee", "earth");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM persons";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name: </th>";
                echo "<th>e-wallet: </th>";
                echo "<th>spotify bill:</th>";
                echo "<th>ph premium bill: </th>";
                echo "<th>discord nitro: </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['e_wallet'] . "</td>"; 
                echo "<td>" . $row['spotify_bill'] . "</td>";  
                echo "<td>" . $row['ph_premium_bill'] . "</td>";                  
                echo "<td>" . $row['discord_nitro_bill'] . "</td>";  
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="manifest" href="manifest.json" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Subscription Payment Website" />
<meta name="keywords" content="payment,subscription,website" />
<title>Shop</title>
</head>
<body>

	<br>
	<div class="container">
		<form>
			<br>CURRENT USER: CLARK
			<br>
			<label> Cash from E-Wallet: </label>
			<?php  
			$sql = "SELECT * FROM persons";
			
			?>
			<br> 
			<label> My
				Subscriptions (to-pay): </label> <br> 
			<label> Spotify: </label>
			<button>Pay <=this button not yet coded</button>
			<br> <label> Discord Nitro: </label>
			<button>Pay <=this button not yet coded</button>
			<br> <label> PH Premium: </label>
			<button>Pay <=this button not yet coded</button>

		</form>
	</div>
	<br><br>
<form action="test-add-spotify-bill.php" method="post">
    <button type="submit" name="action" value="submit">Test Add Spotify Bill 500 to clark</button>
</form>

<form action="test-pay-spotify-bill.php" method="post">
    <button type="submit" name="action" value="submit">Test Pay All Spotify bill from clark</button>
</form>

<form action="update-mysql-pay.php" method="post">
    <button type="submit" name="action" value="submit">Test Add Cash 1000 to Clark</button>
</form>
<br><br>
	==================================================================
	<br>LEARNING/TESTING SIDE BELOW:
	<?php
echo "My first PHP script!";
?>

<h1>My first PHP page</h1>

<?php
echo "Hello World!";
?>

<?php
$color = "red";
echo "My car is " . $color . "<br>";
echo "My house is " . $COLOR . "<br>";
echo "My boat is " . $coLOR . "<br>";
?>
	<div>This is pure HTML message.</div>
	<div>Next, we’ll display today’s date and day by PHP!</div>
	<div>
		Today’s date is <b>
			<?php echo date('Y/m/d') ?>
		</b> and it’s a <b>
			<?php echo date('l') ?>
		</b> today!
	</div>
	<div>Again, this is static HTML content.</div>
	
	
	
</body>
</html>




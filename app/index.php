<?php
session_start();
if (! isset($_SESSION["login"]))
    header("location:login.php");
$current_user = $_SESSION["login"];
include ("config.php");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM persons";
if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>first_name: </th>";
        echo "<th>e-wallet: </th>";
        echo "<th>spotify bill:</th>";
        echo "<th>ph premium bill: </th>";
        echo "<th>discord nitro: </th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
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
        echo "</div>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

// Close connection
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="manifest" href="manifest.json" />
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
		<br>Current user: <?php
echo $current_user;
?> <br> <label> Cash from E-Wallet: </label> <br> <label> My
			Subscriptions (to-pay): </label> <br>

		<form action="test-pay.php" method="post">
			<label> Spotify: </label>
			<button type="submit" name="spotify" value="submit">Pay</button>
			<br> <label> Discord Nitro: </label>

			<button type="submit" name="discord" value="submit">Pay</button>
			<br> <label> PH Premium: </label>
			<button type="submit" name="ph" value="submit">Pay</button>

		
		</form>


		

	</div>
	<br>
	<br>
	<div class="container">
		<form action="test-add-bill.php" method="post">
			<button type="submit" name="spotify" value="submit">Test Add Spotify
			Bill 200 to <?php echo $current_user;?></button>
			<br><button type="submit" name="discord" value="submit">Test Add Discord
			Bill 500 to <?php echo $current_user;?></button>
			<br><button type="submit" name="ph" value="submit">Test Add PH
			Bill 300 to <?php echo $current_user;?></button>
			
			
		</form>
		<form action="test-mysql-add-cash.php" method="post">
			<button type="submit" name="action" value="submit">Test Add Cash 1000
			to <?php echo $current_user;?></button>
		</form>
		
		<form action="clear-all-bills-cash.php" method="post">
			<button type="submit" name="action" value="submit">Clear all for <?php echo $current_user;?></button>
		</form>
		<br> <a href="logout.php"><h2>
				<div style="color: red">Logout</div>
			</h2> </a>
	</div>
</body>
</html>

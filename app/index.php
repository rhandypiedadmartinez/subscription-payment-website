<?php
session_start();
if (! isset($_SESSION["login"]))
    header("location:login.php");
$current_user = $_SESSION["login"];
include ("config.php");

// Close connection
// mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Bootstrap -->
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<link rel="manifest" href="manifest.json" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Subscription Payment Website" />
<meta name="keywords" content="payment,subscription,website" />
<title>Payoda</title>
<link rel="stylesheet" href="./static/css/index.css">
</head>
<body>
	<nav
		class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link active">Pay Bills</a></li>
			<li class="nav-item"><a class="nav-link" href="payment-history.php">Payment
					History</a></li>
			<li class="nav-item"><a class="nav-link" href="myprofile.php">My
					Profile</a></li>
			<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
		</ul>
	</nav>
	<?php

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM persons where email='$current_user'";
if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $e_wallet = $row['e_wallet'];
            $spotify_bill = $row['spotify_bill'];
            $discord_nitro_bill = $row['discord_nitro_bill'];
            $ph_premium_bill = $row['ph_premium_bill'];
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-lg">
				<div>
					Current user: 
					<span class="font-bold">
						<?php echo $current_user; ?>
					</span> 
				</div>
				<div>
					Cash from E-Wallet: 
					<span class="font-bold">
						<?php echo $e_wallet; ?>
					</span>
				</div>
			</div>

			<div class="card">
				<img class="card-img-top"
					src="https://www.freepnglogos.com/uploads/spotify-logo-png/spotify-download-logo-30.png"
					alt="Card image" style="width: 100%">
				<div class="card-body">
					<h4 class="card-title">Spotify Bill Details</h4>
					<p class="card-text">Amount: Php <?php echo $spotify_bill?></p>
					<p class="card-text">Due date: April 31, 2022</p>

					<form action="test-pay.php" method="post">
						<button type="submit" name="spotify" value="submit" class="bg-gray-200 hover:bg-gray-400">Pay</button>
					</form>
				</div>
			</div>

			<div class="card">
				<img class="card-img-top"
					src="https://www.freepnglogos.com/uploads/discord-logo-png/discord-logo-logodownload-download-logotipos-1.png"
					alt="Card image" style="width: 100%">
				<div class="card-body">
					<h4 class="card-title">Discord Nitro Bill</h4>
					<p class="card-text">Amount: Php <?php echo $discord_nitro_bill?></p>
					<p class="card-text">Due date: March 5, 2022</p>
					<form action="test-pay.php" method="post">
						<button type="submit" name="discord" value="submit" class="bg-gray-200 hover:bg-gray-400">Pay</button>
					</form>
				</div>
			</div>

			<div class="card">
				<img class="card-img-top"
					src="https://www.philhealth.gov.ph/news/2019/images/phic_logov.jpg"
					alt="Card image" style="width: 100%">
				<div class="card-body">
					<h4 class="card-title">PhilHealth Premium Insurance</h4>
					<p class="card-text">Amount: Php <?php echo $ph_premium_bill?></p>
					<p class="card-text">Due date: March 5, 2022</p>
					<form action="test-pay.php" method="post">
						<button type="submit" name="ph" value="submit" class="bg-gray-200 hover:bg-gray-400">Pay</button>
					</form>
				</div>
			</div>

		</div>
	</div>

</body>
</html>

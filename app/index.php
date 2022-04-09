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
<style>
body {
	scroll-behavior: smooth;
	height: 100%;
	background: #3AAFA9;
	padding-top: 80px;
}

a {
	text-decoration: none;
}

table {
	border: 1px solid black;
}

th {
	padding: 8px;
	border: 1px solid black;
}

td {
	padding: 8px;
	border: 1px solid black;
}

/* nakakatamad na lagyan ng Tailwind classes ung mga buttons
kaya pure css nlng:)
*/
button[type="submit"] {
	background-color: #e5e7eb;
	border: 1px solid #475569;
	padding: 4px 12px 4px 12px;
	border-radius: 0.375rem;
}

[type="submit"]:hover {
	background-color: #d1d5db;
}

.card {
	width: 250px;
	margin: 5px;
	border-radius: 10px;
	background-color: #172529;
	padding: 15px;
	color: #feffff;
	padding-top: auto;
	padding-bottom: auto;
}

.card button {
	color: black;
	margin-top: 10px;
}

/*
	color pallette
	background: #172529;
	background: #2B7A78;
	background: #3AAFA9;
	background: #DEF2F1;
	background: #FEFFFF;
*/
.card-img-top {
	max-height: 150px;
	max-width: 150px;
	display: block;
	margin-left: auto;
	margin-right: auto;
	border-radius: 20px;
}

.row {
	margin-left: auto;
	margin-right: auto;
}
</style>
</head>
<body>
	<nav
		class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top justify-content-center">
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
			<div class="col-md-12 col-sm-12">
				<h1>Current user: <?php echo $current_user; ?> </h1>
				<h1>
					 Cash from E-Wallet: <?php echo $e_wallet; ?>
				</h1>
			</div>

			<div class="card">
				<img class="card-img-top "
					src="https://www.freepnglogos.com/uploads/spotify-logo-png/spotify-download-logo-30.png"
					alt="Card image" style="width: 100%">
				<div class="card-body">
					<h4 class="card-title">Spotify Bill Details</h4>
					<p class="card-text">Amount: Php <?php echo $spotify_bill?></p>
					<p class="card-text">Due date: April 31, 2022</p>

					<form action="test-pay.php" method="post">
						<button type="submit" name="spotify" value="submit">Pay</button>
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
						<button type="submit" name="discord" value="submit">Pay</button>
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
						<button type="submit" name="ph" value="submit">Pay</button>
					</form>
				</div>
			</div>

		</div>
	</div>

</body>
</html>

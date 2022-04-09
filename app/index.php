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
<title>Shop</title>
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
        echo "<div class='container flex'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>first_name </th>";
        echo "<th>e-wallet</th>";
        echo "<th>spotify bill:</th>";
        echo "<th>discord nitro </th>";
        echo "<th>ph premium bill </th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['e_wallet'] . "</td>";
            $e_wallet = $row['e_wallet'];
            echo "<td>" . $row['spotify_bill'] . "</td>";
            echo "<td>" . $row['discord_nitro_bill'] . "</td>";
            echo "<td>" . $row['ph_premium_bill'] . "</td>";
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

?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Current user: <?php echo $current_user; ?> </p>
				<p>
					<label> Cash from E-Wallet: <?php echo $e_wallet; ?></label>
				</p>
				<p>
					<label> My Subscriptions (to-pay): </label>
				</p>

				<form action="test-pay.php" method="post">
					<label> Spotify: </label>
					<button type="submit" name="spotify" value="submit">Pay</button>
					<br> <label> Discord Nitro: </label>

					<button type="submit" name="discord" value="submit">Pay</button>
					<br> <label> PH Premium: </label>
					<button type="submit" name="ph" value="submit">Pay</button>
				</form>

			</div>
			
		</div>
	</div>

</body>
</html>

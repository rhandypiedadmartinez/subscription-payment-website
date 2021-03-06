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
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Bootstrap -->
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="manifest" href="manifest.json" />
<link rel="stylesheet" href="./css/build.css" />

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Subscription Payment Website" />
<meta name="keywords" content="payment,subscription,website" />
<title>
	<?php 
	echo $current_user;
	echo " - My Profile";
	?>
</title>
<link rel="stylesheet" href="./css/font.css">
<style>
body {
	scroll-behavior: smooth;
	height: 100%;
	background: #3AAFA9;
}
</style>
</head>
<body class="font-poppins">
	<nav
		class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="index.php">Pay Bills</a></li>
			<li class="nav-item"><a class="nav-link" href="payment-history.php">Payment
					History</a></li>
			<li class="nav-item"><a class="nav-link active">My
					Profile </a></li>
			<li class="nav-item"><a class="nav-link" href="controller/logout.php">Logout</a></li>
		</ul>
	</nav>
	<div class="container p-3">
		<div class="row">
			<div class="col-md-12 col-sm-12">

				<a href=controller/change-password.php>
					<h5>
						<div class="text-gray-900 hover:text-gray-100 w-1">Change Password</div>
					</h5>
				</a>

			</div>
		</div>
	</div>

</body>
</html>

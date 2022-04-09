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
</style>
</head>
<body>
	<nav
		class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top justify-content-center">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="index.php">Pay Bills</a></li>
			<li class="nav-item"><a class="nav-link active">Payment
					History</a></li>
			<li class="nav-item"><a class="nav-link" href="myprofile.php">My
					Profile </a></li>
			<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
		</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">

			</div>
		</div>
	</div>

</body>
</html>

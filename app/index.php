<?php
session_start();
if (! isset($_SESSION["login"]))
    header("location:login.php");
$current_user = $_SESSION["login"];

include ("config.php");
include ("model/get-billers-list.php"); // creates array of all billers and details
include ("model/mybills.php"); // creates array of bills object

if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT e_wallet FROM persons where email='$current_user'";
if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $e_wallet = $row['e_wallet'];
        }
        // Free result set
        mysqli_free_result($result);
    }
}
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
			<li class="nav-item"><a class="nav-link" href="controller/logout.php">Logout</a></li>
		</ul>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-lg">
				<div class="font-bold">
					Current user: 
						<?php echo $current_user; ?>
				</div>
				<div class="font-bold">
					Cash from E-Wallet:
						<?php echo $e_wallet; ?>
				</div>
			</div>

				<?php 
				foreach ($bills as $bill) {
				echo '<div class="card">
        				<img class="card-img-top"
        					src="'.$bill->ref.'"
        					alt="Card image" style="width: 100%">
        				<div class="card-body">
        					<h4 class="card-title">' . $bill->billername . ' </h4>
        					<p class="card-text">Amount: Php  '. $bill->amount .'</p>
        					<p class="card-text">Due date: March 5, 2022</p>
        					<form action="controller/test-pay.php" method="post">
        						<button type="submit" name="ph" value="submit"
        							class="bg-gray-200 hover:bg-gray-400">Pay</button>
        					</form>
        				</div>
        			</div>';
        		}
				?>
		</div>
	</div>

</body>
</html>

<?php
session_start();
if (! isset($_SESSION["login"]))
    header("location:login.php");
$current_user = $_SESSION["login"];
$_SESSION["e_wallet"];

include ("config.php");
include ("model/get-billers-list.php"); // creates array of all billers and details
include ("model/mybills.php"); // creates array of bills object

if ($mysqli == false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT first_name,last_name,e_wallet, profile_pic FROM persons where email='$current_user'";
if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["e_wallet"] = $row['e_wallet'];
            $profile_pic = $row['profile_pic'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
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

<script src="tailwind.config.js"></script>

<link rel="manifest" href="manifest.json" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Subscription Payment Website" />
<meta name="keywords" content="payment,subscription,website" />
<title>Payoda</title>
<link rel="stylesheet" href="./css/index.css">
</head>
<body class="font-poppins">
	<div>
		<nav
			class="navbar navbar-expand-lg bg-dark navbar-dark justify-content-center">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link active">Pay Bills</a></li>
				<li class="nav-item"><a class="nav-link" href="payment-history.php">Payment
						History</a></li>
				<li class="nav-item"><a class="nav-link" href="myprofile.php">My
						Profile</a></li>
				<li class="nav-item"><a class="nav-link" href="controller/logout.php">Logout</a></li>
			</ul>
		</nav>
	</div>

	<div class="container">
		<div class="row justify-center">
			<div class="card p-3">
				<img class="card-img-top my-3" src="<?php echo $profile_pic?>"
					alt="Card image" style="width: 100%">
				<div class="card-body">
					<h4 class="card-title"> <?php echo $fname.' '.$lname;?> </h4>
					<h4 class="card-title"> Email: <?php echo $current_user;?> </h4>
					<p class="card-text">E-Wallet: Php <?php echo $_SESSION["e_wallet"]; ?></p>
				</div>
			</div>
				<?php
    foreach ($bills as $bill) {
        echo '<div class="card p-3">
        				<img class="my-3 card-img-top"
        					src="' . $bill->ref . '"
        					alt="Card image" style="width: 100%">
        				<div class="card-body">
        					<h4 class="card-title">' . $bill->billername . ' Subscription</h4>';
                            
        if ($bill->amount == 0) {
            echo '<h4 class="card-text"> Status: Fully Paid</h4>';
        } else {
            echo '<p class="card-text">Amount: Php  ' . $bill->amount . '</p>
        					<p class="card-text">Due date: March 5, 2022</p>';
            echo '<form action="controller/test-pay.php" method="post">
        						<button type="submit" name="' . $bill->billername . '" value="submit"
        							class="bg-gray-200 hover:bg-gray-400">Pay</button>
        					</form>';
        }
        echo '</div></div>';
    }

    ?>
		</div>
	</div>

</body>
</html>

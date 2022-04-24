<?php
session_start();
if (! isset($_SESSION["login"]))
    header("location:login.php");
$current_user = $_SESSION["login"];

$myID = $_SESSION["userID"];
include ("config.php");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
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
<link rel="stylesheet" href="./css/font.css">
<script src="tailwind.config.js"></script>

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
    font-family: Poppins;
}
* {
    font-family: Poppins;
}
#custom_table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  background-color: #DEF2F1;
  border-radius: 10px;
  box-shadow: 0 0 0 10px #DEF2F1; /* this draws the table border  */ 
}

#custom_table td, #custom_table th {
  border: 1px solid #172529;
  padding: 8px;
}

#custom_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #172529;
  color: #feffff;
  text-align: center;
}



/*
	color pallette
	background: #172529;
	background: #2B7A78;
	background: #3AAFA9;
	background: #DEF2F1;
	background: #FEFFFF;
*/

</style>
</head>
<body class="font-poppins">
	<nav
		class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top justify-content-center">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="index.php">Pay Bills</a></li>
			<li class="nav-item"><a class="nav-link active">Payment
					History</a></li>
			<li class="nav-item"><a class="nav-link" href="myprofile.php">My
					Profile </a></li>
			<li class="nav-item"><a class="nav-link" href="controller/logout.php">Logout</a></li>
		</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				  	<?php

                    // Attempt select query execution
                    $sql = "SELECT * FROM billing_history where customer_id='$myID'";
                    if ($result = mysqli_query($mysqli, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<div class='container'>";
                            echo "<table id='custom_table'>";
                            echo "<tr>";
                            echo "<th>Timestamp</th>";
                            echo "<th>Subscription Paid</th>";
                            echo "<th>Amount Paid </th>";

                            echo "</tr>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['payment_timestamp'] . "</td>";
                                echo "<td>" . $row['subscription_paid'] . "</td>";
                                echo "<td>" . $row['amount_paid'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo "You have not paid any subscription yet.";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
                    }

                    ?>
			</div>
		</div>
	</div>

</body>
</html>

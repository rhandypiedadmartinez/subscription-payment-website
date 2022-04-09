<?php
session_start();
include ("config.php");

// Check connection

if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Close connection
// mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="manifest" href="manifest.json" />

<!-- Bootstrap -->
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Subscription Payment Website" />
<meta name="keywords" content="payment,subscription,website" />
<style>
body {
	scroll-behavior: smooth;
	height: 100%;
	background: #3AAFA9;
	padding-top: 80px;
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

a {
	text-decoration: none;
}
</style>
<title>Shop</title>
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
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				
                    	<?php

                    // Attempt select query execution
                    $sql = "SELECT * FROM persons";
                    if ($result = mysqli_query($mysqli, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<div class='container'>";
                            echo "<table>";
                            echo "<tr>";
                            echo "<th>id</th>";
                            echo "<th>email</th>";
                            echo "<th>first_name </th>";
                            echo "<th>last_name </th>";
                            echo "<th>e-wallet</th>";
                            echo "<th>spotify bill</th>";

                            echo "<th>discord nitro </th>";
                            echo "<th>ph premium bill </th>";
                            echo "<th>sha1_password </th>";

                            echo "</tr>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['first_name'] . "</td>";
                                echo "<td>" . $row['last_name'] . "</td>";
                                echo "<td>" . $row['e_wallet'] . "</td>";
                                echo "<td>" . $row['spotify_bill'] . "</td>";
                                echo "<td>" . $row['discord_nitro_bill'] . "</td>";

                                echo "<td>" . $row['ph_premium_bill'] . "</td>";
                                echo "<td>" . $row['sha1_password'] . "</td>";
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
			</div>

			<div class="col-md-12 col-sm-12">
				<!-- 
Tailwind Classes Button preset:
"py-1 bg-gray-200 rounded-md px-3 border-solid border-slate-600 hover:bg-gray-300 border-[1px]"

 -->

	<?php echo 'Current test user: '.$_SESSION["login"] ?>
		<form method="post" action="admin-page.php">
					<input type="text" name="testuser" id="testuser"
						class="border-solid border border-slate-800 rounded-md p-1 pl-5">
					<input type="submit" value="click"
						class="bg-gray-200 rounded-md py-1 px-3 border-solid border-slate-600 border-[1px] hover:bg-gray-300">
				</form>
		
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION["login"] = $_POST['testuser'];
            $_SESSION["isAdmin"] = "true";
            header("location:admin-page.php");
        }
        ?>
        <form action="test-pay.php" method="post">
					<label> Spotify: </label>
					<button type="submit" name="spotify" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Pay</button>
					<br> <label> Discord Nitro: </label>

					<button type="submit" name="discord" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Pay</button>
					<br> <label> PH Premium: </label>
					<button type="submit" name="ph" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Pay</button>
				</form>
				<form action="test-add-bill.php" method="post">
					<button type="submit" name="spotify" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Test Add Spotify
			Bill 200 to <?php echo $current_user;?></button>
					<br>
					<button type="submit" name="discord" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Test Add Discord
			Bill 500 to <?php echo $current_user;?></button>
					<br>
					<button type="submit" name="ph" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Test Add PH
			Bill 300 to <?php echo $current_user;?></button>

				</form>

				<form action="test-add-cash.php" method="post">
					<button type="submit" name="action" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Test add cash</button>
				</form>

				<form action="clear-all.php" method="post">
					<button type="submit" name="action" value="submit"
						class="bg-gray-200 
                rounded-md py-1 px-3 
                border-solid border-slate-600 
                border-[1px] hover:bg-gray-300">Clear</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

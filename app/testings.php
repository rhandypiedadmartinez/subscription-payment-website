<?php
// loop
include ("config.php");

// Check connection

if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

class bill
{

    public $billername;
    public $amount;
    public $ref;

    function __construct($billername, $amount, $ref)
    {
        $this->billername = $billername;
        $this->amount = $amount;
        $this->ref = $ref;
    }
}

$bills = array();

// array_push($bills,new bill("rab", "12"));
class billers
{

    public $billername;
    public $bill_name;
    public $ref;

    function __construct($billername, $bill_name, $ref)
    {
        $this->billername = $billername;
        $this->bill_name = $bill_name;
        $this->ref = $ref;
    }
}
$billers = array();

$current_customer = 'clark';

$sql_biller = "SELECT * FROM biller_list";
if ($result_biller = mysqli_query($mysqli, $sql_biller)) {
    if (mysqli_num_rows($result_biller) > 0) {
        while ($row = mysqli_fetch_array($result_biller)) {
            array_push($billers, new billers($row['biller_name'], $row['biller_bill_name'], $row['ref']));
        }
    }
}

// bill objects
$i=0;
foreach ($billers as $biller) {
    $sql = "SELECT * FROM persons where email='$current_customer'";
    if ($result = mysqli_query($mysqli, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row[$biller->bill_name] != - 1) {
                    array_push($bills, new bill($biller->billername, $row[$biller->bill_name],$billers[$i]->ref));
                }
                $i++;
            }
            mysqli_free_result($result);
        }
    }
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

	<div class="container">
		<div class="row">
<?php
foreach ($bills as $bill) {
    echo '<div class="card">
				<img class="card-img-top "
					src="'.$bill->ref.'"
					alt="Card image" style="width: 100%">
				<div class="card-body">
					<h4 class="card-title">' . $bill->billername . ' Bill Details</h4>
					<p class="card-text">Amount: Php ' . $bill->amount . '</p>
					<p class="card-text">Due date: April 31, 2022</p>
                
					<form action="test-pay.php" method="post">
						<button type="submit" name="spotify" value="submit">Pay</button>
					</form>
				</div>
			</div>';
}
echo '</div></div>';

?>


</body>
</html>

<?php 
echo '<br>Current test user: '.$current_customer;
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
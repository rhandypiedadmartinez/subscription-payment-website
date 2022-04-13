<?php
session_start();
include ("config.php");
$current_user = $_SESSION["login"];

echo $current_user . '=' . 'isAdmin' . $_SESSION['isAdmin'];
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
<title>Shop</title>
<style>
a {
	text-decoration: none;
}
#Return {
	color: red;
}
#Return:hover {
	color: maroon;
}
</style>
</head>
<body>
	<br>
	<br>
	<br>
	<div class="container">
		
	<?php echo 'Input new password'?>
		<form method="post" action="change-password.php">
			<input type="text" name="new_password" id="new_password" class="mt-2 border-solid border-[1px] border-slate-800 rounded-md p-1 pl-5"> 
			<input type="submit" value="click" class="bg-gray-200 rounded-md py-1 px-3 border-solid border-slate-600 border-[1px] hover:bg-gray-300">
	
        	
        
        	<a href="index.php"><h2>
        		<div id="Return" class="mt-3">Return to Home</div>
        	</h2> </a>
		</form>
		
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $new_password = $_POST['new_password'];
            $res = mysqli_query($mysqli, "UPDATE persons SET sha1_password = sha1('$new_password') where email='$current_user'");
            $result = mysqli_fetch_array($res);
            $mysqli->close();
            header("location: index.php");
        }
        ?>
	</div>
</body>
</html>



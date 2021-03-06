
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jQuery -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
	integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
	crossorigin="anonymous">

<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
	integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
	crossorigin="anonymous">

<title>Payoda</title>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/build.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@media only screen and (max-width: 400px) {
  .form-container {
    max-width: 306px;
  }
	body,html {
		background-image: linear-gradient(270deg, #172529, 43%, #3AAFA9);
	}
}
</style>

</head>
<body class="mt-6 justify-center flex font-poppins">
	<div>
		<div class="center">
			<span class="text-7xl mb-6"> <b>Pay</b>oda
			</span>
		</div>
		<div class="center">
			<form action="controller/loginprocess.php" method="POST"
				class="form-container bg-[#172529] rounded-xl font-weight-medium p-4">

				<div class="fw-bold text-2xl mb-1">Login</div>
					<input type="radio" name="login_opt" value="customer" checked> 
					<label for="lbl_customer">as customer</label><br> 
					
					<input type="radio" name="login_opt" value="biller"> 
					<label for="lbl_biller">as biller</label><br> 
					
					<label for="lbl_email"> <b>Email</b>
				</label> <input type="text" placeholder="Enter Email" name="email"
					required> <label for="lbl_password"> <b>Password</b>
				</label> <input type="password" placeholder="Enter Password"
					name="password" required>

				<button type="submit" value="Login" name="sub" class="btn">Login</button>

				<span class="center"
					style="margin-top: 15px; font-size: 12px; opacity: 0.8;">Account
					not yet created?</span> <a style="margin: 10px auto;"
					href="registration-page.php" class="btn">Register</a> <label
					class="ml-12 pt-3">
					<?php
    if (isset($_REQUEST["err"]))
        $msg = "Invalid username or Password";
    if (isset($msg)) {
        echo '<h5 class="text-red-500">' . $msg . '</h5>';
    }
    ?>
				</label>
			</form>
		</div>
		<a href="setdb.php" class="center my-2">setup/reset db</a>

	</div>
</body>
</html>

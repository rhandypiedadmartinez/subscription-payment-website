
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<script src="tailwind.config.js"></script>

<!-- jQuery -->
<script
	src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

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
<link rel="stylesheet" href="./css/login.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');	
</style>

</head>
<body class="mt-20 justify-center flex font-poppins lg:overflow-hidden">
	<div>
		<div class="center">
			<span class="text-7xl mb-12"> <b>Pay</b>oda
			</span>
		</div>
		<div class="center">
			<form action="controller/loginprocess.php" method="POST"
				class="form-container bg-[#172529] rounded-xl font-weight-medium p-4">

				<div style class="fw-bold text-2xl mb-1">Login</div>

				<label for="email"> <b>Email</b>
				</label> <input type="text" placeholder="Enter Email" name="uname"
					required> <label for="psw"> <b>Password</b>
				</label> <input type="password" placeholder="Enter Password"
					name="upassword" required>

				<button type="submit" value="Login" name="sub" class="btn">Login</button>

				<label class="ml-12 pt-3">
					<?php
				    if (isset($_REQUEST["err"]))
				        $msg = "Invalid username or Password";
				    ?>
										<h5 class="text-red-500">
										<?php

				    if (isset($msg)) {
				        echo $msg;
				    }
				    ?>
				
				</label>

				</h5>
			</form>

		</div>
		<br>
		
	<center><a href="setdb.php">setup/reset db</a></center>
	</div>
	</div>
</body>
</html>

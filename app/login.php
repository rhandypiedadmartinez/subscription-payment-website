
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

<script>
tailwind.config = {
	theme: {
		screens: {
			'sm': '360px',
			'md': '600px'
		}
	}
}
</script>

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
<link rel="stylesheet" href="./static/css/login.css">

</head>
<body
	class="sm:items-center md:items-start md:mt-20 justify-center flex">
	<div>
		<div class="center">
			<span style="font-family: serif;" class="text-7xl mb-12"> <b>Pay</b>oda
			</span>
		</div>
		<div class="center">
			<form action="controller/loginprocess.php" method="POST"
				class="form-container bg-[#172529] rounded-xl font-weight-bold p-4">

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
	</div>
	</div>
</body>
</html>

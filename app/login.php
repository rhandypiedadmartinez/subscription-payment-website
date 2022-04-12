<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<script
	src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
	integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
	crossorigin="anonymous">

<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<title>PayraCash</title>
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
	integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
	crossorigin="anonymous">

<style>
body {
	font-family: Arial, Helvetica, sans-serif;
}

* {
	box-sizing: border-box;
}

body, html {
    padding-top:40px;
	scroll-behavior: smooth;
	height: 100%;
	background: #3AAFA9;
	font-family: monospace;
	color: #FEFFFF;
	/* For browsers that do not support gradients */
	background-image: linear-gradient(270deg, #172529, 42%, #3AAFA9);
	color: #FEFFFF;
}

/* Add styles to the form container */
.form-container {
	max-width: 400px;
	padding: 10px;
	background-color: #172529;
	border-radius: 10px;
	font-weight: bold;
	border-style: groove ;
	border-color: #FEFFFF;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	border: none;
	background: #f1f1f1;
	border-radius: 10px;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus
	{
	background-color: #ddd;
	outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
	max-width: 100%;
	background-color: #3AAFA9;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%;
	opacity: 0.8;
	border-radius: 10px;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
	opacity: 1;
}
/*
		color pallette
		background: #172529;
		background: #2B7A78;
		background: #3AAFA9;
		background: #DEF2F1;
		background: #FEFFFF;
		*/
.center {
	display: flex;
	justify-content: center;
}
</style>
</head>
<body>
	<div>
		<div class="center">
			<span style="font-size: 90px; font-family: serif;"> <b>Pay</b>oda
			</span>
		</div>
		<div class="center">
			<form action="loginprocess.php" method="POST" class="form-container">

				<h1 style="font-weight: bold;">Login</h1>

				<label for="email"><b>Email</b></label> <input type="text"
					placeholder="Enter Email" name="uname" required=""> <label
					for="psw"><b>Password</b></label> <input type="password"
					placeholder="Enter Password" name="upassword" required="">

				<button type="submit" value="Login" name="sub" class="btn">Login</button>

				<label style="padding-top: 10px;margin-left: 50px;">
				     <?php
                if (isset($_REQUEST["err"]))
                    $msg = "Invalid username or Password";
                ?>
                <h5 style="color: red;">
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

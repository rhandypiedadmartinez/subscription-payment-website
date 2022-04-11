<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
	font-family: Arial, Helvetica, sans-serif;
}

* {
	box-sizing: border-box;
}

body, html {
	scroll-behavior: smooth;
	height: 100%;
	background: #3AAFA9;
	font-family: monospace;
	padding-top: 50px;
	color: #FEFFFF;
	/* For browsers that do not support gradients */
	background-image: linear-gradient(270deg, #172529, 42%, #3AAFA9);
	padding-top: 75px;
	color: #FEFFFF;
}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
	background-color: #172529;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	opacity: 0.8;
	position: fixed;
	bottom: 0px;
	right: 28px;
	width: 370px;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
	border-color: #3AAFA9;
	border-bottom-color: #172529;
	border-width: 3px;
	border-style: ridge;
}

/* The popup form - hidden by default */
.form-popup {
	border-color: 3AAFA9;
	display: none;
	position: fixed;
	bottom: 0;
	right: 15px;
	border: 3px groove;
	z-index: 9;
	border-style: ridge;
	border-radius: 10px;
}

/* Add styles to the form container */
.form-container {
	max-width: 400px;
	padding: 10px;
	background-color: #172529;
	border-radius: 10px;
	border-color: 3AAFA9;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	border: none;
	background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus
	{
	background-color: #ddd;
	outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
	max-width: 400px;
	background-color: #04AA6D;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%;
	margin-bottom: 10px;
	opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
	background-color: red;
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
</style>
</head>
<body>
	<div container="">
		<h1 style="font-size: 90px; margin-left: 150px">PayraCash</h1>

	</div>

	<button class="open-button" onclick="openForm()">Login</button>

	<div class="form-popup" id="myForm">
		<form action="loginprocess.php" method="POST" class="form-container">
			<h1>Login</h1>

			<label for="email"><b>Email</b></label> <input type="text"
				placeholder="Enter Email" name="uname" required=""> <label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="upassword"
				required="">

			<button type="submit" value="Login" name="sub" class="btn">Login</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		</form>
	</div>
                <?php
                if (isset($_REQUEST["err"]))
                    $msg = "Invalid username or Password";
                ?>
                <p style="color: blue;">
                <?php

                if (isset($msg)) {
                    echo $msg;
                }
                ?>



<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>

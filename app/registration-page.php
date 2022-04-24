
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
<link rel="stylesheet" href="./css/registration.css">
<link rel="stylesheet" href="./css/build.css">
<style>
@import
	url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>

</head>
<body>
	<div>
		<div class="mt-4 flex font-poppins lg:overflow-hidden center">
			<div class="col-md-12 center">
				<form action="controller/registrationprocess.php" method="POST"
					class="form-container bg-[#172529] rounded-xl font-weight-medium p-4">

					<div class="fw-bold text-2xl mb-1">Registration</div>

					<select class="btn opt" style="background-color:#feffff" required>
						<option value="" selected disabled value="">Choose Account Type</option>
						<option value="customer">Customer Account</option>
						<option value="biller" disabled>Biller Account</option>
					</select> <label for="lbl_fname"> <b>First Name</b>
					</label> <input type="text" placeholder="Enter First name"
						name="fname" required> <label for="lbl_lname"> <b>Last Name</b>
					</label> <input type="text" placeholder="Enter Last name"
						name="lname" required>
					
					<label for="lbl_email"> <b>Email</b>
					</label> <input type="text" placeholder="Enter Email" name="email"
						required> 

					<button type="submit" value="Register" name="sub" class="btn">Proceed ></button>


					<label class="ml-12 pt-3">
					
    					<?php
                        if (isset($_REQUEST["err"]))
                            $msg = "Account already exists";
                
                        if (isset($msg)) {
                            echo '<h5 class="text-red-500">' . $msg . '</h5></span>';
                        }
                        ?>
                    			
					</label>

				</form>

			</div>
		</div>
		<br>
	</div>
</body>
</html>

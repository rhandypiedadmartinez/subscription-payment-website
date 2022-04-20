<?php
session_start();
include ("../config.php");
?>
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


<!-- Ajax -->
 <script	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
<link rel="stylesheet" href="../css/registration.css">
<style>
@import
	url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap')
	;
</style>

</head>
<body>
	<div>
		<div class="mt-40 flex font-poppins lg:overflow-hidden center">
			<div class="col-md-12 center">
				<form action="registrationprocess.php" method="POST"
					class="form-container bg-[#172529] rounded-xl font-weight-medium p-4">

					<label for="lbl_password"> <b>Set up Password</b>
					</label> <input id="password" type="password" placeholder="Enter Password"
						name="password" required> 
					<label for="lbl_password_2"> <b>Verify	Password</b>
					</label> 
					<input id="confirm_password" type="password" placeholder="Confirm Password"
						name="password" required>

					<button style= "background-color: gray " id="btn-create-user" type="submit" value="Register" name="sub_register" class="btn" disabled>Register</button>

				
	
			<script type="text/javascript">
                  $('#password, #confirm_password').on('keyup', function () {
            	  if ($('#password').val() == $('#confirm_password').val()) {
              	    $('#confirm_password').html('Matching').css('color', 'green');
          	    	$('#btn-create-user').prop('disabled',false);

        	  		  $('#btn-create-user').css('background-color','#3AAFA9');
            	  } else {

            	    $('#btn-create-user').prop('disabled',true);
            	    $('#confirm_password').html('Not Matching').css('color', 'red');

          	  		  $('#btn-create-user').css('background-color','gray');
            	  }
            	});
            </script>
            
					<label class="ml-12 pt-3">
                    	
    					<?php
        if (isset($_REQUEST["err"]))
            $msg = "Password does not match";

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

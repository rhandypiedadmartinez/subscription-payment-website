<?php 
echo 'isAdmin'.$_SESSION['isAdmin'];
?>
<html>
<head>
</head>
<center>
	<fieldset>
		<legend>Login </legend>
		<form action="loginprocess.php" method="POST">
			<br> <br> Username:<input type="text" required="" name="uname"><br> <br>
			Password:<input type="text" required="" name="upassword"><br> <br> <input
				type="submit" value="Login" name="sub"> <br>
		</form>
                <?php
                if (isset($_REQUEST["err"]))
                    $msg = "Invalid username or Password";
                ?>
                <p style="color: red;">
                <?php
                
                if (isset($msg)) {
                    echo $msg;
                }
                ?>

	</fieldset>
</center>
</html>


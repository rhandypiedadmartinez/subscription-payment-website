<html>
<body>
	<form method="post" action="test-codes.php">
		<input type="text" name="studentname" id="studentname"> <input
			type="submit" value="click">
	</form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $GLOBALS['variable_name'] = $_POST['studentname'];
            echo $variable_name;
        }
        ?>
    </body>
</html>

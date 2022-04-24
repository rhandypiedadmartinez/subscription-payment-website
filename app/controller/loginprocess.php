<?php
session_start();
include ("../config.php");

if (isset($_REQUEST['sub'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    if ($email == "admin" and $password == "admin") {
        header("location: ../admin-page.php");
    } else {
        $res = mysqli_query($mysqli, "select * from persons where email='$email' and sha1_password = sha1('$password')");
        $result = mysqli_fetch_array($res);
        if ($result) {
            $_SESSION['userID'] = $result['id'];
            $_SESSION["login"] = $email;
            $_SESSION["isAdmin"] = "false";
            header("location:../index.php");
        } else {
            header("location:../login.php?err=1");
        }
    }
}


//<button type="submit" value="Register" name="validate_account"
  //  class="btn">Proceed ></button>	
?>


<?php
session_start();
include ("../config.php");

if (isset($_REQUEST['submit_regform'])) {
    $a = $_REQUEST['uname'];
    $b = $_REQUEST['upassword'];
    $res = mysqli_query($mysqli, "select * from persons where email='$a' and sha1_password = sha1('$b')");
    $result = mysqli_fetch_array($res);
    print_r($result);
    if ($result) {
         $_SESSION["login"] = $a;
         $_SESSION["isAdmin"] = "false";
         header("location:../index.php");
    } else {
         header("location:../registration.php?err=1");
    }
}
?>


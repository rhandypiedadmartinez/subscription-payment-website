<?php
session_start();
include ("config.php");

if (isset($_REQUEST['sub'])) {
    $a = $_REQUEST['uname'];
    $b = $_REQUEST['upassword'];

    if ($a == "admin" and $b == "admin") {
        header("location: admin-page.php");
    } else {
        $res = mysqli_query($mysqli, "select * from persons where email='$a' and sha1_password = sha1('$b')");
        $result = mysqli_fetch_array($res);
        if ($result) {
            $_SESSION["login"] = $a;
            $_SESSION["isAdmin"] = "false";
            header("location:index.php");
        } else {
            header("location:login.php?err=1");
        }
    }
}
?>


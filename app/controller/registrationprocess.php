<?php
session_start();
$_SESSION['fname'];
$_SESSION['lname'];
$_SESSION['email'];
include ("../config.php");
if (isset($_REQUEST['sub'])) {
    $email = $_SESSION['email'] = $_REQUEST['email'];
    $fname = $_SESSION['fname'] = $_REQUEST['fname'];
    $lname = $_SESSION['lname'] = $_REQUEST['lname'];

    
    $res = mysqli_query($mysqli, "select * from persons where (email='$email' OR ((last_name='$lname') AND (first_name='$fname')))");
    $result = mysqli_fetch_array($res);
    if ($result) {
        header("location:../registration-page.php?err=1");
    } else {
        header("location:reg-set-password.php");
    }
}

if (isset($_REQUEST['sub_register'])) {
    
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    
    $password = sha1($_REQUEST['password']);

    $sql = "INSERT INTO `persons` (first_name,last_name,email,sha1_password) VALUES  ('$fname', '$lname', '$email','$password');";
   
    if ($mysqli->query($sql) == TRUE) {
        echo "New record created successfully";
        
        session_destroy();
        header("location: ../login.php");
    } else {
        
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    
}

?>


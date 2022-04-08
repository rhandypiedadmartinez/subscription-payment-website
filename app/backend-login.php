<?php
usleep(500000);
set_exception_handler(
    function(Throwable $e) {
        echo $e->getMessage();
    }
);

$mysqli = mysqli_connect(
    "localhost",
    "admin",
    "IcedCoffee"
);

$mysqli->select_db("earth");

$query = $mysqli->prepare("SELECT * FROM persons WHERE email= ?");

$query->bind_param('s',$_POST['username']);
$query->execute();
$result = $query->get_result();

$user = $result->fetch_assoc();

# 53b6db49372383e6fb48873bc741a5d6e43f80a0
if (sha1($_POST['password']) === $user['sha1_password']) {
    echo "Password is correct user:".$_POST['username'];
}
else {
    http_response_code(400);
    throw new \Exception("Invalid password!!!");
}

?>

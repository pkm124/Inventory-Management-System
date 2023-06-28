<?php

require_once('conn.php');

$email = $_POST['email'];
$password = md5($_POST['password']);

$check = "select * from signup where email='$email' and password='$password'";
$res = mysqli_query($conn, $check) or die("Error While Logging In");
if (mysqli_num_rows($res) > 0) {
    header('Location: dashboard.php');
}
else {
    header('Location: login.php');
}
?>
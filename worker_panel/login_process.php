<?php

require_once('../conn.php');

$email = $_POST['email'];
$password = md5($_POST['password']);

$check = "select * from worker_details where email='$email' and password='$password'";
$res = mysqli_query($conn, $check) or die("Error While Logging In");
if (mysqli_num_rows($res) > 0) {
    header('Location: worker_dashboard.php');
}
else {
    header('Location: login.php');
}
?>
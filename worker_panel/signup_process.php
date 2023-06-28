<?php

require_once('../conn.php');

$email = $_POST['email'];
$mno = $_POST['mno'];
$password = md5($_POST['password']);

$insert = "insert into worker_details (email, mno, password) values ('$email', '$mno', '$password')";
$res = mysqli_query($conn, $insert) or die("Error While Signing Up");
if ($res) {
    header('Location: login.php');
}
?>
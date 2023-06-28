<?php

require_once('conn.php');

// $godownId = $_GET['godownId'];
$godownName = $_GET['godownName'];

$insert = "insert into godown (godown_name) values ('$godownName')";
$res = mysqli_query($conn, $insert) or die("Error While Inserting");
if ($res) {
    header('Location: dashboard.php');
}
?>
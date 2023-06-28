<?php

require_once('conn.php');

// $catId = $_GET['catId'];
$catName = $_GET['catName'];

$insert = "insert into category (cat_name) values ('$catName')";
$res = mysqli_query($conn, $insert) or die("Error While Inserting");
if ($res) {
    header('Location: dashboard.php');
}
?>
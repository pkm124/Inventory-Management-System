<?php

require_once('conn.php');

$inventoryName = $_GET['inventoryNameDel'];

$insert = "delete from inventory where inven_name='$inventoryName'";
$res = mysqli_query($conn, $insert) or die("Error While Deleting");
if ($res) {
    header('Location: dashboard.php');
}
?>
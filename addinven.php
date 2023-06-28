<?php

require_once('conn.php');

// $inventoryId = $_GET['inventoryId'];
$inventoryName = $_GET['inventoryName'];
$inventoryBrand = $_GET['inventoryBrand'];
$inventoryBatchNo = $_GET['inventoryBatchNo'];
$inventoryQuantity = $_GET['inventoryQuantity'];
$inventoryAvailable = $_GET['inventoryAvailable'];
$inventoryHolding = $_GET['inventoryHolding'];
$inventoryBreakage = $_GET['inventoryBreakage'];
// $inventoryGodown = $_GET['inventoryGodown'];

$insert = "insert into inventory (inven_name, brand, batch_no, quantity, available_stock, holding_stock, breakage_stock) values 
    ('$inventoryName', '$inventoryBrand', '$inventoryBatchNo', '$inventoryQuantity', 
    '$inventoryAvailable', '$inventoryHolding', '$inventoryBreakage')";
$res = mysqli_query($conn, $insert) or die("Error While Inserting");
if ($res) {
    header('Location: dashboard.php');
}
?>
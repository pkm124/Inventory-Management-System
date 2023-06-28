<?php

require_once('conn.php');

// $inventoryId = $_GET['inventoryIdEdit'];
$inventoryName = $_GET['inventoryNameEdit'];
$inventoryBrand = $_GET['inventoryBrandEdit'];
$inventoryBatchNo = $_GET['inventoryBatchNoEdit'];
$inventoryQuantity = $_GET['inventoryQuantityEdit'];
$inventoryAvailable = $_GET['inventoryAvailableEdit'];
$inventoryHolding = $_GET['inventoryHoldingEdit'];
$inventoryBreakage = $_GET['inventoryBreakageEdit'];
// $inventoryGodown = $_GET['inventoryGodownEdit'];


$insert = "update inventory set brand='$inventoryBrand', 
    batch_no='$inventoryBatchNo', quantity='$inventoryQuantity', available_stock='$inventoryAvailable',
    holding_stock='$inventoryHolding', breakage_stock='$inventoryBreakage'
    where inven_name='$inventoryName'";
$res = mysqli_query($conn, $insert) or die("Error While Inserting");
if ($res) {
    header('Location: dashboard.php');
}
?>
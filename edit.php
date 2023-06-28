<?php

require_once('conn.php');

$name = $_GET['name'];

$sql = "SELECT * FROM inventory where inven_name='$name'";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>



<form action="editinven.php" method="GET">
    <div class="card" style="width: 27rem; margin: 1rem 29rem;">
        <div class="card-body">
        <h5 class="card-title"></h5>

<?php
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
?>


<div class="form-group">
    <label for="inventoryNameEdit">Inventory Name</label>
    <input type="text" value="<?php echo $row['inven_name'] ?>" readonly class="form-control" id="inventoryNameEdit" name="inventoryNameEdit" aria-describedby="emailHelp" placeholder="Enter Name">            
</div>

<div class="form-group">
    <label for="inventoryBrandEdit">Brand</label>
    <input type="text" value="<?php echo $row['brand'] ?>" class="form-control" id="inventoryBrandEdit" name="inventoryBrandEdit" aria-describedby="emailHelp" placeholder="Enter Brand">            
</div>
<div class="form-group">
    <label for="inventoryBatchNoEdit">Batch No.</label>
    <input type="text" value="<?php echo $row['batch_no'] ?>" class="form-control" id="inventoryBatchNoEdit" name="inventoryBatchNoEdit" aria-describedby="emailHelp" placeholder="Enter Batch No.">            
</div>
<div class="form-group">
    <label for="inventoryQuantityEdit">Quantity</label>
    <input type="text" value="<?php echo $row['quantity'] ?>" class="form-control" id="inventoryQuantityEdit" name="inventoryQuantityEdit" aria-describedby="emailHelp" placeholder="Enter Quantity">            
</div>
<div class="form-group">
    <label for="inventoryAvailableEdit">Available Stock</label>
    <input type="text" value="<?php echo $row['available_stock'] ?>" class="form-control" id="inventoryAvailableEdit" name="inventoryAvailableEdit" aria-describedby="emailHelp" placeholder="Enter Quantity">            
</div>
<div class="form-group">
    <label for="inventoryHoldingEdit">Holding Stock</label>
    <input type="text" value="<?php echo $row['holding_stock'] ?>" class="form-control" id="inventoryHoldingEdit" name="inventoryHoldingEdit" aria-describedby="emailHelp" placeholder="Enter Quantity">            
</div>
<div class="form-group">
    <label for="inventoryBreakageEdit">Breakage Stock</label>
    <input type="text" value="<?php echo $row['breakage_stock'] ?>" class="form-control" id="inventoryBreakageEdit" name="inventoryBreakageEdit" aria-describedby="emailHelp" placeholder="Enter Quantity">            
</div>




<?php
  }
} else {
  echo "0 results";
}   
?>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
</div>
</form>




</body>
</html>
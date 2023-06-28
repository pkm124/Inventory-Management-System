<?php require_once('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <title>IMS | Dashboard</title>
    
</head>
<body>

<div class="card">
<div class="card-body">
    <div class="card-title">Inventory</div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInventory">Add</button>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="card-title">Category</div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add Category</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGodown">Add Godown</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewCategory">View Category</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewGodown">View Godown</button>
    
    <form action="search_process.php">
    <select name="search_select" class="form-control" id="" style="width: 10rem; height: 35px; margin-left: 50rem; margin-top: -3.4rem;">
      <option value="inven_name">Name</option>
      <option value="brand">Brand</option>
    </select>
    <div class="input-group mb-3" style="width: 35rem; margin-left: 60rem; margin-top: -3.4rem;">
    
    
    
  <input type="text" class="form-control" name="search_bar" placeholder="Search an Inventory" aria-label="" aria-describedby="basic-addon1">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="submit" style="margin-left: 50rem; margin-top: -3.4rem;">Search</button>
  </div>
  </form>
</div>

</div>
</div>

<div class="card">
<div class="card-body">
    <div class="card-title">Access Management</div>
    <form method="post" id="insert_data">   
      <div class="form-group">
        <div class="checkbox">

        <?php
$sql = "SELECT * FROM toggle";
$result = mysqli_query($conn, $sql);
  
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["is_active"] == 1) {
          $a = "checked";
        } 
    else
          $a = "";
    }
} else {
    echo "Access Denied";
}
?>
        <input type="checkbox" name="status" id="status" <?php echo $a ?> />
        </div>
      </div>
      <input type="hidden" name="hidden_status" id="hidden_status" value="1" />
      <br/>
      <input type="submit" name="insert" id="action" class="btn btn-primary" value="Update Access" />
    </form>   
</div>
</div>


<div class="card">
<div class="card-body">
<div class="card-title">Data</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">Inventory Id</th>
      <th scope="col">Category Id</th> -->
      <th scope="col">Inventory Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Inventory Batch No.</th>
      <th scope="col">Quantity</th>
      <th scope="col">Available Stock</th>
      <th scope="col">Holding Stock</th>
      <th scope="col">Breakage Stock</th>
      <!-- <th scope="col">Godown Id</th> -->
      <th scope="col">Created Timestamp</th>
      <th scope="col">Updated Timestamp</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Print Stock</th>
    </tr>
  </thead>
  <tbody>
<?php     
if(!isset($_GET['search_select'])){
  $sql = "SELECT * FROM inventory";
}
elseif($_GET['search_select'] == 'inven_name'){
  $var = $_GET['search_bar'];
  echo $var;
  $sql = "SELECT * FROM inventory where inven_name like '$var%'";
}
else{
  $var = $_GET['search_bar'];
  $sql = "SELECT * FROM inventory where brand like '$var%'";
}
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <th scope="col"><?php echo $row["inven_name"] ?></th>
    <th scope="col"><?php echo $row["brand"] ?></th>
    <th scope="col"><?php echo $row["batch_no"] ?></th>
    <th scope="col"><?php echo $row["quantity"] ?></th>
    <th scope="col"><?php echo $row["available_stock"] ?></th>
    <th scope="col"><?php echo $row["holding_stock"] ?></th>
    <th scope="col"><?php echo $row["breakage_stock"] ?></th>
    <th scope="col"><?php echo $row["created_timestamp"] ?></th>
    <th scope="col"><?php echo $row["updated_timestamp"] ?></th>
    <th scope="col"><a href="edit.php?name=<?php echo $row["inven_name"] ?>" style="color: white;" target="_blank"><button type="button" class="btn btn-primary">Edit</button></a></th>
    <th scope="col"><a href="delinven.php?inventoryNameDel=<?php echo $row["inven_name"] ?>" style="color: white;"><button type="button" class="btn btn-primary">Delete</button></a></th>
    <th scope="col"><a href="print_recipt.php?name=<?php echo $row["inven_name"] ?>" style="color: white;" target="_blank"><button type="button" class="btn btn-primary">Print</button></a></th>
    
    
    
    
</tr>
<?php

  }
} else {
  echo "0 results";
}
?>

    
  </tbody>
</table>


</div>
</div>



<!-- AddInventory Modal -->
<div class="modal fade" id="addInventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="addinven.php" method="GET">
        <div class="form-group">
            <label for="inventoryName">Name</label>
            <input type="text" class="form-control" id="inventoryName" name="inventoryName" aria-describedby="emailHelp" placeholder="Enter Name">            
        </div>
        <div class="form-group">
            <label for="inventoryBrand">Brand</label>
            <input type="text" class="form-control" id="inventoryBrand" name="inventoryBrand" aria-describedby="emailHelp" placeholder="Enter Brand">            
        </div>
        <div class="form-group">
            <label for="inventoryBatchNo">Batch No.</label>
            <input type="text" class="form-control" id="inventoryBatchNo" name="inventoryBatchNo" aria-describedby="emailHelp" placeholder="Enter Batch No.">            
        </div>
        <div class="form-group">
            <label for="inventoryQuantity">Total Quantity</label>
            <input type="text" class="form-control" id="inventoryQuantity" name="inventoryQuantity" aria-describedby="emailHelp" placeholder="Enter Quantity">            
        </div>
        <div class="form-group">
            <label for="inventoryAvailable">Available Stock</label>
            <input type="text" class="form-control" id="inventoryAvailable" name="inventoryAvailable" aria-describedby="emailHelp" placeholder="Enter Available">            
        </div>
        <div class="form-group">
            <label for="inventoryHolding">Holding Stock</label>
            <input type="text" class="form-control" id="inventoryHolding" name="inventoryHolding" aria-describedby="emailHelp" placeholder="Enter Holding">            
        </div>
        <div class="form-group">
            <label for="inventoryBreakage">Breakage Stock</label>
            <input type="text" class="form-control" id="inventoryBreakage" name="inventoryBreakage" aria-describedby="emailHelp" placeholder="Enter Breakage">            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- AddCategory Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_cat.php" method="GET">
        <div class="form-group">
            <label for="catName">Category Name</label>
            <input type="text" class="form-control" id="catName" name="catName" aria-describedby="emailHelp" placeholder="Enter Category Name">            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- AddGoDown Modal -->
<div class="modal fade" id="addGodown" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Godown</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_godown.php" method="GET">
        <div class="form-group">
            <label for="godownName">Godown Name</label>
            <input type="text" class="form-control" id="godownName" name="godownName" aria-describedby="emailHelp" placeholder="Enter Godown Name">            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- ViewCategory Modal -->
<div class="modal fade" id="viewCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Category Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Created Timestamp</th>
      <th scope="col">Updated Timestamp</th>
    </tr>
  </thead>
  <tbody>
<?php    
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <th scope="col"><?php echo $row["cat_id"] ?></th>
    <th scope="col"><?php echo $row["cat_name"] ?></th>
    <th scope="col"><?php echo $row["created_timestamp"] ?></th>
    <th scope="col"><?php echo $row["updated_timestamp"] ?></th>
    
</tr>
<?php

  }
} else {
  echo "0 results";
}
?>

    
  </tbody>
</table>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
      </form>
    </div>
  </div>
</div>


<!-- ViewGoDown Modal -->
<div class="modal fade" id="viewGodown" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Godown</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Godown Id</th>
      <th scope="col">Godown Name</th>
      <th scope="col">Created Timestamp</th>
      <th scope="col">Updated Timestamp</th>
    </tr>
  </thead>
  <tbody>
<?php    
    $sql = "SELECT * FROM godown";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <th scope="col"><?php echo $row["godown_id"] ?></th>
    <th scope="col"><?php echo $row["godown_name"] ?></th>
    <th scope="col"><?php echo $row["created_timestamp"] ?></th>
    <th scope="col"><?php echo $row["updated_timestamp"] ?></th>
    
</tr>
<?php

  }
} else {
  echo "0 results";
}
?>

    
  </tbody>
</table>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
      
    </div>
  </div>
</div>








</body>
</html>



<script>
$(document).ready(function(){
 
 $('#status').bootstrapToggle({
  on: 'Active',
  off: 'Deactive',
  onstyle: 'success',
  offstyle: 'danger'
 });

 $('#status').change(function(){
  if($(this).prop('checked'))
  {
   $('#hidden_status').val('1');
  }
  else
  {
   $('#hidden_status').val('0');
  }
 });

 $('#insert_data').on('submit', function(event){
  event.preventDefault();

 if($('#hidden_status').val() != '')
  {
var hidden_status=$('#hidden_status').val();


   $.ajax({
	   
    url:"toggle.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
		
     if(data == 'done')
     {
      $('#insert_data')[0].reset();
      //$('#status').bootstrapToggle('on');
      alert("Access Updated");
     }
    }
   });
}
 });

});
</script>

<?php require_once('../conn.php'); ?>

<?php
$sql = "SELECT * FROM toggle";
$result = mysqli_query($conn, $sql);
  
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["is_active"] == 1) {
            ?>
            
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
    <title>IMS | Dashboard</title>
    
</head>
<body>

<div class="card">
<div class="card-body">
<div class="card-title">Category</div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewCategory">View Category</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewGodown">View Godown</button>
    
    <form action="search_process.php">
    <select name="search_select" class="form-control" id="" style="width: 10rem; margin-left: 33rem; margin-top: -2.4rem;">
      <option value="inven_name">Name</option>
      <option value="brand">Brand</option>
    </select>
    <div class="input-group mb-3" style="width: 35rem; margin-left: 44rem; margin-top: -2.4rem;">
    
    
    
  <input type="text" class="form-control" name="search_bar" placeholder="Search an Inventory" aria-label="" aria-describedby="basic-addon1">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="submit">Search</button>
  </div>
  </form>
</div>

</div>
</div>

<div class="card">
<div class="card-body">
<div class="card-title">Data</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Inventory Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Inventory Batch No.</th>
      <th scope="col">Quantity</th>
      <th scope="col">Available Stock</th>
      <th scope="col">Holding Stock</th>
      <th scope="col">Breakage Stock</th>
      <th scope="col">Created Timestamp</th>
      <th scope="col">Updated Timestamp</th>
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



<?php
        } 
    else
        echo "Access Denied";    
    }
} else {
    echo "Access Denied";
}
?>
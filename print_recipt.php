<?php

require_once('conn.php');

$name = $_GET['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Print Page</title>
</head>
<body>
    
<form action="recipt_process.php" method="GET">
    <div class="card" style="width: 27rem; margin: 12rem 29rem;">
        <div class="card-body">
        <h5 class="card-title">IMS | Print Page</h5>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter Stock" required>
            <input type="hidden" id="name" name="name" value="<?php echo $name; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>


</body>
</html>
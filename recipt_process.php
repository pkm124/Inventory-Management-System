<?php
ob_end_clean();
require('fpdf/fpdf.php');
require_once('conn.php');



$name = $_GET['name'];
$stock = $_GET['stock'];
$sql = "select * from inventory where inven_name='$name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        if(($row['available_stock']-$stock) > 0){
            $update = "update inventory set available_stock=available_stock-'$stock' where inven_name='$name'";
            $result_update = mysqli_query($conn, $update);
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Cell(0,10, 'Name - '.$row["inven_name"], 0, 1);
            $pdf->Cell(0,10, 'Brand - '.$row["brand"], 0, 1);
            $pdf->Cell(0,10, 'Batch No. - '.$row["batch_no"], 0, 1);
            $pdf->Cell(0,10, 'Quantity - '.$row["quantity"], 0, 1);
            $pdf->Cell(0,10, 'Available Stock - '.$row["available_stock"], 0, 1);
            $pdf->Cell(0,10, 'Holding Stock - '.$row["holding_stock"], 0, 1);
            $pdf->Cell(0,10, 'Breakage Stock - '.$row["breakage_stock"], 0, 1);
            $pdf->Output();
        }
        else{
            header("Location: print_recipt.php");
        }
    }
} else{
    echo "0 results";
}


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
   


</body>
</html>
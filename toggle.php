<?php

require_once('conn.php');

if(isset($_POST["hidden_status"]))
{
	$status = $_POST['hidden_status'];
    $sql = "update toggle set is_active='$status'";

    if ($conn->query($sql) === TRUE) {
        echo 'done';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
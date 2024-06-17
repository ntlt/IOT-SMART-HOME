<?php
// send a JSON message to website 
header('Content-Type: application/json');

// ket noi database
include("config.php");
// doc du lieu tu database
$sql = "select * from accounts";
$result = mysqli_query($con,$sql);
// gui du lieu len website
$data = array();
foreach ($result as $row){
    $data[]=$row;
}
mysqli_close($con);

echo json_encode($data);
?>
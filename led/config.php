<?php
// Connect to database
$server = "localhost";
$user = "root"; 
$pass = "new_password";
$dbname = "led";

$conn = mysqli_connect($server,$user,$pass,$dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
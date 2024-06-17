<?php
// doc du lieu tu website gui ve
$acc = $_POST["user"];
$pass = $_POST["pass"];

// ket noi database
include("config.php");

// gui data xuong database
$sql = "insert into accounts (user,pass) values ('$acc','$pass')";
mysqli_query($con, $sql);

// ngat ket noi voi database
mysqli_close($con);
?>
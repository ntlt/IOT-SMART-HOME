<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "new_password";
$dbname = "users";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

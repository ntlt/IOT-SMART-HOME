<?php

$c = new mysqli("localhost", "root", "new_password", "temp");

$r = $c->query("SELECT * FROM temp limit 1");

while($d= $r->fetch_assoc()) 
{ 
	echo 'Temperature: '.$d['temperature'].'<br>';
	echo 'Humidity: '.$d['humidity'].'<br>';
	echo $d['con'].'<br>';

}
//include('charttemp.php');
include('charthumi.php');

//$conn->close();
?>

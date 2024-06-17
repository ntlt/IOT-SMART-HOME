<?php

$c = new mysqli("localhost", "root", "new_password", "temp");

$r = $c->query("SELECT * FROM moist ORDER BY id DESC limit 1");

while($d= $r->fetch_assoc()) 
{ 
	echo 'Moisture: '.$d['mois'].'<br>';
	echo 'Level: '.$d['level'].'<br>';

}
//include('charttemp.php');
//include('charthumi.php');

//$conn->close();
?>
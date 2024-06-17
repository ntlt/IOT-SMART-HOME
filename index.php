<?php 
session_start();

	include("config.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
</head>
<body>

	<div class="meo">
	    <a href="logout.php" style="color:beige">Sign Out</a>
    </div>

	<div id='greets'>
	Hello,  <?php echo $user_data['user']; ?>
	</div>

	<div class="title">
               <h1>SMART HOME</h1>
          </div>
               
          <div class="row">
               <div class="col-md-3">
                    <div class="icon">
                         <i class="fa fa-gear"></i>
                    </div>
               
                    <h3>
                         <a href="led/indexled.php"> Light Control </a>
                    </h3>
                         
                    <p>In the Light Control mode, hosts are able to turning on and off the light 
						by the means of GPIO pin activation.
                    </p>

               </div>

               <div class="col-md-3">
                    <div class="icon">
                         <i class="fa fa-wrench"></i>
                    </div>

                    <h3> <a href="DHT11/templates/view.php"> Temperature & Humidity</a></h3>

                    <p>Temperature and Humidity view mode allows users to spectate the condition of
                         house environment based on the data claimed by the DHT11 sensor.
                    </p>
               </div>
                    
               <div class="col-md-3">
                    <div class="icon">
                         <i class="fa fa-eye"></i>
                    </div>

                    <h3> <a href="moi.php">Soil Moisture</a> </h3>

                    <p>The final section allows users to spectate or supervise the entire system operation
                    including the current light signal and countdown seconds based on real time.
                    </p>
               </div>

          </div>
          


</body>
</html>


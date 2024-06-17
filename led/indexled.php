<?php
    // Connect to Database
    include("config.php");

    $sql = "select * from led";
    $result = mysqli_query($conn, $sql);


    // kết nối database

    $Off = $_GET['Off'];
    $On = $_GET['On'];

    $sql = "insert into led (led,value) values ('$Off','0')";
    
    $sql1 = "insert into led (led,value) values ('$On','1')";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql1);


mysqli_close($conn);
?>
<html>
<head>
    <meta name="viewport" content="width=device-width"/>
    <title>LIGHT CONTROL</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>
    <center><h1>Light Control</h1>
    <form method="get" action="indexled.php">
        <input type="submit" style="font-size: 14 pt" value="OFF" name="Off">
        <input type="submit" style="font-size: 14 pt" value="ON" name="On">
        <input type="submit" style="font-size: 14 pt" value="Timeline" name="Ana">

    </form>
    <div class="meo">
	    <a href="chartled.php" style="color:beige">Statistical Analysis</a>
    </div>
    </center>
<?php
system("gpio -g mode 14 out");
if(isset($_GET['Off']))
{
    echo "LED is off";
    system("gpio -g write 14 0");
}
else if(isset($_GET['On']))
{
    echo "LED is on";
    system("gpio -g write 14 1");
}
if(isset($_GET['Ana']))
{
    include("chartled.php");
}

?>
</body>
</html>

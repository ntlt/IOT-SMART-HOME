<?php 

session_start();
ob_start();

	include("config.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if(!empty($user) && !empty($pass) && !is_numeric($user))
		{

			//read from database
			$query = "select * from accounts where user = '$user' ";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass'] === $pass)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
					}
				}
			}
			
			echo "Incorrect username or password.";
		}else
		{
			echo "Incorrect username or password.";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="login_style.css">

</head>
<body>

	<style type="text/css">

	</style>

	<div id="rcorners1">
		
		<form method="post">
			<h1>SIGN IN</h1>
			<div id=content>
				<div id='note'>Username</div>
				<input id="text" type="text" name="user" placeholder="Enter your username"><br><br>
				<div id='note'>Password</div>
				<input id="text" type="password" name="pass" placeholder="Enter your password"><br><br>
			</div>
			<input id="button" type="submit" value="Login"><br><br>

			<p id= 'signup'>Not a member? <a href="register.php">Sign up now.</a></p>
		</form>
	</div>
</body>
</html>
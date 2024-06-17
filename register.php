<?php
// Include config file
include("config.php");
include("functions.php");
// Define variables and initialize with empty values
$user = $pass = $confirm_pass = "";
$user_err = $pass_err = $confirm_pass_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user
    if(empty(trim($_POST["user"]))){
        $user_err = "Please enter a user.";
    } else{
        $temp_user = trim($_POST["user"]);
        $sql = "SELECT id FROM accounts WHERE user = '$temp_user'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $user_err = "This user is already taken.";
        }else{
            $user = trim($_POST["user"]);
        }
    }
    
    // Validate pass
    if(empty(trim($_POST["pass"]))){
        $pass_err = "Please enter  password.";     
    } elseif(strlen(trim($_POST["pass"])) < 6){
        $pass_err = "Password must have at least 6 characters.";
    } else{
        $pass = trim($_POST["pass"]);
    }
    
    // Validate confirm pass
    if(empty(trim($_POST["confirm_pass"]))){
        $confirm_pass_err = "Please confirm password.";     
    } else{
        $confirm_pass = trim($_POST["confirm_pass"]);
        if(empty($pass_err) && ($pass != $confirm_pass)){
            $confirm_pass_err = "Password not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($user_err) && empty($pass_err) && empty($confirm_pass_err)){
        // Create SQL command
        $user_id = random_num(20);
        $sql = "insert into accounts(user_id,user,pass) values ('$user_id','$user','$pass')";
        mysqli_query($con, $sql);

        // disconnect from database
        mysqli_close($con);    
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="untitled.css">
    <link rel="stylesheet" href="register_style.css">

    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; height: 650px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="user" class="form-control <?php echo (!empty($user_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $user; ?>"placeholder="Enter your username">
                <span class="invalid-feedback"><?php echo $user_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control <?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pass; ?>"placeholder="Enter your password">
                <span class="invalid-feedback"><?php echo $pass_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_pass" class="form-control <?php echo (!empty($confirm_pass_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_pass; ?>"placeholder="Re-enter the password">
                <span class="invalid-feedback"><?php echo $confirm_pass_err; ?></span>
            </div>
            <div class="form-group" id='button'>
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>

<?php
//include database connection
include "connect.php";


///login
if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$loginpassword = md5($password);
	
	// error handling conditional checks go here
	if((!$email) || (!$password)){ 
		$errorMsg = '<div class="alert alert-danger">
						<strong>Error!</strong> All the fields are required.
					</div>';
	}

	
	//if everything is ok, send info into databse
	else{		
		// Error handling is complete so process the info if no errors
		$login_sql = "SELECT user_id FROM users WHERE user_email='$email' AND user_password='$loginpassword'";
		//Executing the sql query with the connection
		$result=mysqli_query($conn,$login_sql);
		$login_check1 = mysqli_num_rows($result);
		
		//If username and password exist in our database then create a session.
		//Otherwise echo error.
		
		if($login_check1 == 1){
			
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				// Initializing Session
				$loginID = $row["user_id"];
				$_SESSION['user'] = $loginID;
			}
			
			// Redirecting To Other Page
			header("location:account.php");
			exit();
		}
		
		else{
				$errorMsg = '<div class="alert alert-danger">
							<strong>Error !</strong> Invalid Email OR Password
						</div>';
			}
	}

}
else{
	$errorMsg ="";
	$email="";
	$password="";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="css/main.css">
    <title>Login System</title>
</head>
<body>
    <div id="logreg-forms">
        <form method="POST" action="" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Welcome to our Site<br>Please Sign in</h1>
			<?php 
				print "$errorMsg";
				
				if (isset($_GET['register'])){
					echo '<div class="alert alert-success">Register Successfully, Please Login</div>';
				}
			?>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" autofocus="">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
            
            <button class="btn btn-success btn-block" name="login" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <a class="btn btn-primary btn-block" href="register.php"><i class="fas fa-user-plus"></i> Sign up New Account</a>
		</form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>
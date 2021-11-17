<?php
//include database connection
include "connect.php";

///login
if (isset($_POST['register'])) {
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$city=$_POST['city'];
	$password=$_POST['password'];
	
	// Database duplicate e-mail check setup for use below in the error handling if else conditionals
    $sql_email_check = mysqli_query($conn,"SELECT user_email FROM users WHERE user_email='$email' LIMIT 1");
    $email_check = mysqli_num_rows($sql_email_check);
	
	// error handling conditional checks go here
	if ((!$full_name) || (!$email) || (!$phone) || (!$address) || (!$country) || (!$city) || (!$password)){
		
		$errorMsg = '<div class="alert alert-danger">
						<strong>Error!</strong> Please fill all required fields.
					</div>';
	}
	else if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email']))){ 
        $errorMsg = '<div class="alert alert-danger">
		<strong>Error!</strong> Invalid Character For Email</div>'; 
    }
	else if ($email_check > 0){ 
        $errorMsg = '<div class="alert alert-danger">
		<strong>Error!</strong> The email address is already in use inside of our system. Please use another.</div>'; 
    }

	
	//if everything is ok, send info into databse
	else{		
	 
		$db_password = md5($password);
		
		$register_sql = mysqli_query($conn,"INSERT INTO users (user_name, user_email, user_phone, user_address, user_country,
		 	user_city, user_password)
		VALUES ('$full_name', '$email','$phone', '$address', '$country', '$city', '$db_password')") or die (mysqli_error($conn));
		
		header("location: login.php?register=true");
		exit();
	}

}
else{
	$errorMsg ="";
	$full_name="";
	$email="";
	$phone="";
	$address="";
	$country="";
	$city="";
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
        <form action="" method="POST" class="form-register">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">New Member..!<br>Register</h1>
			<?php 
				print "$errorMsg";
			?>
            <input type="text" class="form-control" placeholder="Full name" name="full_name" value="<?php echo $full_name;?>">
			
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?php echo $email;?>">
			
            <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $phone;?>">
			
            <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $address;?>">
			
			<input type="text" class="form-control" placeholder="Country" name="country" value="<?php echo $country;?>">
			
			<select id="inputState" name="city" class="form-control">
			  <option selected>Select City</option>
			  <option>City 01</option>
			  <option>City 02</option>
			</select>

			
			
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" >
            
            <button class="btn btn-success btn-block" name="register" type="submit"><i class="fas fa-user-plus"></i> Register</button>
            <hr>
            <!-- <p>have an account!</p>  -->
            <a class="btn btn-primary btn-block" href="login.php"><i class="fas fa-sign-in-alt"></i> Have an account, Sign in</a>
		</form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>
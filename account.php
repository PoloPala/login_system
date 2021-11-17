<?php
include "connect.php";
if(isset($_SESSION['user']) && $_SESSION['user'] != ""){
    $user = $_SESSION['user'];
	 
	$sql = "SELECT * FROM users WHERE user_id ='$user'";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){
		$name = $row["user_name"];
		$email = $row["user_email"];
		$phone = $row["user_phone"];
		$country = $row["user_country"];
		$city = $row["user_city"];
		$address = $row["user_address"];
	}
}

else{
		header("location:index.php");
		exit();
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
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Congratulations...!!! <?php echo "$name"; ?>, you made this far</h1>
			<p class="h3 mx-3">Profile Details</p>
			<p class="mx-3">Name:  <?php echo "$name"; ?></p>
			<p class="mx-3">Email:  <?php echo "$email"; ?></p>
			<p class="mx-3">Phone:  <?php echo "$phone"; ?></p>
			<p class="mx-3">Address:  <?php echo "$address"; ?></p>
			<p class="mx-3">Country:  <?php echo "$country"; ?></p>
			<p class="mx-3">City:  <?php echo "$city"; ?></p>
			
			<a href="logout.php" id="forgot_pswd">->Logout</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>
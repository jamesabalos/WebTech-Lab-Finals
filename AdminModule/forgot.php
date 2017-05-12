<?php
require 'ConnectDB.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <link rel="stylesheet" href="form.css" type="text/css">
  <meta charset="UTF-8">

</head>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if( isset($_POST['resetPassword']) ){
			$email = $_POST['email'];
			$queryResult = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

			 $checkEmailDuplicate = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

			 if($checkEmailDuplicate->num_rows > "0"){


					if( $_POST['newPassword'] == $_POST['confirmNewPassword'] ){
						$userNewPassword =  md5($_POST['newPassword']);

						if( mysqli_query($con,"UPDATE users SET password='$userNewPassword' WHERE email='$email'") ){
							$_SESSION['message'] = "Your password has been reset successfully!";
							header("location: success.php");
						}else{
							$_SESSION['message'] = "Could not connect to database!";
							header("location: error.php");
						}

						
					}else{
						$_SESSION['message'] = "Password does not match!";
						header("location: error.php");
					}
			 }else{
			 	$_SESSION['message'] = 'User with this email does not exist!';
			 	header("location: error.php");
			 }


		}
  	}
?>

<body>



	<div class="body-content">
	   <div class="body-content-module">
		<div class="errorDetails">
			<h1 class="errorDetailsHeading">Reset Password</h1>
			<form action="forgot.php" method="POST" enctype="multipart/form-data" autocomplete="off">
				<input type="email" name="email" placeholder="Enter your email" required />
				<!-- <a href="index.php"><button class="btn btn-primary">Confirm</button></a> -->
				<input type="text" name="newPassword" placeholder="New Password" required />
				<input type="text" name="confirmNewPassword" placeholder="Confirm New Password" required />
				<input type="submit" value="RESET" name="resetPassword" class="btn btn-block btn-primary" />
			</form>
		</div>
	  </div>
	</div>



</body>
</html>
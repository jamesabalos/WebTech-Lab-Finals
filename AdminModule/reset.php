<?php
require 'ConnectDB.php';
session_start();

	if( isset($_SESSION['userEmail']) ){
		$email = $_SESSION['userEmail'];
		$query = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

		if( $query->num_rows == "0" ){ //no email found
			$_SESSION['message'] = "User with this $email does not exists!";
			header("location: error.php");
		}else{
			$newPassword = $_POST[]


			$_SESSION['messagae'] = "Your password has been reset successfully!";
			header("location:success.php");
		}
	
	}else{
		$_SESSION['message'] = "You must enter email address!";
		header("location:error.php");
	}


?>
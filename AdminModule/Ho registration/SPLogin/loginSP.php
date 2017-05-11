<?php
require ('../ConnectDB.php');
session_start();

if( !isset($_POST['email']) ){
	$_SESSION['message'] = "You need to log in first!";
	header("location: error.php");
}



$email = $_POST['email'];
$checkEmailResult = mysqli_query($con,"SELECT * FROM service_provider WHERE email='$email'");
$result = $checkEmailResult->fetch_assoc();
$hash_password = $result['password'];
 $user_has_password = md5($_POST['password']);
// print_r($result);
// echo $checkEmailResult->num_rows;
// die;
 	// if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['password']) && !empty($_GET['password'])){
		
		if( $checkEmailResult->num_rows < "1" ){ //user does not have an account yet
			$_SESSION['message'] = "The account $email has not been found in our database!.";
			header("location: ../error.php");

		}else{ //user exists
			//$array = $checkEmailResult->fetch_assoc();
			//password_verify($_POST['password'],$array['password'])
			if( $user_has_password == $hash_password ){  //verfiy password

				$_SESSION['last_name'] = $result['last_name'];
				$_SESSION['first_name'] = $result['first_name'];
				$_SESSION['email'] = $result['email'];
				$_SESSION['logged_in'] = true;

				header("location: profileSP.php");
			}else{
				$_SESSION['message'] = "You have entered wrong password, try again.";
				header("location: ../error.php"); 
			}

		}

	// }else{
	// 	$_SESSION['message'] = "Something is error!";
	// 	header("location: error.php");
	// }



?>
<?php
    require ('../ConnectDB.php');

session_start();

if( !isset($_SESSION['email']) ){
	$_SESSION['message'] = "You need to log in first!";
	header("location: ../error.php");
}



$email = $_POST['email'];
$checkEmailResult = mysqli_query($con,"SELECT * FROM home_owner WHERE email='$email'");
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
			//check account if activated or not yet activated
			$checkRequestStatus = mysqli_query($con,"SELECT * FROM home_owner WHERE email='$email' and req_status = 'Accepted' ");
			if( $checkRequestStatus->num_rows < "1" ){ 
				$_SESSION['message'] = "Your account $email has not yet activated!.";
				header("location: ../error.php");

			}else{

				//$array = $checkEmailResult->fetch_assoc();
				//password_verify($_POST['password'],$array['password'])
				if( $user_has_password == $hash_password ){  //verfiy password

					$_SESSION['last_name'] = $result['last_name'];
					$_SESSION['first_name'] = $result['first_name'];
					$_SESSION['email'] = $result['email'];
					$email = $_SESSION['email'];
					echo($email);

					header("location: ../profile.php?email=$email");
				}else{
					$_SESSION['message'] = "You have entered wrong password, try again.";
					header("location: ../error.php"); 
				}
			}



		}

	// }else{
	// 	$_SESSION['message'] = "Something is error!";
	// 	header("location: error.php");
	// }

mysqli_close($con);

?>
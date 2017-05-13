<?php

// require_once("../ConnectDB.php");


	$_SESSION['last_name'] = $_POST['last_name'];
	$_SESSION['first_name'] = $_POST['first_name'];
	$_SESSION['email'] = $_POST['email'];
	
 $lname = ($_POST['last_name']);
 $fname = ($_POST['first_name']);
 $email = ($_POST['email']);
 $password = md5($_POST['password']);
 $bdate = ($_POST['birthdate']);
 $address = ($_POST['address']);
 $gender = $_POST['gender'];
 $cp = ($_POST['cpno']);
 $tel = ($_POST['tel']);
 																					 // or die(mysqli_error())	
 $checkEmailDuplicate = mysqli_query($con,"SELECT * FROM home_owner WHERE email='$email'");

 if($checkEmailDuplicate->num_rows > "0"){
 	$_SESSION['message'] = 'User with this email already exist!';
 	header("location: ../error.php");

 }else{
	$sql =  "INSERT INTO `home_owner` (last_name,first_name,password, email, birthdate, address,gender,cp_no,tel_no)
          VALUES  ('$lname','$fname','$password','$email','$bdate','$address','$gender','$cp','$tel')";
 	
	if(mysqli_query($con, $sql)){
	  //echo "successful";
	  $_SESSION['message'] = "The account $email have successfully registered.";
	  header('Location: ../success.php');

	// header('Location: index.html');
	}
	else{
	 $_SESSION['message'] = "ERROR: Could not connect to database". mysqli_error($con);
	 header('Location: ../error.php');
	}

 }



mysqli_close($con);
?>
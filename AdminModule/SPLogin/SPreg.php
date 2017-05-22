<?php
    session_start();
require_once("../ConnectDB.php");
 

	// $_SESSION['last_name'] = $_POST['last_name'];
	// $_SESSION['first_name'] = $_POST['first_name'];
	// $_SESSION['email'] = $_POST['email'];
	
 $lname = ($_POST['last_name']);
 $fname = ($_POST['first_name']);
 $cname = ($_POST['company_name']);
 $password = md5($_POST['password']);
 $email = ($_POST['email']);
 $bdate = ($_POST['birthdate']);
 $gender = $_POST['gender'];
 $address = ($_POST['address']);
 $cp = ($_POST['cpno']);
 $tel = ($_POST['tel']);
 																					 // or die(mysqli_error())	
 $checkEmailDuplicate = mysqli_query($con,"SELECT * FROM service_provider WHERE email='$email'");

 if($checkEmailDuplicate->num_rows > "0"){
 	$_SESSION['message'] = 'User with this email already exist!';
 	header("location: ../error.php");

 }else{
	$sql =  "INSERT INTO `service_provider` (last_name,first_name,company_name,password,email, birthdate, gender, address,cp_no,tel_no)
          VALUES  ('$lname','$fname','$cname','$password','$email','$bdate','$gender','$address','$cp','$tel')";
 	
	if(mysqli_query($con, $sql)){
	  //echo "successful";
	  $_SESSION['message'] = "The account $email have successfully registered.";
	  header('Location: ../success.php');


	// header('Location: index.html');
	}
	else{
	 $_SESSION['message'] = "ERROR: Could not connect to database". mysqli_error($con);
	 session_unset();
	 session_destroy();
	 header('location: ../error.php');
	}

 }



mysqli_close($con);
?>
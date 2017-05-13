<?php
require 'ConnectDB.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>RESET PASSWORD</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./public/images/home.png">

    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="./public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

    <body>

    <!-- Navigation-->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="/"><img class="logo" src="./public/images/Logo1.png"/></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav">
              <li><a href="index.html">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-sign-in"></span> LOGIN </a>
                <ul class="dropdown-menu">
                    <li><button class="btn btn btn-secondary btn-sm btn-block" type="button" data-toggle="modal" data-target="#HOlogin">Customer Login</button></li>
                    <li><button class="btn btn btn-secondary btn-sm btn-block" type="button" data-toggle="modal" data-target="#SPlogin">Service Provider Login</button></li>
                </ul>
              </li>

              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-user"></span>  REGISTER</a>
                <ul class="dropdown-menu">
                    <li><button class="btn btn btn-secondary btn-sm btn-block" type="button" data-toggle="modal" data-target="#HORegistration">Customer Signup</button></li>
                    <li><button class="btn btn btn-secondary btn-sm btn-block" type="button" data-toggle="modal" data-target="index.html#SPRegistration">Service Provider Signup</button></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>

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
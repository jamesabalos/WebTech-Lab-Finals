<?php

	session_start();
	if(!isset($_SESSION['email'])) {
	  // print_r($_SESSION);
		$_SESSION['message'] = "You must login first!";
		header("location: error.php");
	}
	// }else{
	//    // echo ('ERROR! must be redirected!-_-');

	// }
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Service</title>

  <link rel="stylesheet" href="public/css/profile.css" type="text/css">

</head>
<body>
	<div>
     <!-- <form class="form" action="index.php" method="POST" enctype="multipart/form-data" autocomplete="off"> -->

		<!-- <form action="logout.php" method="POST"> -->
        	<!-- <button type="button" class="btn btn-default btn-sm">Log out</button> -->
        	<!-- <input type="submit" value="Log out" name="logout"> -->
        <!-- </form> -->
    </div>

		<ul class="profile-wrapper">
		 <li>
		  <!-- user profile -->
		  <div class="profile">
		   <!-- <img src="https://secure.gravatar.com/avatar/2f05a5d3273d54e90f1ad6dca5eb97bc?s=47" /> -->
		   <a href="#" class="name"><?php echo($_SESSION['first_name']) ?></a>

		   	<!-- more menu -->
			   <ul class="menu">
				    <li><a href="#">Edit</a></li>


				    <li><form action="forgot.php" method="POST"><input type="submit" value="Change password" name="Change password"></form></li>


				    <li> <form action="logout.php" method="POST"><input type="submit" value="Log out" name="logout"></form></li>


			   </ul>
		  </div>
		 </li>
		</ul>

	<h1>Welcome
		<?php
			echo ($_SESSION['last_name'] . $_SESSION['first_name']);
		?>
		!
	</h1>




</body>
</html>
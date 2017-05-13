<?php
session_start();
?>

<html>
<head>
	<title>Error</title>
	  <link rel="stylesheet" href="css/form.css">
	  <link rel="stylesheet" href="bootsrap.css">

</head>

<body>
<!-- 	<div class="alert alert-danger">
 		 <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
		</div> -->

 <div class="body-content">
   <div class="body-content-module">
	<div class="errorDetails">
		<h1 class="errorDetailsHeading">Error!</h1>
		<p >
			<?php
				if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
					echo $_SESSION['message'];
				else:
					header("location: index.html");
				endif;
			?>
		</p>
		<a href="index.html"><button class="btn btn-primary">HOME</button></a>


	</div>
  </div>
</div>



</body>
</html>
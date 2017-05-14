<?php
session_start();
?>

<html>
<head>
	<title>Error</title>
	<link rel="icon" href="./public/images/home.png">
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="./public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">

</head>

<body>
<!-- 	<div class="alert alert-danger">
 		 <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
		</div> -->

<div class="container text-center">
	<div class="row">
		<div class="col-sm-12">

			<img class="errorImg" src="public/images/error.png">

			<h1 class="errorDetailsHeading">Error!</h1>
			<p>
				<?php
				if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
					echo $_SESSION['message'];
				else:
					header("location: index.html");
				endif;
				?>
			</p>

			<a href="index.html">
			<button class="btn btn-warning">GO BACK</button>
			</a>
		</div>
	</div>
</div>

</body>
</html>
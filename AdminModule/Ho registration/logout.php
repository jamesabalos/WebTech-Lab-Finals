<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
	  <link rel="stylesheet" href="bootsrap.css">
	  <link rel="stylesheet" href="form.css">

</head>

<body>

   <div class="body-content">
 	  <div class="body-content-module">
  		<div class="logout_module">
          <h1>Thank You!</h1>
              
          <p>You have successfully log out</p>
          
          <a href="index.html"><button class="btn btn-primary">HOME</button></a>

   		 </div>
   	  </div>
   </div>



    <?php
		session_unset();
		session_destroy(); 
    ?>

</body>
</html>
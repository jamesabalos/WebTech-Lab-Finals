<?php
  
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Service Provider Login</title>
  <link rel="stylesheet" href="../form.css" type="text/css">
  <meta charset="UTF-8">

</head>

<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( isset($_POST['loginSP']) ){

      require 'loginSP.php';  ////SP wants to login
  
    }

  }

?>

<body>


<div class="body-content">
 <div class="body-content-module">
  <div class="module">

        <div class="login" id="login">
          <h1>Welcome Service!</h1>
          <form class="form" action="loginPageSP.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"></div>
            <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Password" name="password" required />
            <p><a href="forgot.php">Forgot Password</a></p>
            <input type="submit" value="Login" name="loginSP" class="btn btn-block btn-primary" />
          </form>
        </div>

  </div>
 </div>
</div>

</body>
<script src="main.js"></script>
</html>
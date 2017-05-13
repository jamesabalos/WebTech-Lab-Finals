<?php
    require '../ConnectDB.php';
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>SP Registration</title>
  <link rel="stylesheet" href="../css/form.css" type="text/css">
  <meta charset="UTF-8">

</head>

<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( isset($_POST['register']) ){
 
      require 'SPreg.php';  //user wants to register


    }

  }

?>

<body>


<div class="body-content">
 <div class="body-content-module">
  <div class="module">
        
        <div class="registration" id="registration">
          <h1>Sign Up for Service Provider</h1>
          <form class="form" action="registrationSP.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"></div>
            <input type="text" placeholder="Last Name" name="last_name" required />
            <input type="text" placeholder="First Name" name="first_name" required />
            <input type="text" placeholder="Company Name" name="company_name" required />
             <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Password" name="password" required />
           
            <input type="text" placeholder="birthdate" name="birthdate" required />
            <input type="text" placeholder="address" name="address" required />
            
            <input type="text" placeholder="cp NO." name="cpno" required />
            <input type="text" placeholder="tel no" name="tel" />
            <input type="radio" name="gender" value="m" required/> Male<span></span>
            <input type="radio" name="gender" value="f" required/> Female
            <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
          </form>
        </div>

       

  </div>
 </div>
</div>

</body>
<script src="main.js"></script>
</html>
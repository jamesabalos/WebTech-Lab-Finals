


<!DOCTYPE html>
<html>
<head>
  <title>Log-in Page</title>
  <link rel="stylesheet" href="form.css" type="text/css">
  <meta charset="UTF-8">
</head>


<body>
          <h1>Welcome!</h1>
          <form class="form" action="login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"></div>
            <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Password" name="password" required />
            <p><a href="forgot.php">Forgot Password</a></p>
            <input type="submit" value="Login" name="login" class="btn btn-block btn-primary" />
          </form>


</body>

</html>
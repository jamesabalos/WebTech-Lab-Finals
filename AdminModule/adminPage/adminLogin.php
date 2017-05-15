<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrator | Home</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./public/images/home.png">

    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>


<body>

<!-- Navigation-->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="adminLogin.php"><img class="logo" src="../public/images/LogoAdmin.png"/></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">

           

            <ul class="nav navbar-nav navbar-right">

            	<li><a href="" type="button" data-toggle="modal" data-target="#AdminLogin"><span class="fa fa-sign-in"></span>	LOGIN</a></li>

            	<li><a href=""><span class="fa fa-sign-out"></span>	LOGOUT</a></li>

            </ul>
          </div>
        </div>
      </nav>

    <div id="AdminLogin" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal">×</button>
              <h4 class="modal-title">Welcome Administrator!</h4>
            </div>
            <div class="modal-body">
              <form class="form" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input class="form-control" type="email" placeholder="Email" name="email" required/>
                <p class="break"></p>
                <input class="form-control" type="password" placeholder="Password" name="password" required/>
                <p class="break"></p>
                <input type="submit" value="Login" name="loginHO" class="btn btn-block btn-primary" />
              </form>
            </div>
          </div>
        </div>
      </div>

	<div class="carousel slide" id="myCarousel" data-ride="carousel">
	      <!-- Wrapper for slides-->
	      <div class="carousel-inner" role="listbox">
	        <div class="item active"><img src="../public/images/Carousel1.jpg" alt="Image"/></div>
	        <div class="item"><img src="../public/images/Carousel2.jpg" alt="Image"/></div>
	        <div class="item"><img src="../public/images/Carousel3.jpg" alt="Image"/></div>
	        <div class="item"><img src="../public/images/Carousel4.jpg" alt="Image"/></div>
	      </div>
	      <!-- Left and right controls--><a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
	    </div>

	    <div class="container">
	      <div class="row">
	        <h1 class="text-center headingHome">ABOUT US</h1>
	        <div class="col-sm-9">
	          <p class="headingParagraph">RenderIt is a company that provides the best Home Services thru the Web. The process and the transactions are done online. Every process are seen online. Just create and/or register your free Account with us and you can use that to request Services. Just Find a Service Provider that suits your Requested Home Service and we'll do the rest.</p>
	        </div>
	        <div class="col-sm-3">
	          <img class="img-responsive" src="../public/images/House.png">
	        </div>
	      </div>
	</div>




	<footer class="footer-distributed">
	        <div class="footer-left">
	        <img class="logo" src="../public/images/LogoAdmin.png">
	        <p class="footer-company-name">RenderIt © 2017</p>
	        </div>

	        <div class="footer-center">
	        <div>   
	            <i class="fa fa-map-marker"></i>
	            <p>Baguio, Philippines</p>
	        </div>
	        <div>
	            <i class="fa fa-phone"></i>
	            <p>+63 925 369 5283</p>
	        </div>
	        <div>
	            <i class="fa fa-envelope"></i>
	            <p><a href="mailto:support@renderit.com">support@renderit.com</a></p>
	        </div>
	        </div>

	        <div class="footer-right">
	            <p class="footer-company-about"><span>About RenderIt!</span>          
	            RenderIt is a company that provides the best Home Services thru the Web. The process and the transactions are done online. Just Find a Service Provider that suits your Requested Home Service and we'll do the rest.</p>
	        </div>
	    </footer>

</body>
</html>
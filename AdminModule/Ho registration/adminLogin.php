
<html>
<head>
    <link href="../index.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
       <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>



<body>
	 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">ADMINISTRATOR</a>
        </div>
        
	        <div>
		        <ul class="nav navbar-nav">
		 

				    <li class="dropdown">
				        <!-- loginPage.php!-->
				        <a  class="dropdown-toggle" data-toggle="dropdown">HOME OWNER REQUEST</a>

				    </li>

				    <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">SERVICE PROVIDER REQUEST</a>

				    </li>

				    <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">HOME OWNER</a>

				    </li>

				    <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">SERVICE PROVIDER </a>

				    </li>


		   		 </ul>
	    	</div>
        </div>



        
    </nav>



          <?php
          require ('ConnectDB.php');
 
			// $checkEmailResult = mysqli_query($con,"SELECT * FROM service_provider WHERE email='$email'");
			// $result = $checkEmailResult->fetch_assoc();



			$sql = mysqli_query($con,"SELECT first_name, last_name FROM home_owner");
			$result = $sql->fetch_assoc();

			if ($sql->num_rows > "0") {
			    // output data of each row
			   		 while( $row = mysqli_fetch_assoc($sql) ){
				        $first_name = $row['first_name'];
				        $last_name = $row['last_name'];

				        echo $first_name . " " . $last_name  ."<br>";
				    }

			} else {
			    echo "0 results";
			}
			
			exit();
			?>
















</body>
</html>
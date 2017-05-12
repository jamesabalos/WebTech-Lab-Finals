
<html>
<head>
    <link href="index.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
       <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>



<body>
	 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        
        <div class="navbar-header">
            <a href="adminLogin.php" style="color:red" class="navbar-brand">ADMINISTRATOR</a>
        </div>
        
	        <div>
		        <ul class="nav navbar-nav">
		 

				    <li class="dropdown">
				        <!-- loginPage.php!-->
				        <a href="ho_requests.php" class="dropdown-toggle" >HOME OWNER REQUEST</a>

				    </li>

				    <li class="dropdown"> 
				    	<a href="homeowner.php" class="dropdown-toggle" >HOME OWNER</a>

				    </li>

				    <li class="dropdown">
				        <a href="sp_requests.php" class="dropdown-toggle" >SERVICE PROVIDER REQUEST</a>
				       

				    </li>

				    <li class="active">
				        <a href="serviceprovider.php" class="dropdown-toggle" >SERVICE PROVIDER </a>

				    </li>


		   		 </ul>
	    	</div>
        </div>

    </nav>

 <?php
          require ('ConnectDB.php');
			$sql = mysqli_query($con,"SELECT * FROM service_provider");
				// echo($sql->num_rows);
			// print_r(mysqli_fetch_assoc($sql)['first_name']);
		if ($sql->num_rows > "0") {
			    // output data of each row
			 echo "<table border='3' class='rwd-table'>";
					   			echo"<tr>
									<th>Last Name</th>
					                <th>First Name</th>
					                <th>Company Name</th>
					                <th>Password</th>
									<th>Email</th>
									<th>Birthdate</th>
									<th>Address</th>
									<th>Gender</th>
									<th>Cellphone Number</th>
									<th>Telephone Number</th>
									<th>ACTION</th>

								</tr>";
			   	 while( $rows = mysqli_fetch_assoc($sql) ){
				        $first_name = $rows['first_name'];
				        $last_name = $rows['last_name'];
				        $company_name = $rows['company_name'];
				        $email = $rows['email'];
				        $password = $rows['password'];
				        $birthdate = $rows['birthdate'];
				        $address = $rows['address'];
				        $gender = $rows['gender'];
				        $cp_no = $rows['cp_no'];
				        $tel_no = $rows['tel_no'];
				    //     echo $first_name . " " . $last_name  ."<br>";
			   		 	
					   $row = $sql->num_rows; //Dynamic number for rows
					   $col = 12; // Dynamic number for columns
					   
					     echo "<tr>
							       	<td>$first_name</td>
					        		<td>$last_name</td>
					        		<td>$company_name</td>
					        		<td>$password</td>
					        		<td>$email</td>
					        		<td>$birthdate</td>
					        		<td>$address</td>
					        		<td>$gender</td>
					        		<td>$cp_no</td>
					        		<td>$tel_no</td>

					        	</tr>";
					      // }
					    
					  // }

				}
		  	echo "</table>";




		} else {
			    echo "0 results";
			}
			
			exit();
			?>



</body>
</html>
         
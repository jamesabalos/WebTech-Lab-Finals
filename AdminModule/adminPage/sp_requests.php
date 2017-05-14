<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrator | Service Provider Requests</title>

	<link href="css/index.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="updateRequests.js"></script>
       
</head>



<body>

<!-- Navigation-->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="adminLogin.php"><img class="logo" src="../public/images/LogoAdmin.png"/></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav">
            	<li><a href="ho_requests.php">Customer Registration Request</a></li>
            	<li><a href="homeowner.php">Customer</a></li>
            	<li><a href="sp_requests.php">Service Provider Registration Request</a></li>
            	<li><a href="serviceprovider.php">Service Provider</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

            	<li><a href=""><span class="fa fa-sign-out"></span>	LOGOUT</a></li>

            </ul>
          </div>
        </div>
      </nav>


 <?php
require('../ConnectDB.php');
$sql = mysqli_query($con, "SELECT * FROM service_provider WHERE req_status='Pending'");

if ($sql->num_rows > "0") {
    // output data of each row
    echo "<div class='container adminStylePaddingTop'>";
    echo "<h1>Pending Customer Account Requests</h1>";
    echo "<table class='table table-hover table-responsive'>";
    echo "<tr class='info'>
									<th>Name</th>
					                <th>Company Name</th>
									<th>Email</th>
									<th>Birthdate</th>
									<th>Address</th>
									<th>Gender</th>
									<th>Cellphone Number</th>
									<th>Telephone Number</th>
									<th>ACTION</th>

								</tr>";
    while ($rows = mysqli_fetch_assoc($sql)) {
        $first_name   = $rows['first_name'];
        $last_name    = $rows['last_name'];
        $company_name = $rows['company_name'];
        $email        = $rows['email'];
        $birthdate    = $rows['birthdate'];
        $address      = $rows['address'];
        $gender       = $rows['gender'];
        $cp_no        = $rows['cp_no'];
        $tel_no       = $rows['tel_no'];
        
        
        $row = $sql->num_rows; //Dynamic number for rows
        $col = 12; // Dynamic number for columns
        
        echo "<tr>
							       	<td>$first_name $last_name</td>
					        		<td>$company_name</td>
					        		<td>$email</td>
					        		<td>$birthdate</td>
					        		<td>$address</td>
					        		<td>$gender</td>
					        		<td>$cp_no</td>
					        		<td>$tel_no</td>
					        		<td><button  id='accept' value='accept' class='btn btn-sm btn-success' type='button' onclick='update_SP_register_rq(this)'>Accept</button>
					        		<button  id='reject' value='reject' class='btn btn-sm btn-danger' type='button' onclick='update_SP_register_rq(this)'>Reject</button>
					        		</td>


					        </tr>";
        
        
    }
    echo "</table>";
    
    
    
    
} else {
    echo "<div class='container adminStylePaddingTop'>";
    echo "<h1>Pending Service Provider Account Requests</h1>";
    echo "<table class='table table-hover table-responsive'>
		   			<tr class = 'info'>
									<th>Name</th>
									<th>Email</th>
									<th>Birthdate</th>
									<th>Address</th>
									<th>Gender</th>
									<th>Cellphone Number</th>
									<th>Telephone Number</th>
									<th>Action</th>

								</tr>
					</table>";
}

exit();
?>



</body>
</html>
         
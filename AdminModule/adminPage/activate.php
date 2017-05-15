  <?php

 	
											
	require ('../ConnectDB.php');
	$info = file_get_contents("php://input");
	$json_decoded = json_decode($info,true);
	$spEmail = $json_decoded[0]["email"];	
	$value = $json_decoded[0]["status"];										
	
   $query = "UPDATE `service_provider` SET status='$value' WHERE email='$spEmail' ";
   $sql = mysqli_query($con,$query);
   echo "Account is: ".$_POST['Value']; 
   echo $spEmail;
   // header('location: serviceprovider.php');	
	 //  Displaying Selected Valu
	mysqli_close($con);

	?>

  <?php

 	
	if(isset($_POST['submit'])) {
											
	require ('../ConnectDB.php');
	$info = file_get_contents("php://input");
	$json_decoded = json_decode($info,true);
	$spEmail = $json_decoded[0]["email"];
	
	
					
	$value = $_POST['Value'];							
	
   $query = "UPDATE `service_provider` SET status='$value' WHERE email='ssss@Gmail.com' ";

   $sql = mysqli_query($con,$query);
   echo "Account is: ".$_POST['Value'];
   echo $spEmail;		
	 //  Displaying Selected Value
	}
	mysqli_close($con);

	?>

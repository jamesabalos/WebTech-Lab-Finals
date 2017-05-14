<?php
    require ('../ConnectDB.php');
	$info = file_get_contents("php://input");
	$json_decoded = json_decode($info,true);
	$spEmail = $json_decoded[0]["email"];
	$status = $json_decoded[0]["req_status"];

	$sql = mysqli_query($con,"SELECT * FROM service_provider WHERE email='$spEmail' ");
	$rows = mysqli_fetch_assoc($sql);
	//echo "id: " . $rows['hoid']. " - Name: " . $rows['first_name']. " " . $rows['last_name'];

		if ($sql->num_rows > "0") {
		 if($status == 'accept'){

	   		$update = "UPDATE `service_provider` SET req_status='Accepted' WHERE email='$spEmail' ";
	   		if(mysqli_query($con, $update)){
			  	echo ("Successfully Updated");
			 }
		 }else{

	   		$update = "UPDATE `service_provider` SET req_status='Rejected' WHERE email='$spEmail' ";
	   		if(mysqli_query($con, $update)){
			  	echo ("Successfully Updated");
			 }

		 }
	     
		}


?>
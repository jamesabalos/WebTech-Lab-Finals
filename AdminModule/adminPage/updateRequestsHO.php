<?php
    require ('../ConnectDB.php');
// $req_data = file_get_contents("php://input");
// $json_decoded = json_decode($req_data,true);
	$info = file_get_contents("php://input");
	$json_decoded = json_decode($info,true);
	$hoEmail = $json_decoded[0]["email"];
	$status = $json_decoded[0]["req_status"];


	$sql = mysqli_query($con,"SELECT * FROM home_owner WHERE email='$hoEmail' ");
	$rows = mysqli_fetch_assoc($sql);
	//echo "id: " . $rows['hoid']. " - Name: " . $rows['first_name']. " " . $rows['last_name'];

		if ($sql->num_rows > "0") {
			if($status == 'accept'){

			   	$update = "UPDATE `home_owner` SET req_status='Accepted' WHERE email='$hoEmail' ";

		   		if(mysqli_query($con, $update)){
				  	echo ("Successfully Updated");

				  }		

			    //  	$updateStat = "SELECT `home_owner` WHERE req_status='Accepted' and email='$hoEmail' ";
			   	// 	$sql1 = mysql_query($con,$updateStat);

			   	// if($sql1->num_rows > "0"){
			   	// 	   	$update1 = "UPDATE `home_owner` SET status='Active' WHERE email = '$hoEmail'";
			   	// 	   	mysqli_query($con,$update1);
			   	// }




			 	
			}else{
				$update = "UPDATE `home_owner` SET req_status='Rejected' WHERE email='$hoEmail' ";
		   		if(mysqli_query($con, $update)){
				  	echo ("Successfully Updated");
			 	}
			}

	     	
		}

		mysql_close();
?>
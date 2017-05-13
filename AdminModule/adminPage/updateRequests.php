<?php
    require ('../ConnectDB.php');
	$hoEmail = file_get_contents("php://input");

	$sql = mysqli_query($con,"SELECT * FROM home_owner WHERE email='$hoEmail' ");
	$rows = mysqli_fetch_assoc($sql);

		if ($sql->num_rows > "0") {

        echo "id: " . $rows['hoid']. " - Name: " . $rows['first_name']. " " . $rows['last_name'].
		}


?>
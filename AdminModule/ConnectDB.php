<?php

$con = mysqli_connect("localhost","root","","home_owner");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
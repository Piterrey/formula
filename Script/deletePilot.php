<?php
	$toDelID=$_GET['toDPil'];
	// Create connection
	$con=mysqli_connect("127.0.0.1","root","","Formula1");

	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"DELETE FROM Pilots WHERE pilotID='".$toDelID."';");
	mysqli_close($con);
	//header("location:../pages/Pilots.php");
?>
<?php
	include_once("connect.php");

	$sql1 = "SET FOREIGN_KEY_CHECKS=0";
	mysqli_query($server, $sql1);

	$sql2 = "TRUNCATE classroom";
	mysqli_query($server, $sql2);
	
	$sql3 = "TRUNCATE teacher";
	mysqli_query($server, $sql3);
	
	$sql4 = "TRUNCATE teacher";
	mysqli_query($server, $sql4);

	$sql5 = "SET FOREIGN_KEY_CHECKS=1";
	mysqli_query($server, $sql5);

	echo "All Classrooms have been deleted.";


	// Wrap up and close connection
mysqli_close($server);

?>
<?php
	include_once("connect.php");

	$sql1 = "SET FOREIGN_KEY_CHECKS=0";
	mysqli_query($server, $sql1);

	$sql2 = "DROP booking";
	mysqli_query($server, $sql2);
	
	$sql3 = "DROP classroom";
	mysqli_query($server, $sql3);

	$sql4 = "DROP teacher";
	mysqli_query($server, $sql4);
	
	$sql4 = "DROP schedule";
	mysqli_query($server, $sql5);

	$sql6 = "SET FOREIGN_KEY_CHECKS=1";
	mysqli_query($server, $sql6);

	echo "All tables have been dropped";


	// Wrap up and close connection
mysqli_close($server);

?>
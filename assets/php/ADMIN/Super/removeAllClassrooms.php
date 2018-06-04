<?php
	include_once("../../connect.php");

	$sql1 = "SET FOREIGN_KEY_CHECKS=0";
	mysqli_query($server, $sql1);

	$sql2 = "TRUNCATE classroom";
	mysqli_query($server, $sql2);

	$sql3 = "SET FOREIGN_KEY_CHECKS=1";
	mysqli_query($server, $sql3);

	echo "All Classrooms have been deleted.";


	// Wrap up and close connection
mysqli_close($server);

?>
<?php
	include_once("../../connect.php");

	$sql1 = "UPDATE teacher SET accessLevel='2'";
	mysqli_query($server, $sql1);
	echo "All teachers are ADMIN";


	// Wrap up and close connection
mysqli_close($server);

?>
<?php
	
	session_start();

	include_once("connect.php");

	// Fill array with room names
	$room = array();

	for($index = 0; $index < count($room); $index++)
	{
		$roomName = $room[$index];

		$sql = "INSERT INTO 'Classroom' ('classID', 'roomName') VALUES (NULL, '$roomName')";
		mysqli_query($server, $sql);

	}

	// Wrap up and close connection
     mysqli_close($server);


?>
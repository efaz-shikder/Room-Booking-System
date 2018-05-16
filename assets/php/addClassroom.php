<?php
	
	session_start();

	include_once("connect.php");

	$room = array();

	for($index = 0; $index < count($room); $index++)
	{
		$roomName = $room[$index];

		$sql = "INSERT INTO 'Classroom' ('classID', 'roomName') VALUES (NULL, '$roomName')";
	}

?>
<?php

	session_start();

	include_once("connect.php");

	$teacherID =  1;//$_SESSION['id'];
	$dateOfBooking = "2018-05-16";  // Get from calendar
	$roomName = 1; //$_POST['roomName'];
	$period = 'B' //$_POST['period'];

	$sql = "INSERT INTO `booking` (`teacherID`, `classID`, `dateOfBooking`, `period`) VALUES ('1', '1', '2018-05-22', 'B')";
	mysqli_query($server, $sql);

	// Wrap up and close connection
	mysqli_close($server);


?>
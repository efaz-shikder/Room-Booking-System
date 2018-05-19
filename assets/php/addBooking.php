<?php

	session_start();

	include_once("connect.php");

	$_SESSION['id'] = $teacherID;
	$dateOfBooking = "";  // Get from calendar
	$roomName = $_POST['roomName'];
	$period = $_POST['period'];

	$sql = "INSERT INTO `Booking` (`teacherID`, `classID`, `dateOfBooking`, `period`) VALUES ('$teacherID', '$roomID', '$dateOfBooking', '$period')";
	mysqli_query($server, $sql);

	// Wrap up and close connection
	mysqli_close($server);


?>
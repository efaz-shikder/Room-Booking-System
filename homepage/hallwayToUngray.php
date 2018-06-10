<?php
	session_start();
	include_once("../assets/php/connect.php");

	$hallway = $_POST['hallway'];
	$hallway = str_replace('"', "", $hallway);

	$sql = "SELECT classroom.classID FROM classroom WHERE classroom.hallway='$hallway' AND classroom.isBookable='yes'";
	$result = mysqli_query($server, $sql);

	$classID = array();
	while($row = mysqli_fetch_array($result))
	{
		array_push($classID, $row['classID']);
	}
	
	echo json_encode($classID);
?>
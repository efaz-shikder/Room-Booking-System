<?php
	session_start();
	include_once("../assets/php/connect.php");

	$sql = "SELECT * FROM schedule WHERE schedule.typeOfDay='5'";
	$result = mysqli_query($server, $sql);

	$noSchoolDays = array();
	while($row = mysqli_fetch_array($result))
	{
		array_push($noSchoolDays, $row['specialDate']);
		// $data[] = $row;
	}

	$_SESSION['noSchoolDays'] = $noSchoolDays;
	echo json_encode($noSchoolDays);
?>
<?php
	$hallway = $_POST['hallway'];
	$date = $_POST['date'];
	$period = $_POST['period'];
	$currentTeacherID = $_SESSION['email'];

	echo $hallway;
	echo $date;
	echo $period;
	
	$hallway = str_replace('"', "", $hallway);

	$sql = "SELECT classroom.classID FROM classroom WHERE classroom.hallway='$hallway' AND classroom.isBookable='yes'";
	$result = mysqli_query($server, $sql);

	$classID = array();
	while($row = mysqli_fetch_array($result))
	{
		array_push($classID, $row);
		// $data[] = $row;
	}

	$bookedRoomIDs = array();
	for ($i = 0; $i < count($data); $i++)
	{
		$sql = "SELECT * from booking WHERE booking.classID = '$classID[i]' AND booking.dateOfBooking ='$date' AND booking.period='$period'";
		$bookingResult = mysqli_query($server, $sql);
		$row = mysqli_fetch_array($bookingResult);

		if (mysqli_num_rows($bookingResult)!=0)
		{
			// booking exists
			// get the teacherID of the one result
			$teacherEmail = $row['teacherEmail'];
			array_push($bookedRoomIDs, array($teacherEmail, $classID[i]));
			// $bookedRoomIDs[] = array($teacherEmail, $data[i]);
		}
	}
	
	$_SESSION['bookedRoomIDS'] = $bookedRoomIDs;
?>
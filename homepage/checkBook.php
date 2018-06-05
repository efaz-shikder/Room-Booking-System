<?php

session_start();

include_once("../assets/php/connect.php");

$hallway = $_POST['hallway'];
$date = $_POST['date'];
$period = $_POST['period'];
$currentTeacherID = $_SESSION['email'];

$n=0;
switch ($hallway) {
	case 'C Hallway':
	$n = 1;
	break;
	case 'S Hallway':
	$n = 2;
	break;
	case 'English Hallway':
	$n = 3;
	break;
	case 'French Hallway':
	$n = 4;
	break;
	case 'Gym Hallway':
	$n = 5;
	break;
	case 'Front Foyer':
	$n = 6;
	break;
	case 'Music Hallway':
	$n = 7;
	break;
	case 'Math Hallway':
	$n = 8;
	break;
	case 'Science Hallway':
	$n = 9;
	break;
	case 'Geography Hallway':
	$n = 10;
	break;
}

echo "$date";
echo "$period";
echo "$hallway";
echo "$n";
echo "<script>alert('This works'); </script>";
$sql = "SELECT * FROM classroom WHERE classroom.hallway='$hallway";
$result = mysqli_query($server, $sql);

$check = "SELECT * FROM booking INNER JOIN classroom ON classroom.classID = booking.classID WHERE booking.dateOfBooking ='$date' AND booking.period='period'";
$checkResult = mysqli_query($server, $check);


while($row = mysqli_fetch_array($result))
{
	$bookedClass = $checkBook['classID'];
	$roomName = $row['roomName'];
	$classID = $row['classID'];
	if($classID == $bookedClass)
	{
		echo '<li id='. $classID .' >';
		echo '<a href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable('.$n.');">'.$roomName.'</a>';
		echo '</li>';
	}
	else
	{
		echo '<li id='. $classID .' >';
		echo '<a href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable('.$n.');">'.$roomName.'</a>';
		echo '</li>';
	}
}	
/*

{

	$hallway = $_POST['hallway'];
	$date = $_POST['date'];
	$period = $_POST['period'];
	$currentTeacherID = $_SESSION['email'];

	switch ($hallway) {
		case 'C Hallway':
		$n = 1;
		break;
		case 'S Hallway':
		$n = 2;
		break;
		case 'English Hallway':
		$n = 3;
		break;
		case 'French Hallway':
		$n = 4;
		break;
		case 'Gym Hallway':
		$n = 5;
		break;
		case 'Front Foyer':
		$n = 6;
		break;
		case 'Music Hallway':
		$n = 7;
		break;
		case 'Math Hallway':
		$n = 8;
		break;
		case 'Science Hallway':
		$n = 9;
		break;
		case 'Geography Hallway':
		$n = 10;
		break;
	}

	$sql = "SELECT * FROM classroom WHERE classroom.hallway='$hallway";
	$result = mysqli_query($server, $sql);

	
	$check = "SELECT * FROM booking INNER JOIN classroom ON classroom.classID = booking.classID WHERE booking.dateOfBooking ='$date' AND booking.period='period'";
	$checkResult = mysqli_query($server, $check);

	/*
	while($row = mysqli_fetch_array($result))
	{
		
		while ($checkBook = mysqli_fetch_array($checkResult))
		{
			$bookedClass = $checkBook['classID']
			$roomName = $row['roomName'];
			$classID = $row['classID'];
			if($classID == $bookedClass)
			{
				echo '<li id='. $classID .' >';
				echo '<a href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable('.$n.');">'.$roomName.'</a>';
				echo '</li>';
			}
			else
			{
				echo '<li id='. $classID .' >';
				echo '<a href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable('.$n.');">'.$roomName.'</a>';
				echo '</li>';
			}
		} 

		$bookedClass = $checkBook['classID']
		$roomName = $row['roomName'];
		$classID = $row['classID'];
		if($classID == $bookedClass)
		{
			echo '<li id='. $classID .' >';
			echo '<a href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable('.$n.');">'.$roomName.'</a>';
			echo '</li>';
		}
		else
		{
			echo '<li id='. $classID .' >';
			echo '<a href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable('.$n.');">'.$roomName.'</a>';
			echo '</li>';
		}
		
	}	
}

*/
// Wrap up and close connection
mysqli_close($server);


?>

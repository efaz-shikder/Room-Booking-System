<?php
	
	session_start();

	include_once("../../connect.php");

	// Fill array with room names
	$room = array("Robotics Lab", "S7", "Fitness Room", "S3", "S1", "S6", "S4", "S2", "Teachers Office (S Hallway)", "Phys-ed Office", "Double Gym", "Girl Single Gym", "Swimming Pool", "Boy Single Gym", "105", "107", "109", "111", "115", "119", "English Office", "121", "123", "Art Office", "Day Care Office", "116", "118", "Day Care Room", "132", "131", "130", "129", "128", "127", "126", "C16", "C15", "Computer Science Office", "C7", "C5", "C3", "C1", "C13", "C12", "C10", "C8", "C6", "C4", "C2", "Dance Room", "Music Office", "M1", "M2", "Caretakers Room", "Kitchen", "Guidance", "Main Office", "Cafeteria", "Special-Ed Room", "Staff Room", "Board Room", "Conference Room", "Library Alcove", "Lab Atwood", "Lab Hadfield", "201", "SLC Office", "Health Room", "207", "211", "213", "217", "Science Office", "Math Office", "218", "202", "204", "208", "201A", "212", "216",  "228", "224", "222", "220", "239", "237", "235", "233", "231", "229", "Social Studies and Humanities Office", "312", "310", "308", "306", "302", "History and Geography Office 1", "History and Geography Office 2", "309", "307", "305", "303", "301");
	$hallway = "S Hallway";

	for($index = 0; $index < count($room); $index++)
	{

		echo $index;
		$roomName = $room[$index];

		switch($index)
		{
			case ( $index < 9):
				$hallway = 'S Hallway';
				break;

			case ($index < 14):
				$hallway = 'Gym Hallway';
				break;

			case ($index < 28):
				$hallway = 'English Hallway';
				break;

			case ($index < 35):
				$hallway = 'French Hallway';
				break;

			case ($index < 49):
				$hallway = 'C Hallway';
				break;

			case ($index < 55):
				$hallway = 'Music Hallway';
				break;

			case ($index < 65):
				$hallway = 'Front Foyer';
				break;

			case ($index < 75):
				$hallway = 'Science Hallway';
				break;

			case ($index < 91):
				$hallway = 'Math Hallway';
				break;

			case ($index < 105):
				$hallway = 'Geography Hallway';
				break;
		}

		$sql = "INSERT INTO `classroom` (`classID`, `roomName`, `hallway`, `isBookable`) VALUES (NULL, '$roomName', '$hallway', 'no')";
	
		if (mysqli_query($server, $sql))
    	{
        echo "Room: $roomName Hallway: $hallway </br>";
    	} 
	}

	// Wrap up and close connection
     mysqli_close($server);


?>
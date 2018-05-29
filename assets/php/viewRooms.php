<?php

	function listRooms()
	{
		include_once("connect.php");
		
		if (isset($_POST['hallway'])) {
			
			$hallway = $_POST['hallway'];

			echo "$hallway";
		}

		$sql = "SELECT * FROM `classroom` WHERE hallway = 'C Hallway' ORDER BY `classroom`.`roomName` ASC";
		$result = mysqli_query($server, $sql);
		while($row = mysqli_fetch_array($result))
		{  
			 //Creates a loop to loop through results

			$roomName = $row['roomName'];

			if ($row["isBookable"] == "yes")
			{
				echo '<li><a href="#">'. $roomName. '</a></li>';
			}
			
		}
	}
?>
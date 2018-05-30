<?php
	
	include_once("connect.php");
		
	

	function listRooms()
	{
		if (isset($_POST['hallway'])) 
		{
		
			$hallway = $_POST['hallway'];
		}

		$sql = "SELECT * FROM `classroom` WHERE hallway = '$hallway' ORDER BY `classroom`.`roomName` ASC";
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
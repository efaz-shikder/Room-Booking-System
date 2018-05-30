<?php 

session_start();

include_once("connect.php");

?>
<!doctype html>
<html lang="en">
<head>

	<title>test</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">

</head>

<body>

	<!-- Navigation Menu -->
	<div class="menunav">
		<div id="ArbisNav" class="sidenav">
			<a href="../../homepage/index.php">Home</a>
			<a href="viewOwnBooking.php">Booked Rooms</a>
			<a href="">Help</a>
		</div>

		<section id="main" class="main" style="padding: 20px;">

			<div class="jumbotron vertical-center">
				<div class="container-fluid">

					<!--  Navigation Menu Icon -->
					<div class="row">
						<div id="navIcon">
							<div id="nav-icon3" onclick="toggleNav()">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>

				</div>


				<table id="bookings">
					<thead>
						<th>Date</th>
						<th>Room Number</th>
						<th>Period</th>
						<th> Cancel</th>
					</thead>>

					<?php

					$currentTeacherID = $_SESSION['email']; 
					$query = "SELECT * FROM Booking WHERE Booking.teacherEmail = '$currentTeacherID' " ; 

					$result = mysqli_query($server, $query);
					while($row = mysqli_fetch_array($result))
						{   //Creates a loop to loop through results


							$dateOfBooking = $row['dateOfBooking'];
							$period = $row['period'];
							$classID = $row['classID'];

							$sql = "SELECT * FROM Classroom WHERE Classroom.classID = $classID";
							$resultClassroom =  mysqli_query($server, $sql);
							$resultName = mysqli_fetch_array($resultClassroom);

							$roomName = $resultName['roomName'];

							?>

							<tbody>
								<tr id="delete<?php echo $dateOfBooking; echo "$classID"; echo "$period"; ?>">
									<td><?php echo $dateOfBooking ?></td> 
									<td><?php echo $roomName ?></td> 
									<td><?php echo $period ?></td> 
									<td >
										
										<button onclick="deleteAjax('<?php echo $dateOfBooking ?>', '<?php echo $classID ?>', '<?php echo $period ?>' )" class="btn btn-danger">Cancel</button>
									</td>
								</tr>
						</tbody>
					<?php } ?>
				</table>

			</div>
		</section>
	</div>



	<script src="../javascript/jquery.min.js"></script>
	<script src="../javascript/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">

		function deleteAjax(date, room, periods)
		{
			var dateOfBooking = JSON.stringify(date);
			var classID = JSON.stringify(room);
			var period = JSON.stringify(periods);

			if (confirm('Are you sure you want to delete booking')) {

				$.ajax({

					type: 'post',
					url: 'removeBooking.php',
					data: {dateOfBooking: date, classID: classID, period: period},
					success:function(data){
						$('#delete'+date+room+periods).hide('slow'); 

					}
				});
			}

		}
	</script>

</body>

</html>

<?php

function viewOwnBooking()
{
	session_start();

	include_once("connect.php");


	$currentTeacherID = $_SESSION['email']; 
	$query = "SELECT * FROM Booking WHERE Booking.teacherEmail = '$currentTeacherID' " ; 

	$result = mysqli_query($server, $query);

	while($row = mysqli_fetch_array($result))
	{   //Creates a loop to loop through results


		$dateOfBooking = $row['dateOfBooking'];
		$period = $row['period'];
		$classID = $row['classID'];
	}


	$sql = "SELECT * FROM Classroom WHERE Classroom.classID = $classID";
	$resultClassroom =  mysqli_query($server, $sql);
	$resultName = mysqli_fetch_array($resultClassroom);

	$roomName = $resultName['roomName'];

	$currentDate = date("d.m.Y");
	



	$cancelEditButton = '<input type="submit" name="submit" class="submit" value="Cancel"> 

	<input type="submit" value="Edit" onclick="alert('.'You clicked the button!'.')">';


	if (strtotime($dateOfBooking) < strtotime($currentDate))
	{
		$cancelEditButton = "Unable to Cancel or Edit this Booking.";	
	}

	echo "<tr><td>" . $dateOfBooking . "</td><td>" . $roomName . "</td>
	<td>" . $row['period'] . "</td><td>" . $cancelEditButton . "</td></tr>"; 
}

// Wrap up and close connection
mysqli_close($server);


?>
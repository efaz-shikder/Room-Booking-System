<!doctype html>
<html lang="en">
<head>

	<title>test</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">

</head>

<body>

	<-- Navigation Menu -->
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
			<tr>
				<th>Date</th>
				<th>Room Number</th>
				<th>Period</th>
				<th> Cancel or Edit</th>
			</tr>
			<?php viewOwnBooking() ?> 


		</table>
			</div>
		</section>
	</div>



	<script src="../javascript/jquery.min.js"></script>
	<script src="../javascript/script.js"></script>

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



	$sql = "SELECT * FROM Classroom WHERE Classroom.classID = $classID";
	$resultClassroom =  mysqli_query($server, $sql);
	$resultName = mysqli_fetch_array($resultClassroom);

	$roomName = $resultName['roomName'];

	$cancelButton = '<form action="deleteBooking.php"> <input type="button" value="Cancel Booking" onclick="alert('.'You clicked the button!'.')"> </form>';
	$editButton = '<form action="deleteBooking.php"> <input type="button" value="Edit Booking" onclick="alert('.'You clicked the button!'.')"> </form>';

	echo "<tr><td>" . $row['dateOfBooking'] . "</td><td>" . $roomName . "</td>
	<td>" . $row['period'] . "</td><td>" . $cancelButton , $editButton . "</td></tr>"; 
}

// Wrap up and close connection
mysqli_close($server);
}

?>
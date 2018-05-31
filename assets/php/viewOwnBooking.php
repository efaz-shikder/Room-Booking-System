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
	<div id="ArbisNav" class="sidenav">
		<a href="../../homepage/index.php">Home</a>
		<a href="viewOwnBooking.php">Booked Rooms</a>
		<a href="../../ARBIS_Help.html">Help</a>
	</div>

		<section id="main" class="main container">

			<div class="container-fluid bookings">

					<!--  Navigation Menu Icon -->
					<div class="row">
						<div id="center navIcon">
							<div id="nav-icon3" onclick="toggleNav()">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>
					<!-- bookings table -->
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table id="bookings">
							<thead>
								<th>Date</th>
								<th>Room Number</th>
								<th>Period</th>
								<th> Cancel</th>
							</thead>>

							<?php

							$currentTeacherID = $_SESSION['email'];
							$query = "SELECT * FROM booking WHERE booking.teacherEmail = '$currentTeacherID' " ;

							$result = mysqli_query($server, $query);
							while($row = mysqli_fetch_array($result))
							{   //Creates a loop to loop through results


								$dateOfBooking = $row['dateOfBooking'];
								$period = $row['period'];
								$classID = $row['classID'];

								$sql = "SELECT * FROM classroom WHERE classroom.classID = $classID";
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
					</div>

			</div>

		</section>


	<script src="../javascript/jquery.min.js"></script>
	<script src="../javascript/script.js"></script>
	<script type="text/javascript">

		function deleteAjax(date, room, periods)
		{
			var dateOfBooking = JSON.stringify(date);
			var classID = JSON.stringify(room);
			var period = JSON.stringify(periods);

			if (confirm('Are you sure you want to delete this booking?')) {

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

		/** Navigation Icon **/
		var action = 1;

		function toggleNav() {
			if ( action == 1 ) {
				document.getElementById("ArbisNav").style.width = "250px";
				document.getElementById("main").style.marginLeft = "250px";
				action = 2;
			}
			else {
				document.getElementById("ArbisNav").style.width = "0";
				document.getElementById("main").style.marginLeft = "0px";
				action = 1;
			}
			$("#mainContent").toggle();
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
	$query = "SELECT * FROM booking WHERE booking.teacherEmail = '$currentTeacherID' " ;

	$result = mysqli_query($server, $query);

	while($row = mysqli_fetch_array($result))
	{   //Creates a loop to loop through results


		$dateOfBooking = $row['dateOfBooking'];
		$period = $row['period'];
		$classID = $row['classID'];
	}


	$sql = "SELECT * FROM classroom WHERE classroom.classID = $classID";
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

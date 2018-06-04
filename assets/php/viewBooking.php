<?php

session_start();

include_once("connect.php");

$teacherEmail = $_SESSION['email'];

?>
<!doctype html>
<html lang="en">
<head>

	<title>Bookings</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/viewBookings.css">

</head>

<body>

	<!-- Navigation Menu -->
	<div id="ArbisNav" class="sidenav">
		<a href="../../homepage/index.php">Home</a>
		<a href="viewOwnBooking.php">Own Booked Rooms</a>
		<a href="viewBooking.php">All Booked Rooms </a>
		<a href="../../ARBIS_Help.html">Help</a>
	</div>

	<section id="main" class="main container">

		<div class="container-fluid bookings">

			<!--  Navigation Menu Icon -->
			<div class="row">
				<div class="col">
					<div id="center navIcon">
						<div id="nav-icon3" onclick="toggleNav()">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="calendar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="date" id="selectDate" value="yyyy-mm-dd">
					<button onclick="selectDate();">Search</button>
				</div>
				<div class="col">
					<table id="bookings">
						<thead>
							<th>Date</th>
							<th>Room Number</th>
							<th>Period</th>
							<th> Teacher</th>
						</thead>
						<?php

						$currentTeacherID = $_SESSION['email'];
						$query = "SELECT * FROM booking" ;

						$result = mysqli_query($server, $query);
						while($row = mysqli_fetch_array($result))
		              {   //Creates a loop to loop through results


		              	$dateOfBooking = $row['dateOfBooking'];
		              	$period = $row['period'];
		              	$classID = $row['classID'];
		              	$teacherID = $row['teacherEmail'];

		              	$sql1 = "SELECT * FROM classroom WHERE classroom.classID = $classID";
		              	$resultClassroom =  mysqli_query($server, $sql1);
		              	$resultName = mysqli_fetch_array($resultClassroom);
		              	$roomName = $resultName['roomName'];

		              	$sql2 = "SELECT * FROM teacher WHERE teacher.email = '$teacherID'";
		              	$resultTeacher = mysqli_query($server, $sql2);
		              	$teacher = mysqli_fetch_array($resultTeacher);
		              	$firstName = $teacher['first_name'];
		              	$lastName = $teacher['last_name'];

		              	?>

		              	<tbody>
		              		<tr id="delete<?php echo $dateOfBooking; echo "$classID"; echo "$period"; ?>" name="<?php echo $dateOfBooking; ?>" class="date">
		              			<td><?php echo $dateOfBooking ?></td>
		              			<td><?php echo $roomName ?></td>
		              			<td><?php echo $period ?></td>
		              			<td >
		              				<?php echo "$firstName $lastName"; ?>
		              			</td>
		              		</tr>
		              	</tbody>
		              <?php } ?>
		          </table>
		      </div>
		  </div>
		</section>


		<script src="../javascript/jquery.min.js"></script>
		<script src="../javascript/script.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript">
			var action = 1;

			function toggleNav() {
				if ( action == 1 ) {
					document.getElementById("ArbisNav").style.width = "250px";
					document.getElementById("main").style.marginLeft = "280px";
					action = 2;
				}
				else {
					document.getElementById("ArbisNav").style.width = "0px";
					document.getElementById("main").style.marginLeft = "0px";
					action = 1;
				}
				$("#mainContent").toggle();
			}
			$(document).ready(function(){
				$('#nav-icon3').click(function(){
					$(this).toggleClass('open');
				});
			});

		</script>
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

			function selectDate()
			{

				var date = document.getElementById("selectDate").value;
				$('.date').show();

				if(date != "")
				{

					$('.date').hide();
					$('tr[name='+date+']').show(); 
				} 
			}
		</script>

	</body>

	</html>

	<?php

// Wrap up and close connection
	mysqli_close($server);


	?>

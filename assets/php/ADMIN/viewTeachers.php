<?php

session_start();

include_once("../connect.php");

// Checks if the session is valid
if (!isset($_SESSION['email']) && !isset($_SESSION['accessLevel']))
{
	header("Location: ../../../index.php");
}

$teacherEmail = $_SESSION['email'];

?>
<!doctype html>
<html lang="en">
<head>

	<title>ARBIS-Edit Teachers</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../CSS/viewBookings.css">

</head>

<body>

	<!-- Navigation Menu -->
	<!-- Navigation Menu -->
	<div id="ArbisNav" class="sidenav">
		<div class="outer">
			<div class="inner" onclick="toggleNav()">
				<label>Back</label>
			</div>
		</div>
		<a href="../../../homepage/admin.php">Home</a>
		<a href="viewOwnBookingAdmin.php">Own Booked Rooms</a>
		<a href="viewBookingAdmin.php">All Booked Rooms </a>
		<a href="viewRooms.php">Edit Rooms</a>
		<a href="viewTeachers.php">Edit Teachers</a>
		<a href="../../../ARBIS_Help_Admin.html">Help</a>
	</div>

	<section class="padding container">

		<div class="container-fluid bookings">

			<!--  Navigation Menu Icon -->
			<div class="row">
				<div class="col">
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
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Current Level</th>
					<th>Teacher Bookability</th>
					<th>Make Admin</th>
				</thead>>
				<?php

				$currentTeacherID = $_SESSION['email'];
				$query = "SELECT * FROM teacher WHERE teacher.accessLevel != '4'" ;

				$result = mysqli_query($server, $query);
				while($row = mysqli_fetch_array($result))
              {   //Creates a loop to loop through results


              	$firstName = $row['first_name'];
              	$lastName = $row['last_name'];
              	$email = $row['email'];

              	switch($row['accessLevel'])
              	{
              		case 0:
              		$currentLevel = "Cannot Book";
              		break;
              		case 1:
              		$currentLevel = "Can Book";
              		break;
              		case 2:
              		$currentLevel = "Administrator";
              		break;
              		case 3;
              		$currentLevel = "Deny ARBIS Access";
              		break;
              	}

              	?>

              	<tbody>
              		<tr>
              			<td><?php echo $firstName ?></td>
              			<td><?php echo $lastName ?></td>
              			<td><?php echo $email ?></td>
              			<td><?php echo $currentLevel ?></td>
              			<td>
              				<button onclick="changeBookability('<?php echo $email ?>', 1)" class="btn btn-danger">Yes</button>
              				<button onclick="changeBookability('<?php echo $email ?>', 0)" class="btn btn-danger">No</button>
              				<button onclick="changeBookability('<?php echo $email ?>', 3)" class="btn btn-danger">Deny Access</button>
              			</td>
              			<td>
              				<button onclick="changeBookability('<?php echo $email ?>', 2)" class="btn btn-danger">Yes</button>
              			</td>
              		</tr>
              	</tbody>
              <?php } ?>
          </table>
      </section>


      <script src="../../javascript/jquery.min.js"></script>
      <script src="../../javascript/script.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript">
      	function changeBookability(teacherEmail, newAccessLevel)
      	{
      		var message = "";
      		var teacherEmail = JSON.stringify(teacherEmail);

      		switch(newAccessLevel)
      		{
      			case 0:
      			message =  "Are you sure you want to remove this teacher\'s booking ability?";
      			break;
      			case 1:
      			message = "Are you sure you want to let this teacher book?";
      			break;
      			case 2:
      			message = "Are you sure you want to make this teacher an administrator?";
      			break;
      			case 3:
      			message = "Are you sure you want to deny access to ARBIS for this teacher?";
      			break;

      		}

      		if (confirm(message))
      		{
      			$.ajax({

      				type: 'post',
      				url: 'changeAccessLevel.php',
      				data: {teacherEmail: teacherEmail, newAccessLevel: newAccessLevel},
      				success:function(data){
      					console.log(data);
      					updateBooking();
      					window.location.assign("viewTeachers.php");
      				}
      			});
      		}

      	}

      	function updateBooking()
      	{
      		$.ajax({

      			type: 'post',
      			url: 'updateBooking.php',
      			data: {},
      			success:function(data){
      				console.log("success");
      				updateBooking();
      				window.location.assign("viewTeachers.php");
      			}
      		});
      	}
      </script>

  </body>

  </html>
  <?php

// Wrap up and close connection
  mysqli_close($server);


  ?>

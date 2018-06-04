<?php

session_start();

include_once("connect.php");

$teacherEmail = $_SESSION['email'];

?>
<!doctype html>
<html lang="en">
<head>

	<title>test</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/viewBookings.css">

</head>

<body>

	<!-- Navigation Menu -->
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
              $query = "SELECT * FROM teacher" ;
 
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
                    </td>
					<td>
						<button onclick="changeBookability('<?php echo $email ?>', 2)" class="btn btn-danger">Yes</button>
					</td>
                  </tr>
                </tbody>
              <?php } ?>
			</table> 
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
					
				}
				
				if (confirm(message)) 
				{

					$.ajax({

						type: 'post',
						url: 'changeAccessLevel.php',
						data: {email: teacherEmail, accessLevel: newAccessLevel},
						success:function(data){}
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

// Wrap up and close connection
mysqli_close($server);


?>

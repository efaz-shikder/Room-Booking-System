<?php

session_start();

include_once("../connect.php");

$teacherEmail = $_SESSION['email'];

?>
<!doctype html>
<html lang="en">
<head>

	<title>test</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../CSS/viewRooms.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</head>

<body>

	<!-- Navigation Menu -->
	<div id="ArbisNav" class="sidenav">
		<a href="../../../homepage/admin.php">Home</a>
    <a href="viewOwnBookingAdmin.php">Own Booked Rooms</a>
    <a href="viewBookingAdmin.php">All Booked Rooms </a>
    <a href="viewRooms.php">Edit Rooms</a>
    <a href="viewTeachers.php">Edit Teachers</a>
    <a href="../../../ARBIS_Help.html">Help</a>
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


			<table id="rooms">
				<thead>
					<th>Room Name</th>
					<th>Hallway</th>
					<th>Bookable</th>
				</thead>
				<?php

				$currentTeacherID = $_SESSION['email'];
				$query = "SELECT * FROM classroom" ;

				$result = mysqli_query($server, $query);
				while($row = mysqli_fetch_array($result))
              {   //Creates a loop to loop through results

              	$classID = $row['classID'];
              	$roomName = $row['roomName'];
              	$hallway = $row['hallway'];
              	$isBookable = $row['isBookable'];

              	?>

              	<tbody>
              		<tr>
              			<td><?php echo $roomName ?></td>
              			<td><?php echo $hallway ?></td>
              			<td> 
              				<form method="post" id="setBookable">
              					<div class="form-group">
              						<div class="checkbox">
              							<input type="checkbox"  name="bookable" onchange="updateBookable(this)" value="<?php echo $classID; ?>" id="<?php echo $classID; ?>" data-toggle="toggle" data-on="Yes" data-off="No" 
              							<?php 
              							if ($isBookable == "yes")
              							{
              								echo "checked";
              							}
              							?> />
              						</div>
              					</div>
              					<br />
              				</form>

              			</td>
              		</tr>
              	</tbody>
              <?php } ?>
          </table> 
      </div>
  </section>


  <script src="../../javascript/jquery.min.js"></script>
  <script src="../../javascript/script.js"></script>
  <script type="text/javascript">


  	function updateBookable(element)
  	{
  		var classID = element.value;
  		var isBookable;

  		if (document.getElementById(classID).checked == true)
  		{
  			isBookable = "yes";
  		}
  		else
  		{
  			isBookable = "no";
  		}
  		

  		$.ajax({

  			type: 'post',
  			url: 'updateRoom.php',
  			data: {classID: classID, isBookable: isBookable},
  			success:function(data){
  				console.log(data);
  				alert("Room has been updated.");
  			}
  		});
  	}


  	/** Navigation Icon **/
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

</body>

</html>
</div>

<?php



// Wrap up and close connection
mysqli_close($server);


?>

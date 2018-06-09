<?php

session_start();

include_once("../connect.php");

$teacherEmail = $_SESSION['email'];

?>
<!doctype html>
<html lang="en">
<head>

	<title>ARBIS-Edit Rooms</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../CSS/viewRooms.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</head>

<body style="background: black;">

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

 <!-- Trigger the modal with a button -->
 <button type="button" class="btn btn-info btn-lg" style="float: right; padding: auto; margin-bottom: 2%;" data-toggle="modal" data-target="#myModal">Add Classroom</button>


 <table id="rooms">
  <thead>
   <th>Room Name</th>
   <th>Hallway</th>
   <th>Bookable</th>
 </thead>

 <!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add a Classroom</h4>
      </div>
      <div class="modal-body">
        <form action="addRoom.php" method="post" id="insert_classroom">
          <label>Room name:</label>
          <input type="text" name="room_name" id="room_name" class="form-control"></br>

          <label for="sel1">Select Hallway:</label>
          <select id="hallway" name="hallway">
            <option value="C Hallway">C Hallway</option>
            <option value="S Hallway">S Hallway</option>
            <option value="English Hallway">English Hallway</option>
            <option value="French Hallway">French Hallway</option>
            <option value="Gym Hallway">Gym Hallway</option>
            <option value="Front Foyer">Front Foyer</option>
            <option value="Music Hallway">Music Hallway</option>
            <option value="Math Hallway">Math Hallway</option>
            <option value="Science Hallway">Science Hallway</option>
            <option value="Geography Hallway">Geography Hallway</option>
          </select>

          <label>Is bookable?</label>
          <input type="checkbox" name="bookable" onchange="setBookable(this);" id="initializeBookable" data-toggle="toggle" data-on="Yes" data-off="No" value="yes" checked />

          <input type="hidden" name="default_booking" id="default_booking" value="yes">


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="addRoom(document.getElementById('room_name'), document.getElementById('hallway'));">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php

$currentTeacherID = $_SESSION['email'];
$query = "SELECT * FROM classroom ORDER BY classroom.hallway DESC" ;

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

       function setBookable(element)
       {
          if(element.value == "yes")
          {
            element.setAttribute("value", "no");
          }
          else
          {
            element.setAttribute("value", "yes");
          }
       }


       function addRoom(name, hallway)
       {
        var roomName = name.value;
        var hallway = hallway.value;
        var isBookable;

        if (document.getElementById("initializeBookable").checked == true)
        {
         isBookable = "yes";
       }
       else
       {
         isBookable = "no";
       }

       $.ajax({

         type: 'post',
         url: 'addRoom.php',
         data: {roomName: roomName, hallway: hallway, isBookable: isBookable},
         success:function(data){
          console.log(data);
          alert("Room has been added.");
          window.location.replace("viewRooms.php");
        }
      });
     }

</script>

</body>

</html>
</div>

<?php



// Wrap up and close connection
mysqli_close($server);


?>

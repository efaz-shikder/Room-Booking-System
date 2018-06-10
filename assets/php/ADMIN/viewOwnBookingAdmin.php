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

	<title>ARBIS-Your Bookings</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../CSS/viewBookings.css">

</head>

<body>

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
   <th>Date</th>
   <th>Room Number</th>
   <th>Period</th>
   <th> Cancel</th>
 </thead>
 <?php

 $currentTeacherID = $_SESSION['email'];
 $query = "SELECT * FROM booking WHERE booking.teacherEmail = '$currentTeacherID' ORDER BY booking.dateOfBooking DESC" ;

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
                <?php
                $currentDate = date("d.m.Y");




                $cancel = '<button onclick="deleteAjax(\''.$dateOfBooking.'\', \''.$classID.'\', \''.$period.'\')" class="btn btn-danger">Cancel</button>';


                if (strtotime($dateOfBooking) < strtotime($currentDate))
                {
                  $cancel = "Unable to Cancel this Booking.";  
                }

                echo $cancel; 
                ?>
              </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
    </div>
  </section>

  <script src="../../javascript/jquery.min.js"></script>
  <script src="../../javascript/script.js"></script>
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
        url: '../removeBooking.php',
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
// Wrap up and close connection
mysqli_close($server);


?>

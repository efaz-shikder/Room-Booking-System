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

  <title>Edit Rooms</title>
  <link rel="stylesheet" type="text/css" href="../../CSS/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../CSS/viewRooms.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <a href="viewTeachers.php">Edit Days</a>
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

 <!-- Trigger the modal with a button -->
 <button type="button" class="btn btn-info btn-lg" style="float: right; padding: auto; margin-bottom: 2%;" data-toggle="modal" data-target="#myModal">Add special date</button>


 <table id="rooms">
  <thead>
   <th>Date</th>
   <th>Type of Day</th>
   <th>Description</th>
 </thead>

 <!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add a Date</h4>
      </div>
      <div class="modal-body">
        <form action="addDay.php" method="post">
          <label>Description of Date:</label>
          <input type="text" name="description" id="description" class="form-control"></br>

          <label for="typeOfDay">Select Type of Day:</label>
          <select id="typeOfDay" name="typeOfDay">
            <option value="first day of school">First Day of School</option>
            <option value="last day of school">Last Day of School</option>
            <option value="late start">Late Start</option>
            <option value="no school">No School</option>
            <option value="day zero">Day Zero</option>
            <option value="normal day">Normal Day</option>
          </select>

          <label>Date</label>
          <div class="calendar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="date" id="selectDate" value="yyyy-mm-dd">

          </div>

          <input type="hidden" name="default_booking" id="default_booking" value="yes">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="addDay(document.getElementById('selectDate').value, document.getElementById('description'), document.getElementById('typeOfDay'))">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php

$currentTeacherID = $_SESSION['email'];
$query = "SELECT * FROM schedule ORDER BY schedule.specialDate DESC" ;

$result = mysqli_query($server, $query);
while($row = mysqli_fetch_array($result))
{   //Creates a loop to loop through results

  $description = $row['dateDescription'];
  $date = $row['specialDate'];
  $type = $row['typeOfDay'];

  ?>

  <tbody>
    <tr>
      <td><?php echo $date ?></td>
      <td><?php echo $type ?></td>
      <td><?php echo $description ?></td>
    </tr>
  </tbody>
<?php } ?>
</table> 
</div>
</section>

<script src="../../javascript/jquery.min.js"></script>
<script src="../../javascript/script.js"></script>
<script type="text/javascript">

  function addDay(date, description, type)
  {
    var roomName = name.value;
    var description = description.value;
    var type = type.value;

    $.ajax({

     type: 'post',
     url: 'addDay.php',
     data: {date: date, description: description, type: type},
     success:function(data){
      console.log(data);
      alert("Day has been added.");
      window.location.replace("viewSpecialDay.php");
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

</script
</body>

</html>
</div>

<?php



// Wrap up and close connection
mysqli_close($server);


?>

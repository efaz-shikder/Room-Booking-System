<?php

session_start();

include_once("connect.php");

	
$currentTeacherID = $_SESSION['email']; 
$query = "SELECT * FROM Booking WHERE Booking.teacherEmail = '$currentTeacherID' " ; 

$result = mysqli_query($server, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result))
{   //Creates a loop to loop through results


	$dateOfBooking = $row['dateOfBooking'];
	$period = $row['period'];
	$classID = $row['classID'];



	$sql = "SELECT * FROM Classroom WHERE Classroom.classID = $classID";
	$resultClassroom =  mysqli_query($server, $sql);
	$resultName = mysqli_fetch_array($resultClassroom);

	$roomName = $resultName['roomName'];


echo "<tr><td>" . $roomName . "</td><td>" . $row['dateOfBooking'] . "</td>
	<td>" . $row['period'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


// Wrap up and close connection
mysqli_close($server);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Bookings</title>

  <!-- Bootstrap core CSS -->
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="" rel="stylesheet">
  
</head>

<body>

	<h1> Make bare divs like the shit we showed Arkin</h1>

</body>


</html>
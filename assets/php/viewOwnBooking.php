<?php

session_start();

include_once("connect.php");
	
$query = "SELECT * FROM Booking"; //You don't need a ; like you do in SQL
$result = mysqli_query($server, $query);

echo "<table>"; // start a table tag in the HTML

$teacherID = 1;

while($row = mysqli_fetch_array($result))
{   //Creates a loop to loop through results

	$sql1 = "SELECT Booking.dateOfBooking, Booking.period, Booking.classID FROM Booking WHERE Booking.teacherID=$teacherID";
	$result1 = mysqli_query($server, $sql1);
	$row1 = mysqli_fetch_array($result1);
	$classID = $row1['classID'];


	$sql2 = "SELECT Booking.classID, roomName, Classroom.classID FROM Booking INNER JOIN Classroom ON Booking.classID=Classroom.classID WHERE Booking.classID=$classID";
	$resultRoom =  mysqli_query($server, $sql2);
	$rowRoom = mysqli_fetch_array($resultRoom);
	$roomName = $rowRoom['roomName'];




echo "<tr><td>" . $roomName . "</td><td>" . $row['dateOfBooking'] . "</td>
	<td>" . $row['period'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


// Wrap up and close connection
mysqli_close($server);
?>
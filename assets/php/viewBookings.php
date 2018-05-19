<?php

session_start();

include_once("connect.php");
	
$query = "SELECT * FROM Booking"; //You don't need a ; like you do in SQL
$result = mysqli_query($server, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result))
{   //Creates a loop to loop through results

	$teacherID = $row['teacherID'];

	$classID = $row['classID'];

	$sql1 = "SELECT Booking.teacherID, first_name, last_name, Teacher.teacherID FROM Booking INNER JOIN Teacher ON Booking.teacherID=Teacher.teacherID WHERE Booking.teacherID=$teacherID";
	$resultTeacher = mysqli_query($server, $sql1);
	$rowTeacher = mysqli_fetch_array($resultTeacher);

	$firstName = $rowTeacher['first_name'];
	$lastName = $rowTeacher['last_name'];

	$sql2 = "SELECT Booking.classID, roomName, Classroom.classID FROM Booking INNER JOIN Classroom ON Booking.classID=Classroom.classID WHERE Booking.classID=$classID";
	$resultRoom =  mysqli_query($server, $sql2);
	$rowRoom = mysqli_fetch_array($resultRoom);
	$roomName = $rowRoom['roomName'];




echo "<tr><td>" . $firstName . "</td><td>" . $lastName . "</td><td>" . $roomName . "</td><td>" . $row['dateOfBooking'] . "</td>
	<td>" . $row['period'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


// Wrap up and close connection
mysqli_close($server);
?>
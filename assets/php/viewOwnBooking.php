<?php

session_start();

include_once("connect.php");
	
$currentTeacherID = $_SESSION('id');
$query = "SELECT * FROM Booking WHERE teacherID = '$currentTeacherID' " ; //You don't need a ; like you do in SQLT

$result = mysql_query($query);

echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result))
{   //Creates a loop to loop through results

	$teacherID = $row['teacherID'];

	$classID = $row['classID'];

	$sql1 = "SELECT $teacherID FROM 'Teacher' ";
	$result1 = mysql_query($sql1);

	$firstName = $result1['first_name'];
	$lastName = $result1['last_name'];

	$sql2 = "SELECT $classID FROM 'Classroom' ";
	$result2 =  mysql_query($sql2);
	$roomName = $result2['roomName'];




echo "<tr><td>" . $firstName . "</td><td>" . $lastName . "</td><td>" . $roomName . "</td><td>" . $row['dateOfBooking'] . "</td>
	<td>" . $row['period'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


// Wrap up and close connection
mysqli_close($server);
?>
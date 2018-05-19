<?php

session_start();

include_once("connect.php");
	
$query = "SELECT * FROM Teacher"; //You don't need a ; like you do in SQL
$result = mysqli_query($server, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['teacherID'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['username'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


// Wrap up and close connection
mysqli_close($server);
?>
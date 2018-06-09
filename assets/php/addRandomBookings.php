<?php
session_start();
include_once("connect.php");

for ($i = 0; $i < 50; $i++)
{
	$randomClassroom = rand(1, 70);
	$teacherArray = ['ashfipathan@gmail.com', 'josh.prested@gmail.com', 'orson.barredo@gmail.com', 'shaibalmuhtadee@gmail.com', 'orson.sampani@gmail.com', 'efaz.es@gmail.com', 'mark.virao17@gmail.com'];
	$randomTeacher = $teacherArray[rand(0, 5)];
	$periodArary = ['A', 'B', 'C', 'D'];
	$randomPeriod = $periodArray[rand(0, 3)]; 
	
	$randomDate = "2018-06-" . rand(10, 28); 
	
	$sql = "INSERT INTO booking (teacherEmail, classID, dateOfBooking, period) VALUES ('$randomClassroom', '$randomTeacher', '$randomPeriod', '$randomDate')"; 
	$result = mysqli_query($server, $sql);
	
}



?>
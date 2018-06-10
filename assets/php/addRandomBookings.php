<?php
session_start();
include_once("connect.php");

$periodArray = ['A', 'B', 'C', 'D'];
$teacherArray = ['ashfipathan@gmail.com', 'josh.prested@gmail.com', 'orson.barredo@gmail.com', 'shaibalmuhtadee@gmail.com', 'efaz.es@gmail.com'];

for ($i = 0; $i < 250; $i++)
{
	$randomClassroom = rand(1, 70);

	$randomTeacher = $teacherArray[rand(0, 4)];

	$randomPeriod = $periodArray[(rand(0, 3))]; 
	
	$randomDate = "2018-06-" . rand(10, 28); 
	
	$sql = "INSERT INTO booking (`teacherEmail`, `classID`, `dateOfBooking`, `period`) VALUES ('$randomTeacher', '$randomClassroom', '$randomDate', '$randomPeriod')"; 
	$result = mysqli_query($server, $sql);

	echo "Room: " . $randomClassroom . " Teacher: ". $randomTeacher . " date: ". $randomDate . " period: " . $randomPeriod ." </br>";
	
}



?>
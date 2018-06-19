<?php
session_start();
include_once("connect.php");

$periodArray = ['A', 'B', 'C', 'D', 'AS', 'L', 'BS'];
$teacherArray = ['ashfipathan@gmail.com', 'shaibalmuhtadee@gmail.com', 'efaz.es@gmail.com', 'josh.prested@gmail.com', 'orson.sampani@gmail.com', 'amyqin501@gmail.com'];

for ($i = 0; $i < 101; $i++)
{
	$randomClassroom = rand(1, 70);

	$randomTeacher = $teacherArray[rand(0, 5)];

	$randomPeriod = $periodArray[(rand(0, 6))]; 
	
	$randomDate = "2018-06-" . rand(5, 19); 
	
	$sql = "INSERT INTO booking (`teacherEmail`, `classID`, `dateOfBooking`, `period`) VALUES ('$randomTeacher', '$randomClassroom', '$randomDate', '$randomPeriod')"; 
	$result = mysqli_query($server, $sql);

	echo "Room: " . $randomClassroom . " Teacher: ". $randomTeacher . " date: ". $randomDate . " period: " . $randomPeriod ." </br>";
	
}



?>
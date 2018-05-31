<?php

session_start();

include_once("connect.php");


echo $_POST['classID'] . "</br>";
echo $_POST['period'] . "</br>";
echo $_POST['dateOfBooking'] . "</br>";


$teacherEmail = $_SESSION['email'];
$classID = $_POST['classID'];
$dateOfBooking = $_POST['dateOfBooking'];
$period = $_POST['period'];

/*
echo $teacherEmail = trim($teacherEmail, '"');
echo $dateOfBooking =  trim($dateOfBooking, '"');
echo $classID = trim($classID, '"') ;
echo $period;*/


$sql = "INSERT INTO `booking` (`teacherEmail`, `classID`, `dateOfBooking`, `period`) VALUES ('$teacherEmail', $classID, $dateOfBooking, '$period')";

mysqli_query($server, $sql);

// Wrap up and close connection
mysqli_close($server);


?>

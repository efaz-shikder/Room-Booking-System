<?php

session_start();

include_once("connect.php");


echo $_POST['classID'] . "</br>";
echo $_POST['isBookable'] . "</br>";


$classID = $_POST['classID'];
$isBookable = $_POST['isBookable'];

/*
echo $teacherEmail = trim($teacherEmail, '"');
echo $dateOfBooking =  trim($dateOfBooking, '"');
echo $classID = trim($classID, '"') ;
echo $period;*/

$sql = "UPDATE `classroom` SET `isBookable` = '$isBookable' WHERE classroom.classID = '$classID'";

mysqli_query($server, $sql);

// Wrap up and close connection
mysqli_close($server);


?>

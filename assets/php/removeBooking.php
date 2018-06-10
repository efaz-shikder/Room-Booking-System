<?php
include_once("connect.php");

$classID = $_POST['classID'];
$dateOfBooking = $_POST['dateOfBooking'];
$period = $_POST['period'];


$classID =  trim($classID, '"');
$period =  trim($period, '"');




	// Figure out SQL and variables 
$sql = "DELETE FROM `booking` WHERE booking.classID = '$classID' AND booking.dateOfBooking = '$dateOfBooking' AND booking.period = '$period'";
echo "$sql";
mysqli_query($server, $sql);

?>
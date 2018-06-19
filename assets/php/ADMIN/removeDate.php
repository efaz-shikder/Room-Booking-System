<?php
include_once("../connect.php");

$date = $_POST['date'];
$type = $_POST['type'];


$date =  trim($date, '"');
$type =  trim($type, '"');




	// Figure out SQL and variables 
$sql = "DELETE FROM schedule WHERE schedule.specialDate = '$date';";
mysqli_query($server, $sql);

?>
<?php
include_once("../connect.php");

$sql = "DELETE FROM booking WHERE (booking.teacherEmail IN (SELECT teacher.email FROM teacher where accessLevel = '0' OR accessLevel = '3' OR accessLevel = '4') AND booking.dateOfBooking >= CURDATE())";
mysqli_query($server, $sql);

// Wrap up and close connection
mysqli_close($server);

?>
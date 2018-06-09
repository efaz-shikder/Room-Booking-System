<?php

session_start();

include_once("../connect.php");

$roomName = $_POST['roomName'];
$hallway = $_POST['hallway'];
$isBookable = $_POST['isBookable'];

echo "$roomName";
echo "$hallway";
echo "$isBookable";


$sql = "INSERT INTO `classroom` (`classID`, `roomName`, `hallway`, `isBookable`) VALUES (NULL, '$roomName', '$hallway', '$isBookable')";
mysqli_query($server, $sql);




// Wrap up and close connection
mysqli_close($server);


?>
<?php
include_once("connect.php");

$email = $_POST['teacherEmail'];
$accessLevel = $_POST['newAccessLevel'];

//$email =  trim($email, '"');
//$accessLevel = trim($accessLevel, '"');


$sql = "UPDATE teacher SET accessLevel = '$accessLevel' WHERE email = $email";
mysqli_query($server, $sql);

?>
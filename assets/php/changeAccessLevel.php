<?php
include_once("connect.php");

$email = $_POST['teacherEmail'];
$canTeacherBook = $_POST['canBook'];

$email =  trim($email, '"');


if($canTeacherBook)
{
	$sql = "UPDATE teacher SET accessLevel = '1' WHERE email = $email"
}
else
{
	$sql = "UPDATE teacher SET accessLevel = '0' WHERE email = $email"
}

echo "$sql";
mysqli_query($server, $sql);

?>
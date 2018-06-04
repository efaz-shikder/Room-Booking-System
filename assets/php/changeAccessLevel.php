<?php
include_once("connect.php");

$email = $_POST['email'];
$accessLevel = $_POST['accessLevel'];

$email =  trim($email, '"');
$accessLevel = trim($accessLevel, '"');


$sql = "UPDATE teacher 
			SET accessLevel = $accessLevel 
			WHERE email = $email;"

mysqli_query($server, $sql);

?>
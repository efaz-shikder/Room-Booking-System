<?php

session_start();

$username = "default";
$password = "default";
$first_name = "default";
$last_name = "default";
define("DEFAULT_ACCESS_LEVEL", '0');

if (isset($_POST['signup']))
{
	include_once("connect.php");

	$username = ($_POST['username']);
	$password1 = ($_POST['password1']);
	$password2 = ($_POST['password2']);
	$first_name = ($_POST['firstName']);
	$last_name = ($_POST['lastName']);

	if ($password1 == $password2)
	{
		// Security measures in order to prevent SQL injections
		$username = stripslashes(strip_tags($_POST['username']));
		$password = stripslashes(strip_tags($_POST['password1']));
		$first_name = stripslashes(strip_tags($_POST['firstName']));
		$last_name = stripslashes(strip_tags($_POST['lastName']));

		$username = mysqli_real_escape_string($server, $username);
		$password = mysqli_real_escape_string($server, $password);
		$first_name = mysqli_real_escape_string($server, $first_name);
		$last_name = mysqli_real_escape_string($server, $last_name);

		// Worry about password encryption??


		$sql = "INSERT INTO `Teacher` (`teacherID`, `first_name`, `last_name`, `username`, `password`, `accessLevel`) VALUES (NULL, '$first_name', '$last_name', '$username', '$password', 'DEFAULT_ACCESS_LEVEL')";

		mysqli_query($server, $sql);

		// Wrap up and close connection
		mysqli_close($server);
	}
	else
	{
		header("Location: ../../index.php");
	}
	
	
}

?>
<?php
	
	$username = "default";
	$password = "default";
	$first_name = "default";
	$last_name = "default";
	define("DEFAULT_ACCESS_LEVEL", '0')

	if (isset($_POST['submit']))
	{
		include_once("connect.php");

		if("" == trim($_POST['username']))
		{
			$username = "default";
		}
		else
		{
			// Security measures in order to prevent SQL injections
			$username = strip_tags($_POST['username']);
			$password = strip_tags($_POST['password']);
			$first_name = strip_tags($_POST['firstName']);
			$last_name = strip_tags($_POST['lastName']);

			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = stripslashes($first_name);
			$password = stripslashes($last_name);

			$username = mysqli_real_escape_string($server, $username);
			$password = mysqli_real_escape_string($server, $password);
			$first_name = mysqli_real_escape_string($server, $first_name);
			$last_name = mysqli_real_escape_string($server, $last_name);

			// Worry about password encryption??
		}


		$sql = "INSERT INTO `Teacher` (`teacherID`, `first_name`, `last_name`, `username`, `password`, `accessLevel`) VALUES (NULL, '$first_name', '$last_name', '$username', '$password', 'DEFAULT_ACCESS_LEVEL')";


	}

?>
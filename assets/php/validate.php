<?php

session_start();

set_time_limit(4);
define("ADMIN", 1);
$username = "default";
$password = "default";

if (isset($_POST['submit']))
{
	include_once("connect.php");

	if("" == trim($_POST['email']))
	{
		$username = "default";
	}
	else
	{
		// Security measures in order to prevent SQL injections
		$username = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);

		$username = stripslashes($username);
		$password = stripslashes($password);

		$username = mysqli_real_escape_string($server, $username);
		$password = mysqli_real_escape_string($server, $password);

		// Worry about password encryption??
	}
	

	$sql = "SELECT * FROM Teacher WHERE email = '$username'";
	$query = mysqli_query($server, $sql);
	$row = mysqli_fetch_array($query);

	$id = $row['teacherID'];
	$database_password = $row['password'];
	$accessLevel = $row['accessLevel'];

	if ($password == $database_password) 
	{ 
		if($accessLevel == ADMIN)
		{
			$_SESSION['username'] = $email;
			header("Location: ../../homepage/index.php");
			echo "Successful login as ADMIN";
		}
		else
		{
			$_SESSION['username'] = $email;
			header("Location: ../../homepage/index.php");
			echo "Successful login as TEACHER";
		}
	}
	else
	{
		echo "Incorrect login details!";
		sleep(2);
		//header("Location: ../../index.php");
	} 
}

// Wrap up and close connection
mysqli_close($server);

?>
<?php

session_start();

$email = "default";
$password = "default";
$first_name = "default";
$last_name = "default";
define("DEFAULT_ACCESS_LEVEL", 0);

if(isset($_POST['submit'])) 
{
	include_once("connect.php");

	$email = $_POST['email'];
	$password1 = ($_POST['password1']);
	$password2 = ($_POST['password2']);
	$first_name = ($_POST['firstName']);
	$last_name = ($_POST['lastName']);

	if ($password1 == $password2)
	{
		// Security measures in order to prevent SQL injections
		$email = stripslashes(strip_tags($_POST['email']));
		$password = stripslashes(strip_tags($_POST['password1']));
		$first_name = stripslashes(strip_tags($_POST['firstName']));
		$last_name = stripslashes(strip_tags($_POST['lastName']));

		$email = mysqli_real_escape_string($server, $email);
		$password = mysqli_real_escape_string($server, $password);
		$first_name = mysqli_real_escape_string($server, $first_name);
		$last_name = mysqli_real_escape_string($server, $last_name);

		// Worry about password encryption??

		



		$sql = "INSERT INTO `Teacher` (`first_name`, `last_name`, `email`, `password`, `accessLevel`) VALUES ('$first_name', '$last_name', '$email', '$password', DEFAULT_ACCESS_LEVEL";

		mysqli_query($server, $sql);

		echo "<h1>Teacher successfully added.</h1>";
		sleep(3);
		//header("Location: ../../index.php");


		// Wrap up and close connection
		mysqli_close($server);
	}
	else
	{
		echo "<h1>Passwords do not match. Redirecting to main menu.</h1>";
		sleep(3);
		//header("Location: ../../index.php");

		// Wrap up and close connection
		mysqli_close($server);

	}
}

?>
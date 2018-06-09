<?php

session_start();

set_time_limit(4);
$ADMIN = 2;
$TEACHER = 1;
$UNVERIFIED = 4;
$UNBOOKABLE = 0;
$DENY = 3;

if (isset($_POST['submit']))
{
	include_once("connect.php");

	if(isset($_POST['login']))
	{
		$email = $_POST['login'];
	}
	else
	{
		$email = "Default";
	}

	if(isset($_POST['password']))
	{
		$password = $_POST['password'];
	}
	else
	{
		$password = "password";
	}

	// Security measures in order to prevent SQL injections
	$email = strip_tags($email);
	$password = strip_tags($password);

	$email = stripslashes($email);
	$password = stripslashes($password);

	$email = mysqli_real_escape_string($server, $email);
	$password = mysqli_real_escape_string($server, $password);

	$email = $email."@gmail.com";
	
	$sql = "SELECT * FROM teacher WHERE email = '$email'";
	$query = mysqli_query($server, $sql);
	$row = mysqli_fetch_array($query);

	$id = $row['email'];
	$database_password = $row['password'];
	$accessLevel = $row['accessLevel'];

	if (md5($password) == $database_password) 
	{ 
		if($accessLevel == $ADMIN)
		{
			$_SESSION['email'] = $email;
			$_SESSION['accessLevel'] = $accessLevel;
			header("Location: ../../homepage/admin.php");
			echo "Successful login as ADMIN";
		}
		elseif ($accessLevel == $TEACHER) 
		{
			$_SESSION['email'] = $email;
			$_SESSION['accessLevel'] = $accessLevel;
			header("Location: ../../homepage/index.php");
			echo "Successful login as TEACHER";
		}
		elseif ($accessLevel == $UNVERIFIED) 
		{
			echo "<script type='text/javascript'>alert('Please check your email to verify your account!'); window.location.assign('../../index.php'); </script>";
		}
		elseif ($accessLevel == $UNBOOKABLE) 
		{
			$_SESSION['email'] = $email;
			$_SESSION['accessLevel'] = $accessLevel;
			echo "<script type='text/javascript'>alert('You are unable to make any bookings. Please contact an administrator.'); window.location.assign('../../homepage/index.php'); </script>";
		}
		elseif ($accessLevel == $DENY) 
		{
			$_SESSION['email'] = $email;
			$_SESSION['accessLevel'] = $accessLevel;
			echo "<script type='text/javascript'>alert('You are unable to make any bookings. Please contact an administrator.'); window.location.assign('../../homepage/index.php'); </script>";
		}
	}
	else
	{
		echo "Incorrect login details! Redirecting to landing page.";
		header("refresh:2;url=../../index.php");
	}
}

	


// Wrap up and close connection
mysqli_close($server);

?>
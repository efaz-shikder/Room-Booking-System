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

<<<<<<< HEAD
	if(isset($_POST['login']))
=======
	if("" == trim($_POST['email']))
>>>>>>> master
	{
		$email = $_POST['login'];
	}
	else
	{
<<<<<<< HEAD
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
=======
		// Security measures in order to prevent SQL injections
		$username = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);
>>>>>>> master

	// Security measures in order to prevent SQL injections
	$email = strip_tags($email);
	$password = strip_tags($password);

	$email = stripslashes($email);
	$password = stripslashes($password);

	$email = mysqli_real_escape_string($server, $email);
	$password = mysqli_real_escape_string($server, $password);

<<<<<<< HEAD
	$email = $email."@gmail.com";
	
	$sql = "SELECT * FROM teacher WHERE email = '$email'";
=======
	$sql = "SELECT * FROM Teacher WHERE email = '$username'";
>>>>>>> master
	$query = mysqli_query($server, $sql);
	$row = mysqli_fetch_array($query);

	$id = $row['email'];
	$database_password = $row['password'];
	$accessLevel = $row['accessLevel'];

	if (md5($password) == $database_password) 
	{ 
		if($accessLevel == $ADMIN)
		{
<<<<<<< HEAD
			$_SESSION['email'] = $email;
			$_SESSION['accessLevel'] = $accessLevel;
			header("Location: ../../homepage/admin.php");
=======
			$_SESSION['username'] = $email;
			header("Location: ../../homepage/index.php");
>>>>>>> master
			echo "Successful login as ADMIN";
		}
		elseif ($accessLevel == $TEACHER) 
		{
<<<<<<< HEAD
			$_SESSION['email'] = $email;
			$_SESSION['accessLevel'] = $accessLevel;
=======
			$_SESSION['username'] = $email;
>>>>>>> master
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
			echo "<script type='text/javascript'>alert('You are not authorized to access ARBIS. Please contact an administrator.'); window.location.assign('../../index.php');</script>";
		}
	}
	else
	{
<<<<<<< HEAD
		echo "Incorrect login details! Redirecting to landing page.";
		header("refresh:2;url=../../index.php");
	}
=======
		echo "Incorrect login details!";
		sleep(2);
		//header("Location: ../../index.php");
	} 
>>>>>>> master
}

	


// Wrap up and close connection
mysqli_close($server);

?>
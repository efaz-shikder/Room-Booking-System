<?php
	
	session_start();
	include_once("connect.php");

	define("ADMIN", 1);


	// Figure out SQL and variables 
	$sql = "DELETE FROM `Booking` WHERE `Booking.classID` = $bookingID AND `booking`.`dateOfBooking` = \'2018-05-23\' AND `booking`.`period` = \'C\'"
	msqli_query($server, $sql);



	

	if ($_SESSION['accessLevel'] == ADMIN)
	{
		// Wrap up and close connection
		mysqli_close($server);

		// Redirect to all bookings if user is admin
		header("Location: viewBooking.php");
	}
	else
	{
		// Wrap up and close connection
		mysqli_close($server);

		// Redirect to own booking if user is not admin
		header("Location: viewOwnBooking.php");
	}

?>
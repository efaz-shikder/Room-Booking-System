<?php

session_start();

include_once("connect.php");

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    // Verify data
    $email = mysqli_escape_string($server, $_GET['email']); // Set email variable
    $hash = mysqli_escape_string($server, $_GET['hash']); // Set hash variable

    $sql = "Select * FROM teacher WHERE email= '" . $email . "' AND hash= '" . $hash . "' AND accessLevel= '0'";
    $result = mysqli_query($server, $sql);

    $update = "UPDATE teacher SET teacher.accessLevel= '1' WHERE teacher.email='$email' AND teacher.hash='$hash'";
    $updateResult = mysqli_query($server, $update);
    if ($updateResult)
    {
    	echo "You can now login to ARBIS.";
        header("refresh:4;url=../../index.php");
    }
    else
    {
    	echo "There was an error with verification.";
        header("refresh:4;url=../../index.php");
    }
}
else
{
	echo "Unauthorized Access.";
}

// Wrap up and close connection
mysqli_close($server);

?>
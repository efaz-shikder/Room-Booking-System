<?php

session_start();

define("DEFAULT_ACCESS_LEVEL", "4");

if (isset($_POST['submit']))
{
	include_once("connect.php");

	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
	}


	if(isset($_POST['password1']))
	{
		$password1 = $_POST['password1'];
	}

	if(isset($_POST['password2']))
	{
		$password2 = $_POST['password2'];
	}


	if(isset($_POST['firstName']))
	{
		$first_name = $_POST['firstName'];
	}


	if(isset($_POST['lastName']))
	{
		$last_name = $_POST['lastName'];
	}

	if ($password1 == $password2)
	{
		// Security measures in order to prevent SQL injections
		$email = stripslashes(strip_tags($email));
		$password = stripslashes(strip_tags($password1));
		$first_name = stripslashes(strip_tags($first_name));
		$last_name = stripslashes(strip_tags($last_name));

		$email = mysqli_real_escape_string($server, $email);
		$password = mysqli_real_escape_string($server, $password);
		$first_name = mysqli_real_escape_string($server, $first_name);
		$last_name = mysqli_real_escape_string($server, $last_name);

		// Worry about password encryption??

		$realEmail = $email."@gmail.com";

		// Generates a random 32 character hash
		$hash = md5(rand(0,1000));
		$password = md5($password);

		$sql = "INSERT INTO `teacher` (`first_name`, `last_name`, `email`, `password`, `hash`, `accessLevel`) VALUES ('$first_name', '$last_name', '$realEmail', '$password', '$hash', '" . DEFAULT_ACCESS_LEVEL . "')";

		$success = mysqli_query($server, $sql);

		if ($success)
		{
			$to = $realEmail;
			$subject = 'ARBIS | Verification';
			$message = 'Thank you for signing up for ARBIS!Your account has been created, you can login after activating your account.

			Please click this link to activate your account:
			http://rbs.victoriaparkci.ca/2/assets/php/verify.php?email='.$realEmail.'&hash='.$hash.'

			';

			$headers = 'From:noreply@ARBIS.com' . "\r\n";
			mail($to, $subject, $message, $headers);


			echo "
      <html lang=\"en\">
      <head>
      <meta charset=\"utf-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
      <title>ARBIS-Verification</title>
      </head>
      <style>
      body,h1 {font-family: \"Raleway\", sans-serif; text-align: center;}
      body, html {height: 100%; margin: 0; padding: 0;}
      .bgimg {
        background-image: url(\"../images/bg.jpg\");
        min-height: 100%;
        background-position: center;
        background-size: cover;
      }
      .center {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
      }
      </style>
      <body>
      <div class=\"bgimg\">
      </div>
      <h1 class=\"center\">Please check your email for the verification link.</h1>
      </body>
      </html>
      ";
      header("refresh:2;url=../../index.php");
    }
    else
    {
     echo "
     <html lang=\"en\">
     <head>
     <meta charset=\"utf-8\">
     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
     <title>ARBIS-Verification</title>
     </head>
     <style>
     body,h1 {font-family: \"Raleway\", sans-serif; text-align: center;}
     body, html {height: 100%; margin: 0; padding: 0;}
     .bgimg {
      background-image: url(\"../images/bg.jpg\");
      min-height: 100%;
      background-position: center;
      background-size: cover;
    }
    .center {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-50%);
    }
    </style>
    <body>
    <div class=\"bgimg\">
    </div>
    <h1 class=\"center\">There was an error when signing up.</h1>
    </body>
    </html>
    ";
    header("refresh:2;url=../../index.php");
  }


		// Wrap up and close connection
  mysqli_close($server);
}
else
{
  echo "
  <html lang=\"en\">
  <head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <title>ARBIS-Verification</title>
  </head>
  <style>
  body,h1 {font-family: \"Raleway\", sans-serif; text-align: center;}
  body, html {height: 100%; margin: 0; padding: 0;}
  .bgimg {
    background-image: url(\"../images/bg.jpg\");
    min-height: 100%;
    background-position: center;
    background-size: cover;
  }
  .center {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%,-50%);
  }
  </style>
  <body>
  <div class=\"bgimg\">
  </div>
  <h1 class=\"center\">Passwords entered do not match. Redirecting to landing page.</h1>
  </body>
  </html>
  "; 
  header("refresh:2;url=../../index.php");

		// Wrap up and close connection
  mysqli_close($server);

}


}

?>

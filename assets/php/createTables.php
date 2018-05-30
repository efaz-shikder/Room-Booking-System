<?php
    include "connect.php";

    $sql1 = "CREATE TABLE teacher(

        first_name VARCHAR(30) NOT NULL,

        last_name VARCHAR(30) NOT NULL,

        email VARCHAR(50) NOT NULL PRIMARY KEY,

        password VARCHAR(50) NOT NULL,

        accessLevel ENUM('0', '1') NOT NULL
    	)";

    $sql2 = "CREATE TABLE classroom(

        classID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        roomName VARCHAR(50) NOT NULL,
		
		hallway ENUM('C Hallway', 'S Hallway', 'English Hallway', 'French Hallway', 'Gym Hallway', 'Front Foyer', 'Music Hallway', 'Math Hallway', 'Science Hallway', 'Geography Hallway') NOT NULL, 
		
		isBookable ENUM('yes', 'no')
		)";

    $sql3 = "CREATE TABLE booking(

        teacherEmail  VARCHAR(50) NOT NULL,

        classID INT NOT NULL,

        dateOfBooking date NOT NULL,

        period ENUM('A', 'B', 'C', 'D') NOT NULL,

        FOREIGN KEY (teacherEmail) REFERENCES teacher(email),

        FOREIGN KEY (classID) REFERENCES classroom(classID),

        PRIMARY KEY (classID, dateOfBooking, period)
	)";

	$sql4 = "CREATE TABLE schedule(

        ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        dateDescription VARCHAR(50),
  
        specialDate date NOT NULL,
		
		typeOfDay ENUM('first day of school', 'last day of school', 'late start', 'no school', 'day zero', 'normal day') NOT NULL 
	)";

    if (mysqli_query($server, $sql1))
    {
        echo "Table teacher created successfully. </br>";
    }
    else
    {
        echo "Error when creating teacher table: " . mysqli_error($server) . "</br>";
    }

    if (mysqli_query($server, $sql2))
    {
        echo "Table classroom created successfully. </br>";
    }
    else
    {
        echo "Error when creating classroom table: " . mysqli_error($server) . "</br>";
    }

    if (mysqli_query($server, $sql3))
    {
        echo "Table booking created successfully. </br>";
    }
    else
    {
        echo "Error when creating booking table: " . mysqli_error($server) . "</br>";
    }

    if (mysqli_query($server, $sql4))
    {
        echo "Table schedule created successfully. </br>";
    }
    else
    {
        echo "Error when creating schedule table: " . mysqli_error($server) . "</br>";
    }

     // Wrap up and close connection
     mysqli_close($server);
?>
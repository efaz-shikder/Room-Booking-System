<?php
    include "connect.php";

    $sql1 = "CREATE TABLE Teacher(

        first_name VARCHAR(30) NOT NULL,

        last_name VARCHAR(30) NOT NULL,

        email VARCHAR(50) NOT NULL PRIMARY KEY,

        password VARCHAR(50) NOT NULL,

        accessLevel ENUM('0', '1') NOT NULL
    	)";

    $sql2 = "CREATE TABLE Classroom(

        classID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        roomName VARCHAR(50) NOT NULL,
		
		hallway ENUM('C Hallway', 'S Hallway', 'English Hallway', 'French Hallway', 'Gym Hallway', 'Frontt Foyer', 'Music Hallway', 'Math Hallway', 'Science Hallway', 'Geography Hallway') NOT NULL, 
		
		isBookable ENUM('yes', 'no')
		)";

    $sql3 = "CREATE TABLE Booking(

        teacherEmail  VARCHAR(50) NOT NULL,

        classID INT NOT NULL,

        dateOfBooking date NOT NULL,

        period ENUM('A', 'B', 'C', 'D') NOT NULL,

        FOREIGN KEY (teacherEmail) REFERENCES Teacher(email),

        FOREIGN KEY (classID) REFERENCES Classroom(classID),

        PRIMARY KEY (classID, dateOfBooking, period)
	)";

	$sql4 = "CREATE TABLE Schedule(

        ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        dateDescription VARCHAR(50),
  
        specialDate date NOT NULL,
		
		typeOfDay ENUM('first day of school', 'last day of school', 'late start', 'no school', 'day zero', 'normal day') NOT NULL 
	)";

    if (mysqli_query($server, $sql1))
    {
        echo "Table Teacher created successfully. </br>";
    }
    else
    {
        echo "Error when creating Teacher table: " . mysqli_error($server) . "</br>";
    }

    if (mysqli_query($server, $sql2))
    {
        echo "Table Classroom created successfully. </br>";
    }
    else
    {
        echo "Error when creating Classroom table: " . mysqli_error($server) . "</br>";
    }

    if (mysqli_query($server, $sql3))
    {
        echo "Table Booking created successfully. </br>";
    }
    else
    {
        echo "Error when creating Booking table: " . mysqli_error($server) . "</br>";
    }

    if (mysqli_query($server, $sql4))
    {
        echo "Table Schedule created successfully. </br>";
    }
    else
    {
        echo "Error when creating Schedule table: " . mysqli_error($server) . "</br>";
    }

     // Wrap up and close connection
     mysqli_close($server);
?>
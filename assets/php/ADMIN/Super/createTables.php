<?php
    include "../../connect.php";

<<<<<<< HEAD:assets/php/ADMIN/Super/createTables.php
    $sql1 = "CREATE TABLE teacher(
=======

    $sql1 = "CREATE TABLE Teacher(
>>>>>>> master:assets/php/createTables.php

        first_name VARCHAR(30) NOT NULL,

        last_name VARCHAR(30) NOT NULL,

        email VARCHAR(50) NOT NULL PRIMARY KEY,

        password VARCHAR(50) NOT NULL,

<<<<<<< HEAD:assets/php/ADMIN/Super/createTables.php
        hash VARCHAR( 32 ) NOT NULL,

        accessLevel ENUM('0', '1', '2', '3', '4') NOT NULL
    	)";
=======
        accessLevel ENUM('0', '1') NOT NULL
        )";
>>>>>>> master:assets/php/createTables.php

    $sql2 = "CREATE TABLE classroom(

        classID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        roomName VARCHAR(50) NOT NULL,
<<<<<<< HEAD:assets/php/ADMIN/Super/createTables.php
		
		hallway ENUM('C Hallway', 'S Hallway', 'English Hallway', 'French Hallway', 'Gym Hallway', 'Front Foyer', 'Music Hallway', 'Math Hallway', 'Science Hallway', 'Geography Hallway') NOT NULL, 
		
		isBookable ENUM('yes', 'no')
		)";
=======
        
        isBookable ENUM('yes', 'no')
        )";
>>>>>>> master:assets/php/createTables.php

    $sql3 = "CREATE TABLE booking(

        teacherEmail  VARCHAR(50) NOT NULL,

        classID INT NOT NULL,

        dateOfBooking date NOT NULL,

        period ENUM('A', 'B', 'C', 'D') NOT NULL,

<<<<<<< HEAD:assets/php/ADMIN/Super/createTables.php
        FOREIGN KEY (teacherEmail) REFERENCES teacher(email),
=======
        FOREIGN KEY (teacherEmail) REFERENCES Teacher(email),
>>>>>>> master:assets/php/createTables.php

        FOREIGN KEY (classID) REFERENCES classroom(classID),

        PRIMARY KEY (classID, dateOfBooking, period)
<<<<<<< HEAD:assets/php/ADMIN/Super/createTables.php
	)";

	$sql4 = "CREATE TABLE schedule(
=======
        )";

     $sql4 = "CREATE TABLE Schedule(
>>>>>>> master:assets/php/createTables.php

        ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        dateDescription VARCHAR(50),
  
        specialDate date NOT NULL,
<<<<<<< HEAD:assets/php/ADMIN/Super/createTables.php
		
		typeOfDay ENUM('first day of school', 'last day of school', 'late start', 'no school', 'day zero', 'normal day') NOT NULL 
	)";
=======
        
        typeOfDay ENUM('first day of school', 'last day of school', 'late start', 'no school', 'day zero') NOT NULL 
        )";   
>>>>>>> master:assets/php/createTables.php

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
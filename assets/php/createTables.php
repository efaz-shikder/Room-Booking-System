<?php
    include "connect.php";

    $sql1 = "CREATE TABLE Teacher(

        teacherID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        first_name VARCHAR(30) NOT NULL,

        last_name VARCHAR(30) NOT NULL,

        username VARCHAR(50) NOT NULL,

        password VARCHAR(50) NOT NULL,

        accessLevel ENUM('0', '1') NOT NULL
    )";

    $sql2 = "CREATE TABLE Classroom(

        classID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        roomName VARCHAR(50) NOT NULL
    )";

    $sql3 = "CREATE TABLE Booking(

        teacherID  INT NOT NULL,

        classID INT NOT NULL,

        dateOfBooking date NOT NULL,

        period ENUM('A', 'B', 'C', 'D') NOT NULL,

        FOREIGN KEY (teacherID) REFERENCES Teacher(teacherID),

        FOREIGN KEY (classID) REFERENCES Classroom(classID),

        PRIMARY KEY (classID, dateOfBooking, period)
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

     // Wrap up and close connection
     mysqli_close($server);
?>
CREATE TABLE Teacher(

        first_name VARCHAR(30) NOT NULL,

        last_name VARCHAR(30) NOT NULL,

        email VARCHAR(50) NOT NULL PRIMARY KEY,

        password VARCHAR(50) NOT NULL,

        accessLevel ENUM('0', '1') NOT NULL
);

CREATE TABLE Classroom(

        classID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        roomName VARCHAR(50) NOT NULL,
		
		hallway ENUM('C Hallway', 'S Hallway', 'English Hallway', 'French Hallway', 'Gym Hallway', 'Frontt Foyer', 'Music Hallway', 'Math Hallway', 'Science Hallway', 'Geography Hallway') NOT NULL, 
		
		isBookable ENUM('yes', 'no')
);

CREATE TABLE Booking(

        teacherEmail  INT NOT NULL,

        classID INT NOT NULL,

        dateOfBooking date NOT NULL,

        period ENUM('A', 'B', 'C', 'D') NOT NULL,

        FOREIGN KEY (teacherEmail) REFERENCES Teacher(email),

        FOREIGN KEY (classID) REFERENCES Classroom(classID),

        PRIMARY KEY (classID, dateOfBooking, period)
);

CREATE TABLE Schedule(

        ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

        dateDescription VARCHAR(50),
  
        specialDate date NOT NULL,
		
		typeOfDay ENUM('first day of school', 'last day of school', 'late start', 'no school', 'day zero', 'normal day') NOT NULL 
);


 /* add teachers */
 INSERT INTO Teacher(teacherID, first_name, last_name, email, password, accessLevel)
	VALUES (NULL, 'Efaz', 'Shikder', 'efaz.shikder@tdsb.on.ca', '123', '1');
INSERT INTO Teacher(teacherID, first_name, last_name, email, password, accessLevel)
	VALUES (NULL, 'Ashfi', 'Pathan', 'ashfi.pathan@tdsb.on.ca', '123', '1');
	
/* add classrooms */
INSERT INTO Classroom(classID, roomName)
	VALUES (NULL, 'Library Atwood');
INSERT INTO Classroom(classID, roomName)
	VALUES (NULL, 'C16');
	
/* add bookings */
INSERT INTO Booking(teacherID, classID, dateOfBooking, period)
	VALUES ('1', '2', '2018-05-23', 'A');
INSERT INTO Booking(teacherID, classID, dateOfBooking, period)
	VALUES ('2', '1', '2018-06-07', 'C');

	
/* add special dates */
INSERT INTO SpecialDate(ID, dateDescription, specialDate, typeOfDay)
	VALUES (NULL, 'Victoria Day', '2018-05-21', 'no school');
INSERT INTO SpecialDate(ID, dateDescription, specialDate, typeOfDay)
	VALUES (NULL, 'Staff Meeting', '2018-05-29', 'late start');

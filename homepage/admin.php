<?php
session_start();
include_once("../assets/php/connect.php");

// Checks if the session is valid
if (!isset($_SESSION['email']) && !isset($_SESSION['accessLevel']))
{
	header("Location: ../index.php");
}

$accessLevel = $_SESSION['accessLevel'];
?>


<!doctype html>
<html lang="en">
<head>

	<title>ARBIS-Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="homepageStyle.css">

</head>

<body onload="blockDates();">

	<!-- Navigation Menu -->
	<div id="ArbisNav" class="sidenav">
		<div class="outer" onclick="toggleNav();">
			<div class="inner">
				<label>Back</label>
			</div>
		</div>
		<a href="admin.php">Home</a>
		<a href="../assets/php/ADMIN/viewOwnBookingAdmin.php">Own Booked Rooms</a>
		<a href="../assets/php/ADMIN/viewBookingAdmin.php">All Booked Rooms</a>
		<a href="../assets/php/ADMIN/viewRooms.php">Edit Rooms</a>
		<a href="../assets/php/ADMIN/viewTeachers.php">Edit Teachers</a>
		<a href="../assets/php/ADMIN/viewSpecialDay.php">Edit Days</a>
		<a href="../ARBIS_Help_Admin.html">Help</a>
	</div>

	<section class="padding">

		<div class="container vertical-center d-flex align-items-center flex-column justify-content-center">
			<div class="container">

				<!-- Navigation Menu Icon -->
				<div class="row">
					<div class="col">
						<div id="navIcon">
							<div id="nav-icon3" onclick="toggleNav()">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>
					<div class="col">
						<input type="button" value="Logout" class="logout" onclick="window.location.href='../assets/php/logout.php'" />
					</div>
				</div>
				<!-- Row 1 -->
				<div class="row">
					<!-- calender -->
					<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<!-- calendar -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="calendar_container">
									<!-- Date Picked Display -->
									<p class="demo-picked">
										Date picked: <span data-calendar-label="picked"></span>
									</p>

									<div class="cal">
										<div class="cal__header">
											<button class="btn btn-action btn-link btn-lg" data-calendar-toggle="previous"><img src="leftArrow.svg" height="24" width="99"></button>
											<div class="cal__header__label" data-calendar-label="month">

											</div><button class="btn btn-action btn-link btn-lg" data-calendar-toggle="next"><img src="rightArrow.svg" height="24" width="99"></button>
										</div>
										<div class="cal__week">
											<span>Mon</span> <span>Tue</span><span>Wed</span> <span>Thu</span> <span>Fri</span> <span>Sat</span> <span>Sun</span>
										</div>
										<div id="checking" class="cal__body" data-calendar-area="month"></div>
									</div>
								</div>
							</div>
							<!-- period buttons -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="periodButtons" style="padding-top: 5px;">
									<button class="btn-animate" id="A" onclick="setPeriod(this);">A</button>
									<button class="btn-animate" id="B" onclick="setPeriod(this);">B</button>
									<button class="btn-animate" id="C" onclick="setPeriod(this);">C</button>
									<button class="btn-animate" id="D" onclick="setPeriod(this);">D</button>
								</div>
								<div class="periodButtons">
									<button class="btn-animate" id="BS" onclick="setPeriod(this);">Before School</button>
									<button class="btn-animate" id="L" onclick="setPeriod(this);">Lunch</button>
									<button class="btn-animate" id="AS" onclick="setPeriod(this);">After School</button>
								</div>
							</div>
						</div>
					</div>
					<!-- hallways and rooms -->
					<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<!-- hallways -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="permission">
								<ul id="gridHallways" class="hallways">
									<li class="cHallway" id="cHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('C Hallway'); loadTable('C Hallway', getDate(), getPeriod());"><a href="#">&nbsp;C Hallway</a></li>
									<li class="sHallway" id="sHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('S Hallway'); loadTable('S Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">S Hallway</a></li>
									<li class="englishHallway" id="englishHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('English Hallway'); loadTable('English Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">English Hallway</a></li>
									<li class="frenchHallway" id="frenchHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('French Hallway'); loadTable('French Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">French Hallway</a></li>
									<li class="gymHallway" id="gymHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('Gym Hallway'); loadTable('Gym Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">Gym Hallway</a></li>
									<li class="frontFoyer" id="frontFoyer" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('Front Foyer'); loadTable('Front Foyer', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">Front Foyer</a></li>
									<li class="musicHallway" id="musicHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('Music Hallway'); loadTable('Music Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">Music Hallway</a></li>
									<li class="mathHallway" id="mathHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('Math Hallway'); loadTable('Math Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">Math Hallway</a></li>
									<li class="scienceHallway" id="scienceHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('Science Hallway'); loadTable('Science Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">Science Hallway</a></li>
									<li class="geographyHallway" id="geographyHallway" onmouseover="hallwayHover(this)" onmouseout="hallwayHoverOut(this)" onclick="ungrayRooms('Geography Hallway'); loadTable('Geography Hallway', getDate(), getPeriod()); grayOutBookedRooms();"><a href="#">Geography Hallway</a></li>
								</ul>
							</div>
							<!-- rooms -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div id="roomsContainer" class="roomsContainer">
									<ul id="rooms" class="gridRooms1">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='C Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$roomString = "$roomName";
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(1); setRoomName(\''. $roomString .'\');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms2" class="gridRooms2">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='S Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(2); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms3" class="gridRooms3">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='English Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(3); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms4" class="gridRooms4">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='French Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(4); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms5" class="gridRooms5">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='Gym Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(5); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms6" class="gridRooms6">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='Front Foyer' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(6); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms7" class="gridRooms7">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='Music Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(7); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms8" class="gridRooms8">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='Math Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(8); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms9" class="gridRooms9">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='Science Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(9); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>
									<ul id="rooms10" class="gridRooms10">
										<?php

										$currentTeacherID = $_SESSION['email'];
										$sql = "SELECT * FROM classroom WHERE classroom.hallway='Geography Hallway' AND classroom.isBookable='yes'";
										$result = mysqli_query($server, $sql);
										while($row = mysqli_fetch_array($result))
										{
											$roomName = $row['roomName'];
											$classID = $row['classID'];
											echo '<li id='. $classID .' >';
											echo '<a id="'.$classID.'R" href='."#".' onclick="setClassID('.$classID.'); setHallwaysAvailable(10); setRoomName(' . $roomName . ');">'.$roomName.'</a>';
											echo '</li>';
										}

										?>
									</ul>

								</div>
							</div>
						</div>
						<!-- submit button -->
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="submitButton">
									<button class="spin" id="spin" value="submit" onclick="bookAJAXAdmin(getDate(), getClassID(), getPeriod());">
										<span>Submit</span>
										<span>
											<svg viewBox="0 0 24 24">
												<path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
											</svg>
										</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row 2 -->
				<div class="row">
					<!-- map info display -->
					<div class="col-xl-4 col-lg-12 d-none d-lg-block">
						<div class="center row">
							<div class="col-xs-12">
								<div class="container schedule">
									<img style="width:100%;height:auto;"src="../assets/images/schedule.PNG">
								</div>
							</div>
							<div class="center col-xs-12">
								<p id="placeholderParagraph" class="center d-none d-lg-block">Academic Room Booking and Inquiry System</p>
							</div>
						</div>	
					</div>
					<!-- map -->
					<div class="col-xl-8 col-lg-12 d-none d-lg-block">
						<svg class="center" style="width: 82%;" version="1.1" viewBox="0 0 1925.4308 714.88776">

							<!--English Hallway -->
							<path id="Day Care Office"
							class="English Hallway"
							d="m 853.59875,209.93248 h 77.13357 v 37.80685 h -77.13357 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Washroom #3"
							class="English Hallway"
							d="m 519.03668,324.87292 h 38.18682 v 34.19715 h -38.18682 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Art Office"
							class="English Hallway"
							d="m 854.1687,250.5891 h 77.13357 v 33.81717 H 854.1687 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="105"
							class="English Hallway"
							d="m 339.02478,249.1179 h 48.36207 v 39.76437 h -48.36207 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="107"
							class="English Hallway"
							d="m 390.34232,248.58055 h 59.91523 v 41.10776 h -59.91523 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="109"
							class="English Hallway"
							d="m 452.67566,250.19261 h 60.72126 v 38.95833 h -60.72126 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="111"
							class="English Hallway"
							d="m 516.08368,249.65526 h 60.98994 v 38.68965 h -60.98994 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="114"
							class="English Hallway"
							d="m 519.60663,405.42618 h 56.99524 v 34.19715 h -56.99524 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="115"
							class="English Hallway"
							d="m 632.24582,251.91899 h 51.88149 v 31.72735 h -51.88149 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="116"
							class="English Hallway"
							d="m 518.27673,361.72983 h 58.7051 v 39.5167 h -58.7051 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="116A"
							class="English Hallway"
							d="m 560.45319,325.0629 h 46.7361 v 34.00716 h -46.7361 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="118"
							class="English Hallway"
							d="m 611.36896,325.63284 h 47.30605 v 34.19715 h -47.30605 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="119"
							class="English Hallway"
							d="m 689.72903,251.91899 h 46.16055 v 31.72735 h -46.16055 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="121"
							class="English Hallway"
							d="m 742.02868,251.34901 h 49.79167 v 32.48729 h -49.79167 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="123"
							class="English Hallway"
							d="m 797.89423,250.77907 h 53.2347 v 33.81717 h -53.2347 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Day Care Room"
							class="English Hallway"
							d="m 674.44373,325.44287 h 256.4786 v 31.34739 h -256.4786 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of English Hallway -->

							<!--French Hallway-->
							<path id="126"
							class="French Hallway"
							d="m 969.10913,533.59837 h 72.38397 v 48.84271 h -72.38397 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>

							<path id="127"
							class="French Hallway"
							d="m 969.48907,484.08794 h 72.57393 v 44.70124 h -72.57393 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="128"
							class="French Hallway"
							d="m 968.72913,432.81459 h 72.76397 v 46.20896 h -72.76397 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="129"
							class="French Hallway"
							d="m 969.10913,382.74633 h 72.57397 v 45.60642 h -72.57397 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="130"
							class="French Hallway"
							d="m 969.29913,334.72971 h 73.33387 v 44.53171 h -73.33387 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="131"
							class="French Hallway"
							d="m 968.53913,285.87217 h 73.33387 l 0.76,43.13103 h -73.33387 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="132"
							class="French Hallway"
							d="m 968.53918,236.35705 h 74.09382 v 43.97854 h -74.09382 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C15"
							class="French Hallway"
							d="m 878.29669,399.72665 h 52.8156 v 33.81718 h -52.8156 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C16"
							class="French Hallway"
							d="m 876.77679,359.07007 h 53.9555 v 37.04691 h -53.9555 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Computer Science Office"
							class="French Hallway"
							d="m 878.67664,437.91348 h 52.24564 v 57.37522 h -52.24564 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of French Hallway -->

							<!--Gym-->
							<path id="Phys-ed Office"
							class="Gym Hallway"
							d="m 346.72107,38.56678 h 38.75677 v 67.63435 h -38.75677 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Double Gym"
							class="Gym Hallway"
							d="M 388.80255,54.905418 H 537.18018 V 176.68526 H 388.80255 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Girl's Single Gym"
							class="Gym Hallway"
							d="m 542.02478,55.095406 h 74.28381 V 175.54536 h -74.28381 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Change Room"
							class="Gym Hallway"
							d="m 348.62091,126.33946 h 37.80685 v 48.82593 h -37.80685 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Swimming Pool"
							class="Gym Hallway"
							d="m 637.01685,1.1399059 h 71.05407 V 175.73533 h -71.05407 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Boy's Single Gym"
							class="Gym Hallway"
							d="m 711.6806,53.385544 h 73.1439 V 175.92532 h -73.1439 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of Gym Hallway -->

							<!--S Hallway -->
							<path id="Teacher's Office"
							class="S Hallway"
							d="m 207.84267,124.81958 h 73.71385 v 34.38713 h -73.71385 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="S1"
							class="S Hallway"
							d="m 224.94124,0 h 60.79493 v 90.24247 h -60.79493 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="S2"
							class="S Hallway"
							d="m 208.22263,161.8665 h 73.52386 v 33.43721 h -73.52386 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="S3"
							class="S Hallway"
							d="m 166.99606,0.18998528 h 54.33547 V 90.052488 h -54.33547 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="S4"
							class="S Hallway"
							d="m 131.46904,125.19955 h 73.1439 v 69.91417 h -73.1439 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="S5(Fitness Room)"
							class="S Hallway"
							d="m 105.06124,0.94992065 h 59.08507 V 90.432457 h -59.08507 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="S6"
							class="S Hallway"
							d="m 62.314804,125.38954 h 65.734516 v 70.29414 H 62.314804 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="S7"
							class="S Hallway"
							d="M 38.756767,1.1399059 H 101.8315 V 90.052488 H 38.756767 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Robotics Lab"
							class="S Hallway"
							d="M 0,1.5198727 H 34.957085 V 195.68368 H 0 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of S Hallway -->

							<!--C Hallway -->
							<path id="Jetfac"
							class="C Hallway"
							d="m 579.6416,363.24969 h 120.44995 v 75.99366 H 579.6416 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Washroom #4"
							class="C Hallway"
							d="m 602.05975,443.80298 h 56.80526 v 56.23531 h -56.80526 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C1"
							class="C Hallway"
							d="m 681.28314,441.33319 h 52.05566 v 54.14548 h -52.05566 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C2"
							class="C Hallway"
							d="m 640.24658,532.14557 h 38.94675 v 66.11449 h -38.94675 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C3"
							class="C Hallway"
							d="m 736.94849,439.43335 h 43.88633 v 56.23531 h -43.88633 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C4"
							class="C Hallway"
							d="m 682.42303,533.09552 h 35.71703 v 64.97458 h -35.71703 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C5"
							class="C Hallway"
							d="m 783.49463,439.05338 h 41.98649 v 56.2353 h -41.98649 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C6"
							class="C Hallway"
							d="m 720.98981,532.33557 h 34.7671 v 65.35455 h -34.7671 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C7"
							class="C Hallway"
							d="m 829.47076,438.29346 h 43.88634 v 56.80526 h -43.88634 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C8"
							class="C Hallway"
							d="m 757.65674,532.71552 h 35.907 v 64.78459 h -35.907 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C10"
							class="C Hallway"
							d="m 795.84357,533.09552 h 36.28697 v 64.59461 h -36.28697 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C12"
							class="C Hallway"
							d="m 834.98029,533.85547 h 52.24564 v 64.78459 h -52.24564 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="C13"
							class="C Hallway"
							d="m 891.97552,534.04541 h 54.52546 v 65.16457 h -54.52546 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of C Hallway -->

							<!--Front foyer -->
							<path id="Washroom #1"
							class="Front foyer"
							d="m 336.84189,443.04306 h 39.5167 v 64.78459 h -39.5167 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Washroom #2"
							class="Front foyer"
							d="m 229.50085,447.79266 h 41.9865 v 59.08508 h -41.9865 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Library & Alcove"
							class="Front foyer"
							d="m 337.79181,326.39279 h 38.56678 v 114.75043 h -38.56678 z m 38.56677,38.56677 h 120.82994 v 76.18366 H 376.35858 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Atwood Lab"
							class="Front foyer"
							d="m 379.58832,327.15271 h 57.56519 v 34.57711 h -57.56519 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Hadfield Lab"
							class="Front foyer"
							d="m 440.38327,327.34271 h 57.94517 v 34.95709 h -57.94517 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Display Case & Tables"
							class="Front foyer"
							d="m 378.6384,443.99298 h 57.37521 v 63.07474 H 378.6384 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Board Room"
							class="Front foyer"
							d="m 438.6734,444.56293 h 59.27506 v 61.74485 H 438.6734 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Conference Room"
							class="Front foyer"
							d="m 519.22662,443.61301 h 78.84343 v 56.80526 h -78.84343 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Staff Room"
							class="Front foyer"
							d="m 214.30212,329.8125 h 57.37522 v 114.94041 h -57.37522 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Special-Ed Room"
							class="Front foyer"
							d="m 183.71468,649.93573 h 165.66618 v 62.3148 H 183.71468 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Main Office"
							class="Front foyer"
							d="M 412.4556,542.59473 H 517.13686 V 711.87061 H 412.4556 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Guidance"
							class="Front foyer"
							d="m 521.31647,542.02478 h 98.2218 v 170.03581 h -98.2218 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Cafeteria"
							class="Front foyer"
							d="M 144.00798,543.54462 H 349.76082 V 646.32605 H 144.00798 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of front foyer -->

							<!-- Music hallway -->
							<path id="Caretaker's Room"
							class="Music Hallway"
							d="M 26.787764,447.98264 H 146.28779 v 79.41337 H 26.787764 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Kitchen"
							class="Music Hallway"
							d="m 147.80766,446.65274 h 79.41338 v 60.98491 h -79.41338 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="M2"
							class="Music Hallway"
							d="m 26.407797,547.91425 h 65.924499 v 76.75359 H 26.407797 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="M1"
							class="Music Hallway"
							d="m 26.217813,628.08759 h 66.494454 v 43.31638 H 26.217813 Z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Music Office"
							class="Music Hallway"
							d="m 26.59778,674.82367 h 65.9245 v 36.66694 h -65.9245 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Dance Room"
							class="Music Hallway"
							d="m 125.76952,648.79584 h 55.28539 v 62.69477 h -55.28539 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of Music Hallway -->

							<!-- Science Hallway -->
							<path id="201"
							class="Science Hallway"
							d="m 1011.0204,56.197357 h 56.0268 v 50.112203 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path  id="SLC Office"
							class="Science Hallway"
							d="m 1071.0493,56.475769 h 56.0268 v 50.112201 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Health room"
							class="Science Hallway"
							d="m 1131.5223,56.754169 h 56.0268 v 50.112201 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="207"
							class="Science Hallway"
							d="m 1192.6627,56.475769 h 56.0268 v 50.112201 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="211"
							class="Science Hallway"
							d="m 1253.0459,56.254875 h 56.0268 v 49.119185 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="213"
							class="Science Hallway"
							d="m 1317.1716,56.83765 h 56.0268 v 49.11919 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="217"
							class="Science Hallway"
							d="m 1377.4136,56.423931 h 56.0268 v 49.119189 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Science Office"
							class="Science Hallway"
							d="m 1438.0884,56.800766 h 56.0268 v 49.119184 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Math Office"
							class="Science Hallway"
							d="m 1497.8949,57.021664 h 56.0268 v 49.119186 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="202"
							class="Science Hallway"
							d="m 1052.4149,134.96126 h 56.0268 v 50.1122 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="204"
							class="Science Hallway"
							d="m 1116.6682,134.68285 h 56.0268 v 50.1122 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="208"
							class="Science Hallway"
							d="m 1178.4752,134.96121 h 56.0268 v 50.1122 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Washroom #6"
							class="Science Hallway"
							d="m 1243.1809,136.73801 h 56.0268 v 49.11918 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="201A"
							class="Science Hallway"
							d="m 1307.453,137.20235 h 56.0268 v 49.11918 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="212"
							class="Science Hallway"
							d="m 1371.425,136.95842 h 56.0268 v 49.11919 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="216"
							class="Science Hallway"
							d="m 1433.9952,136.7435 h 56.0268 v 49.11919 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="218"
							class="Science Hallway"
							d="m 1496.8597,137.28926 h 56.0268 v 49.11919 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>

							<path id="Washroom #5"
							class="Science Hallway"
							d="m 1498.9067,8.2979774 h 54.6079 V 49.846016 h -54.6079 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!-- End of Science Hallway -->

							<!-- Math hallway -->
							<path id="Washroom #7"
							class="Math Hallway"
							d="m 1496.8599,191.86612 h 56.0268 v 49.11919 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="220"
							class="Math Hallway"
							d="m 1498.8608,602.69348 h 56.0268 v 112.19427 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="222"
							class="Math Hallway"
							d="m 1497.749,485.89902 h 56.0268 v 108.3351 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="224"
							class="Math Hallway"
							d="m 1497.9714,367.74011 h 56.0268 v 108.3351 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="227"
							d="m 1593.3923,6
							class="Math Hallway"22.63574 h 56.0268 v 76.40763 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="228"
							class="Math Hallway"
							d="m 1497.5266,250.26334 h 56.0268 v 108.33509 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="229"
							class="Math Hallway"
							d="m 1592.6326,536.48181 h 56.0268 v 76.40762 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="231"
							class="Math Hallway"
							d="m 1593.226,450.97638 h 56.0268 V 527.384 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="233"
							class="Math Hallway"
							d="m 1593.1724,363.94418 h 56.0268 v 76.40763 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="235"
							class="Math Hallway"
							d="m 1594.2637,277.05652 h 56.0268 v 76.40762 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="237"
							class="Math Hallway"
							d="m 1592.744,191.63527 h 56.0268 v 76.40762 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="239"
							class="Math Hallway"
							d="m 1592.9666,102.94788 h 56.0268 v 76.40763 h -56.0268 z"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of English Hallway -->
							<!--Geography Hallway -->
							<path id="Social Studies & Humanities Office"
							d="m 1772.481,52.27 v 83.5736 h 60.674 V 52.27 Z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="Washroom #8"
							d="m 1771.948,147.3845 v 60.9706 h 62.271 v -60.9706 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="312"
							d="m 1771.948,216.7739 v 83.5736 h 60.674 v -83.5736 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="310"
							d="m 1772.48,306.6957 v 83.5736 h 60.674 v -83.5736 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="308"
							d="m 1771.416,398.2043 v 83.5736 h 60.674 v -83.5736 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="306"
							d="m 1771.948,489.184 v 83.5735 h 60.674 V 489.184 Z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="302"
							d="m 1771.948,579.6347 v 83.5736 h 60.674 v -83.5736 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="History & Geography Office"
							d="m 1868.111,73.1313 v 64.0734 h 56.821 V 73.1313 Z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="311"
							d="m 1868.111,143.1658 v 78.4776 h 56.821 v -78.4776 z"
							class="Geography Hallway"
							/>
							<path id="309"
							d="m 1868.609,228.1012 v 78.4776 h 55.825 v -78.4776 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="307"
							d="m 1868.609,311.5466 v 78.4775 h 56.822 v -78.4775 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="305"
							d="m 1868.609,395.4886 v 78.4776 h 56.822 v -78.4776 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="303"
							d="m 1868.111,479.4306 v 78.4776 h 56.821 v -78.4776 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<path id="301"
							d="m 1867.612,565.3594 v 78.4776 h 56.822 v -78.4776 z"
							class="Geography Hallway"
							onmouseover="availabilityDisplay(this)" onmouseout="remove(this)"
							/>
							<!--End of Geography Hallway -->
						</svg>
					</div>
				</div>

			</div>
		</div>

	</section>

	<script src="jquery.min.js"></script>
	<script src="homepageScript.js"></script>
	<script>
		var date1 = new Date(2017, 8, 6);
		var date2 = new Date(2018, 5, 20);
		var day;
		var year;
		var month;
		var between = [];
		var schedule = [];

		while(date1 <= date2) {
			day = date1.getDate();
			month = date1.getMonth();
			year = date1.getFullYear();

			date1.setDate(date1.getDate() + 1);  
			between.push(year+"-"+(month+1)+"-"+day);
		}
		
		function checkIfWeekend(dateToCheck)
		{
			var date = new Date(); 
			date.setDate(dateToCheck.substr(8));
			return (date.getDate() == 0 || date.getDate() == 6);
		}
		
		function checkIfNoSchool(dateToCheck)
		{

			for (var n = 0; n < noSchoolArray.length; n++) 
			{
				if (noSchoolArray[n] == dateToCheck)
				{
					return true;
				}
			}
			
			return false;
		}
		
		function createDaySchedule()
		{
			var dayOfSchedule = 1; 
			
			for (var i = 0; i < between.length; i++)
			{
				if (!(checkIfWeekend(between[i])) && !(checkIfNoSchool(between[i])))
				{
					// normal school day
					schedule.push([between[i], dayOfSchedule]);
					
					if (dayOfSchedule == 4)
					{
						dayOfSchedule = 1;
					}
					else
					{
						dayOfSchedule++; 
					}
				}
			}

		}


		console.log(between);

	</script>
</body>

</html>

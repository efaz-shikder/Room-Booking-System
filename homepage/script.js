//display room name, type, and availability when hovered
function availabilityDisplay(elem) {
	var elementID = elem.getAttribute("id");
	var roomType = elem.getAttribute("class");

	if (roomType != "Math Hallway" && roomType != "Science Hallway" && roomType !="Geography Hallway")
	{
		var floorNumber = "First floor";
	}
	else if(roomType == "Geography Hallway")
	{
		floorNumber = "Third floor";
	}
	else if(roomType == "Math Hallway" || roomType == "Science Hallway")
	{
		floorNumber= "Second floor"
	}// End of if (roomType != "Math Hallway" && roomType != "Science Hallway")

	document.getElementById("placeholderParagraph").innerHTML = elementID +" | "+ roomType +" | " + floorNumber;

}

var englishRoom = document.getElementsByClassName("English Hallway");
var mathRoom = document.getElementsByClassName("Math Hallway");
var scienceRoom = document.getElementsByClassName("Science Hallway");
var sRoom = document.getElementsByClassName("S Hallway");
var cRoom = document.getElementsByClassName("C Hallway");
var gymRoom = document.getElementsByClassName("Gym Hallway");
var frenchRoom = document.getElementsByClassName("French Hallway");
var musicRoom = document.getElementsByClassName("Music Hallway");
var frontFoyerRoom = document.getElementsByClassName("Front foyer");
var geographyRoom = document.getElementsByClassName("Geography Hallway");


function hallwayHover(elem){
	var hallwayType = elem.getAttribute("id");
	if (hallwayType == "C_Hallway")
	{
		for (i = 0; i < cRoom.length; i++)
		{
			cRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "C Hallway | First Floor ";
		}
	}
	else if(hallwayType == "S_Hallway")
	{
		for (i = 0; i < sRoom.length; i++)
		{
			sRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "S Hallway | First Floor ";
		}
	}
	else if(hallwayType == "English_Hallway")
	{
		for (i = 0; i < englishRoom.length; i++)
		{
			englishRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "English Hallway | First Floor ";
		}
	}
	else if(hallwayType == "French_Hallway")
	{
		for (i = 0; i < frenchRoom.length; i++)
		{
			frenchRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "French Hallway | First Floor ";
		}
	}
	else if(hallwayType == "Gym_Hallway")
	{
		for (i = 0; i < gymRoom.length; i++)
		{
			gymRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Gym Hallway | First Floor ";
		}
	}
	else if(hallwayType == "Front_Foyer")
	{
		for (i = 0; i < frontFoyerRoom.length; i++)
		{
			frontFoyerRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Front Foyer | First Floor ";
		}
	}
	else if(hallwayType == "Music_Hallway")
	{
		for (i = 0; i < musicRoom.length; i++)
		{
			musicRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Music Hallway | First Floor ";
		}
	}
	else if(hallwayType == "Math_Hallway")
	{
		for (i = 0; i < mathRoom.length; i++)
		{
			mathRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Math Hallway | Second Floor ";

		}
	}
	else if(hallwayType == "Science_Hallway")
	{
		for (i = 0; i < scienceRoom.length; i++)
		{
			scienceRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Science Hallway | Second Floor ";
		}
	}
	else if(hallwayType =="Geography_Hallway")
	{
		for (i = 0; i < geographyRoom.length; i++)
		{
			geographyRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Geography Hallway | Third Floor ";
		}
	}
}

function hallwayHoverOut()
{

	var map = document.getElementsByTagName("path");
	for (i = 0; i < map.length; i++) {
		map[i].style.fill = "#5e7172";
	}
	document.getElementById("placeholderParagraph").innerHTML = "Academic Room Booking and Inquiry System";
}

$(document).ready(function(){
	$('#nav-icon3').click(function(){
		$(this).toggleClass('open');
	});
});

/** Navigation Icon **/
var action = 1;

function toggleNav() {
	if ( action == 1 ) {
		document.getElementById("ArbisNav").style.width = "250px";
		document.getElementById("main").style.marginLeft = "250px";
		action = 2;
	}
	else {
		document.getElementById("ArbisNav").style.width = "0";
		document.getElementById("main").style.marginLeft = "0px";
		action = 1;
	}
	$("#mainContent").toggle();
}

/** Calendar **/
var vanillacalendar = {
	month: document.querySelectorAll('[data-calendar-area="month"]')[0],
	next: document.querySelectorAll('[data-calendar-toggle="next"]')[0],
	previous: document.querySelectorAll('[data-calendar-toggle="previous"]')[0],
	label: document.querySelectorAll('[data-calendar-label="month"]')[0],
	activeDates: null,
	date: new Date(),
	todaysDate: new Date(),

	init: function () {
		this.date.setDate(1)
		this.createMonth()
		this.createListeners()
	},

	createListeners: function () {
		var _this = this
		this.next.addEventListener('click', function () {
			_this.clearCalendar()
			var nextMonth = _this.date.getMonth() + 1
			_this.date.setMonth(nextMonth)
			_this.createMonth()
		})
    // Clears the calendar and shows the previous month
    this.previous.addEventListener('click', function () {
    	_this.clearCalendar()
    	var prevMonth = _this.date.getMonth() - 1
    	_this.date.setMonth(prevMonth)
    	_this.createMonth()
    })
},

createDay: function (num, day, year) {
	var newDay = document.createElement('div')
	var dateEl = document.createElement('span')
	dateEl.innerHTML = num
	newDay.className = 'cal__date'
	newDay.setAttribute('data-calendar-date', this.date)

	if (num === 1) {
		var offset = ((day - 1) * 14.28)
		if (offset > 0) {
			newDay.style.marginLeft = offset + '%'
		}
	}

	if ( (this.date.getTime() <= this.todaysDate.getTime() - 1) || (this.date.getDay() == 0) || (this.date.getDay() == 6) ) {
		newDay.classList.add('cal__date--disabled')
	} else {
		newDay.classList.add('cal__date--active')
		newDay.setAttribute('data-calendar-status', 'active')
	}

	if (this.date.toString() === this.todaysDate.toString()) {
		newDay.classList.add('cal__date--today')
	}

	newDay.appendChild(dateEl)
	this.month.appendChild(newDay)
},

dateClicked: function () {
	var _this = this
	this.activeDates = document.querySelectorAll('[data-calendar-status="active"]')
	for (var i = 0; i < this.activeDates.length; i++) {
		this.activeDates[i].addEventListener('click', function (event) {
				// cut off first 4 and last 24 characters of date
				var simplifiedDate = this.dataset.calendarDate;
				JSON.stringify(simplifiedDate);				
				simplifiedDate = simplifiedDate.slice(4,-24);
				var shortenedMonth = simplifiedDate.substr(0,3);
				switch (shortenedMonth) {
					case "Jan":
					shortenedMonth = "01";
					break;
					case "Feb":
					shortenedMonth = "02";
					break;
					case "Mar":
					shortenedMonth = "03";
					break;
					case "Apr":
					shortenedMonth = "04";
					break;
					case "May":
					shortenedMonth = "05";
					break;
					case "Jun":
					shortenedMonth = "06";
					break;
					case "Jul":
					shortenedMonth = "07";
					break;
					case "Aug":
					shortenedMonth = "08";
					break;
					case "Sep":
					shortenedMonth = "09";
					break;
					case "Oct":
					shortenedMonth = "10";
					break;
					case "Nov":
					shortenedMonth = "11";
					break;
					case "Dec":
					shortenedMonth = "12";
					break;
				}
				simplifiedDate = simplifiedDate.substr(7) + " - " + shortenedMonth + " - " + simplifiedDate.substr(3,4)
				var dateFinal = simplifiedDate;
				var picked = document.querySelectorAll('[data-calendar-label="picked"]')[0]
				picked.innerHTML = simplifiedDate
				_this.removeActiveClass()
				this.classList.add('cal__date--selected')
			})
	}
},

createMonth: function () {
	var currentMonth = this.date.getMonth()
	while (this.date.getMonth() === currentMonth) {
		this.createDay(this.date.getDate(), this.date.getDay(), this.date.getFullYear())
		this.date.setDate(this.date.getDate() + 1)
	}
    // while loop trips over and day is at 30/31, bring it back
    this.date.setDate(1)
    this.date.setMonth(this.date.getMonth() - 1)

    this.label.innerHTML = this.monthsAsString(this.date.getMonth()) + ' ' + this.date.getFullYear()
    this.dateClicked()
},

monthsAsString: function (monthIndex) {
	return [
	'January',
	'Febuary',
	'March',
	'April',
	'May',
	'June',
	'July',
	'August',
	'September',
	'October',
	'November',
	'December'
	][monthIndex]
},

clearCalendar: function () {
	vanillacalendar.month.innerHTML = ''
},

removeActiveClass: function () {
	for (var i = 0; i < this.activeDates.length; i++) {
		this.activeDates[i].classList.remove('cal__date--selected')
	}
}
}

// loads the calendar
window.addEventListener('load', function () {
	vanillacalendar.init();
})

/* Click Hallway */
function clickCHallway()
{
	var btn = document.getElementById('C_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}

function clickSHallway()
{
	var btn = document.getElementById('S_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickEnglishHallway()
{
	var btn = document.getElementById('English_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickFrenchHallway()
{
	var btn = document.getElementById('French_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickGymHallway()
{
	var btn = document.getElementById('Gym_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickFrontFoyer()
{
	var btn = document.getElementById('Front_Foyer');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickMusicHallway()
{
	var btn = document.getElementById('Music_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickMathHallway()
{
	var btn = document.getElementById('Math_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickScienceHallway()
{
	var btn = document.getElementById('Science_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}


function clickGeographyHallway()
{
	var btn = document.getElementById('Geography_Hallway');
	btn.addEventListener('click', function() {
		document.location.href = 'viewRooms.php';
	});
}

/** Show/Hide Toggles for room menu **/
var hallwayArray = ["#cHallway", "#sHallway", "#englishHallway"];
var roomsArray = ["#rooms", "#rooms2", "#rooms3"];

function toggleRoomsOff()
{
	for (var i = 0; i < roomsArray.length; i++)
	{

			if($(roomsArray[i]).is(':visible'))
			{
				$(roomsArray[i]).toggle();
				var n = hallwayArray[i];
				n = "." + n.substring(1);
				$(n).removeClass("current");
			}
	}
}

function toggleCurrentRoom(roomName)
{
	var roomsToToggle = roomName;
	if($(roomName).is(':hidden')) {
		$(roomName).fadeToggle();
	}

}

function toggleRooms(roomName)
{
	toggleRoomsOff();
	toggleCurrentRoom(roomName);
}

$(hallwayArray[0]).click(function(){
	toggleRooms(roomsArray[0]);
	$(".cHallway").addClass("current");
})

$(hallwayArray[1]).click(function(){
	toggleRooms(roomsArray[1]);
	$(".sHallway").addClass("current");
})

$(hallwayArray[2]).click(function(){
	toggleRooms(roomsArray[2]);
	$(".englishHallway").addClass("current");
})

/** hallway grid **/
$(document).ready(function() {
    var numitems =  $("#gridHallways li").length;

    $("ul#gridHallways").css("column-count", numitems / 2);
});

/** rooms grid **/
$(document).ready(function() {
    var numitems =  $(".gridRooms1 li").length;

    $("ul.gridRooms1").css("column-count", numitems / 7);
});

/* Delet Booking Ajax to pass variables */
function passBooking(element)
{
	var id = element.id;

	$.ajax({
			type: "POST",
			url: '../assets/php/viewRooms.php',
			data: 'hallway=' + id,

			success: function(data){
				$('rooms').php(data);

			}
		});
}

function bookAjax(date, room, period)
		{
			var dateOfBooking = JSON.stringify(date);
			var classID = JSON.stringify(room);
			var period = JSON.stringify(period);

			if (confirm('Are you sure you want to create booking')) {

				$.ajax({

					type: 'post',
					url: '../assets/php/addBooking.php',
					data: {dateOfBooking: date, classID: classID, period: period},
					success:function(data){
						window.location.assign("../assets/php/viewOwnBookings.php")

					}
				});
			}

		}

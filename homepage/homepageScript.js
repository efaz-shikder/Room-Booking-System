var dateFinal;
var areHallwaysAvailable = false;

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

var map = document.getElementsByTagName("path");
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
	if (hallwayType == "cHallway")
	{
		for (i = 0; i < cRoom.length; i++)
		{
			cRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "C Hallway | First Floor ";
		}
	}
	else if(hallwayType == "sHallway")
	{
		for (i = 0; i < sRoom.length; i++)
		{
			sRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "S Hallway | First Floor ";
		}
	}
	else if(hallwayType == "englishHallway")
	{
		for (i = 0; i < englishRoom.length; i++)
		{
			englishRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "English Hallway | First Floor ";
		}
	}
	else if(hallwayType == "frenchHallway")
	{
		for (i = 0; i < frenchRoom.length; i++)
		{
			frenchRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "French Hallway | First Floor ";
		}
	}
	else if(hallwayType == "gymHallway")
	{
		for (i = 0; i < gymRoom.length; i++)
		{
			gymRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Gym Hallway | First Floor ";
		}
	}
	else if(hallwayType == "frontFoyer")
	{
		for (i = 0; i < frontFoyerRoom.length; i++)
		{
			frontFoyerRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Front Foyer | First Floor ";
		}
	}
	else if(hallwayType == "musicHallway")
	{
		for (i = 0; i < musicRoom.length; i++)
		{
			musicRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Music Hallway | First Floor ";
		}
	}
	else if(hallwayType == "mathHallway")
	{
		for (i = 0; i < mathRoom.length; i++)
		{
			mathRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Math Hallway | Second Floor ";

		}
	}
	else if(hallwayType == "scienceHallway")
	{
		for (i = 0; i < scienceRoom.length; i++)
		{
			scienceRoom[i].style.fill = "#6dc5d6";
			document.getElementById("placeholderParagraph").innerHTML = "Science Hallway | Second Floor ";
		}
	}
	else if(hallwayType =="geographyHallway")
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

	for (i = 0; i < map.length; i++) {
		map[i].style.fill = "#5e7172";
	}
	document.getElementById("placeholderParagraph").innerHTML = "Academic Room Booking and Inquiry System";
}
function remove(elem)
{
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
		action = 2;
	}
	else {
		document.getElementById("ArbisNav").style.width = "0";
		action = 1;
	}
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


dateClicked: function () {
	var _this = this
	this.activeDates = document.querySelectorAll('[data-calendar-status="active"]')
	for (var i = 0; i < this.activeDates.length; i++) {
		this.activeDates[i].addEventListener('click', function (event) {
				// cut off first 4 and last 24 characters of date
				var simplifiedDate = this.dataset.calendarDate;
				JSON.stringify(simplifiedDate);
				simplifiedDate = simplifiedDate.substring(4,15);
				var shortenedMonth = simplifiedDate.substring(0,3);
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
				simplifiedDate = simplifiedDate.substr(7) + "-" + shortenedMonth + "-" + simplifiedDate.substr(4,3)
				dateFinal = simplifiedDate;
				var picked = document.querySelectorAll('[data-calendar-label="picked"]')[0]
				picked.innerHTML = simplifiedDate
				_this.removeActiveClass()
				this.classList.add('cal__date--selected')
			})
	}
},
createDay: function (num, day, year) {
	var newDay = document.createElement('div')
	var dateEl = document.createElement('span')
	var weekend = this.date.toDateString();
	JSON.stringify(weekend);
	weekend = weekend.substring(0,3);
	dateEl.innerHTML = num
	newDay.className = 'cal__date'
	newDay.setAttribute('data-calendar-date', this.date)

	if (num === 1) {
		var offset = ((day - 1) * 14.28)
		if (offset > 0) {
			newDay.style.marginLeft = offset + '%'
		}
	}
	var _this = this;
	this.activeDates = document.querySelectorAll('[data-calendar-status="active"]')

	if ( (this.date.getTime() <= this.todaysDate.getTime() - 1) || (this.date.getMonth() === 6) || (this.date.getMonth() === 7)
		|| (weekend == "Sat") || (weekend == "Sun") ) {
		newDay.classList.add('cal__date--disabled')
} else {
	newDay.classList.add('cal__date--active')
	newDay.setAttribute('data-calendar-status', 'active')
}

newDay.appendChild(dateEl)
this.month.appendChild(newDay)
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

/** Show/Hide Toggles for room menu **/
var hallwayArray = ["#cHallway", "#sHallway", "#englishHallway", "#frenchHallway", "#gymHallway", "#frontFoyer", "#musicHallway", "#mathHallway", "#scienceHallway", "#geographyHallway"];
var roomsArray = ["#rooms", "#rooms2", "#rooms3", "#rooms4", "#rooms5", "#rooms6", "#rooms7", "#rooms8", "#rooms9", "#rooms10"];

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
	areHallwaysAvailable = false;
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

$(hallwayArray[3]).click(function(){
	toggleRooms(roomsArray[3]);
	$(".frenchHallway").addClass("current");
})

$(hallwayArray[4]).click(function(){
	toggleRooms(roomsArray[4]);
	$(".gymHallway").addClass("current");
})

$(hallwayArray[5]).click(function(){
	toggleRooms(roomsArray[5]);
	$(".frontFoyer").addClass("current");
})

$(hallwayArray[6]).click(function(){
	toggleRooms(roomsArray[6]);
	$(".musicHallway").addClass("current");
})

$(hallwayArray[7]).click(function(){
	toggleRooms(roomsArray[7]);
	$(".mathHallway").addClass("current");
})

$(hallwayArray[8]).click(function(){
	toggleRooms(roomsArray[8]);
	$(".scienceHallway").addClass("current");
})

$(hallwayArray[9]).click(function(){
	toggleRooms(roomsArray[9]);
	$(".geographyHallway").addClass("current");
})


/** rooms grid **/
$(document).ready(function() {
	$("ul.gridRooms1").css("column-count", 3);
	$("ul.gridRooms2").css("column-count", 2);
	$("ul.gridRooms3").css("column-count", 3);
	$("ul.gridRooms4").css("column-count", 2);
	$("ul.gridRooms5").css("column-count", 1);
	$("ul.gridRooms6").css("column-count", 2);
	$("ul.gridRooms7").css("column-count", 1);
	$("ul.gridRooms8").css("column-count", 4);
	$("ul.gridRooms9").css("column-count", 2);
	$("ul.gridRooms10").css("column-count", 3);
});

var isClicked = false;
/** period buttons **/
$('#A').click(function(){
	$("#A").removeClass("btn-animate").addClass("btn-clicked");
	$("#B").removeClass("btn-clicked").addClass("btn-animate");
	$("#C").removeClass("btn-clicked").addClass("btn-animate");
	$("#D").removeClass("btn-clicked").addClass("btn-animate");
	toggleRoomsOff();
	isClicked = true;
})
$('#B').click(function(){
	$("#B").removeClass("btn-animate").addClass("btn-clicked");
	$("#A").removeClass("btn-clicked").addClass("btn-animate");
	$("#C").removeClass("btn-clicked").addClass("btn-animate");
	$("#D").removeClass("btn-clicked").addClass("btn-animate");
	toggleRoomsOff();
	isClicked = true;
})
$('#C').click(function(){
	$("#C").removeClass("btn-animate").addClass("btn-clicked");
	$("#B").removeClass("btn-clicked").addClass("btn-animate");
	$("#A").removeClass("btn-clicked").addClass("btn-animate");
	$("#D").removeClass("btn-clicked").addClass("btn-animate");
	toggleRoomsOff();
	isClicked = true;
})
$('#D').click(function(){
	$("#D").removeClass("btn-animate").addClass("btn-clicked");
	$("#B").removeClass("btn-clicked").addClass("btn-animate");
	$("#C").removeClass("btn-clicked").addClass("btn-animate");
	$("#A").removeClass("btn-clicked").addClass("btn-animate");
	toggleRoomsOff();
	isClicked = true;
})

/** disable user from clicking on hallways until condition is met **/
var repeater;

function setHallwaysAvailable(name) {
	areHallwaysAvailable = true;
	switch (name) {
		case 1:
		document.getElementById("rooms").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 2:
		document.getElementById("rooms2").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 3:
		document.getElementById("rooms3").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 4:
		document.getElementById("rooms4").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 5:
		document.getElementById("rooms5").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 6:
		document.getElementById("rooms6").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 7:
		document.getElementById("rooms7").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 8:
		document.getElementById("rooms8").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 9:
		document.getElementById("rooms9").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
		case 10:
		document.getElementById("rooms10").getElementsByTagName("LI").setAttribute("style", "background-color: #555; color: white");
		break;
	}
}


function hideHallways() {
	document.getElementById('permission').setAttribute("style", "pointer-events: none; cursor: not-allowed; opacity: 0.6;");
}
function showHallways() {
	document.getElementById('permission').setAttribute("style", "pointer-events: auto; cursor: auto; opacity: 1;");
}
function hideSubmit() {
	document.getElementById('spin').setAttribute("style", "pointer-events: none; cursor: not-allowed; opacity: 0.4;");
}
function showSubmit() {
	document.getElementById('spin').setAttribute("style", "pointer-events: auto; cursor: auto; opacity: 1;");
}

function doWork() {
	$('#more').load('exp1.php');
	repeater = setTimeout(doWork, 100);

	// disable user from clicking on hallway until condition is met
	if ( (dateFinal == null) || !(isClicked) ) {
		hideHallways();
	}
	if ( !(dateFinal == null) && (isClicked) ) {
		showHallways();
	}
	// disable user from clicking submit until condition is met
	if ( !(dateFinal == null) && (isClicked) && (areHallwaysAvailable) ) {
		showSubmit();
	}
	else {
		hideSubmit();
	}

	// hallway grid
	if ($(window).width() >= 1200)
	{
		$("ul#gridHallways").css("column-count", 5);
	}
	else {
		$("ul#gridHallways").css("column-count", 1);
	}
}

doWork();

$("#checking").click(function(){
		var $this = $(this);

		if($this.data('clicked')) {
			toggleRoomsOff();
			$("#A").removeClass("btn-clicked").addClass("btn-animate");
			$("#B").removeClass("btn-clicked").addClass("btn-animate");
			$("#C").removeClass("btn-clicked").addClass("btn-animate");
			$("#D").removeClass("btn-clicked").addClass("btn-animate");
			isClicked = false;
			hideHallways();
			hideSubmit();
		}
		else {
		 $this.data('clicked', true);

 		}

});

var period;
var classID;

function setClassID(id)
{
	classID = JSON.stringify(id);
}

function setPeriod(element)
{
	period = JSON.stringify(element.id);
}

function getClassID()
{
	return classID;
}

function getPeriod()
{
	return period;
}

function getDate()
{
	return dateFinal;
}

$(document).ready(function(){
    $("div").on("click", "button", function(event){
        $(event.delegateTarget).css("background", "#bfc0c1"/**light gray**/);
    });
});

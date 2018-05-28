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

function themeChange(elem)
{
	var checkedTheme = elem.getAttribute("value");
	if(checkedTheme == "black")
	{
	document.getElementById("mainBody").setAttribute("background", "websiteBackground1.jpg");
	}
	else if(checkedTheme == "brown")
	{
	document.getElementById("mainBody").setAttribute("background", "websiteBackground2.jpg");
	}
	else if (checkedTheme == "light")
	{
	document.getElementById("mainBody").setAttribute("background", "websiteBackground3.jpg");
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

function remove(elem)
{
}

function openNav() {
	document.getElementById("ArbisNav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
	document.getElementById("ArbisNav").style.width = "0";
	document.getElementById("main").style.marginLeft = "0px";
}

$(document).ready(function(){
	$('#nav-icon3').click(function(){
		$(this).toggleClass('open');
	});
});

var action = 1;

function toggleNav() {
    if ( action == 1 ) {
        openNav();
        action = 2;
    } else {
        closeNav();
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

    if (this.date.getTime() <= this.todaysDate.getTime() - 1) {
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
        var picked = document.querySelectorAll('[data-calendar-label="picked"]')[0]
        picked.innerHTML = this.dataset.calendarDate
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

/** loads the calendar **/
window.addEventListener('load', function () {
	vanillacalendar.init();
})

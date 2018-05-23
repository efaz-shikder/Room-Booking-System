//display room name, type, and availability when hovered
function availabilityDisplay(elem) {
	var elementID = elem.getAttribute("id");
	var roomType = elem.getAttribute("class");

	if (roomType != "Math Hallway" && roomType != "Science Hallway")
	{
		var floorNumber = "First floor";
	}
	else
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

function hallwayHover(elem){
	var hallwayType = elem.getAttribute("id");
	if (hallwayType == "C_Hallway")
	{
		for (i = 0; i < cRoom.length; i++)
		{
		cRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "S_Hallway")
	{
		for (i = 0; i < sRoom.length; i++)
		{
		sRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "English_Hallway")
	{
		for (i = 0; i < englishRoom.length; i++)
		{
		englishRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "French_Hallway")
	{
		for (i = 0; i < frenchRoom.length; i++)
		{
		frenchRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "Gym_Hallway")
	{
		for (i = 0; i < gymRoom.length; i++)
		{
		gymRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "Front_Foyer")
	{
		for (i = 0; i < frontFoyerRoom.length; i++)
		{
		frontFoyerRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "Music_Hallway")
	{
		for (i = 0; i < musicRoom.length; i++)
		{
		musicRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "Math_Hallway")
	{
		for (i = 0; i < mathRoom.length; i++)
		{
		mathRoom[i].style.fill = "#ffee05";
		}
	}
	else if(hallwayType == "Science_Hallway")
	{
	for (i = 0; i < scienceRoom.length; i++)
		{
		scienceRoom[i].style.fill = "#ffee05";
		}
	}
}

function hallwayHoverOut()
{

	var map = document.getElementsByTagName("path");
	for (i = 0; i < map.length; i++) {
	map[i].style.fill = "#373d47";
	}
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
//display room name, type, and availability when hovered
function availabilityDisplay(elem) {
	var elementID = elem.getAttribute("id");
	var roomType = elem.getAttribute("class");
	
	if (roomType != "Math Hallway" && roomType != "Science Hallway")
	{
		var floorNumber = "First floor";
	}
	else if(roomType = "Geography Hallway")
	{
		floorNumber = "Third floor";
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
var geographyRoom = document.getElementsByClassName("Geography Hallway");

function hallwayHover(elem){
	var hallwayType = elem.getAttribute("id");
	if (hallwayType == "C_Hallway")
	{
		for (i = 0; i < cRoom.length; i++) 
		{
		cRoom[i].style.fill = "#00a7ee";
		}
	}
	else if(hallwayType == "S_Hallway")
	{
		for (i = 0; i < sRoom.length; i++) 
		{
		sRoom[i].style.fill = "#00a7ee";
		}	
	}
	else if(hallwayType == "English_Hallway")
	{
		for (i = 0; i < englishRoom.length; i++) 
		{
		englishRoom[i].style.fill = "#00a7ee";
		}	
	}
	else if(hallwayType == "French_Hallway")
	{
		for (i = 0; i < frenchRoom.length; i++) 
		{
		frenchRoom[i].style.fill = "#00a7ee";
		}	
	}
	else if(hallwayType == "Gym_Hallway")
	{
		for (i = 0; i < gymRoom.length; i++) 
		{
		gymRoom[i].style.fill = "#00a7ee";
		}	
	}
	else if(hallwayType == "Front_Foyer")
	{
		for (i = 0; i < frontFoyerRoom.length; i++) 
		{
		frontFoyerRoom[i].style.fill = "#00a7ee";
		}
	}
	else if(hallwayType == "Music_Hallway")
	{
		for (i = 0; i < musicRoom.length; i++) 
		{
		musicRoom[i].style.fill = "#00a7ee";
		}	
	}
	else if(hallwayType == "Math_Hallway")
	{
		for (i = 0; i < mathRoom.length; i++) 
		{
		mathRoom[i].style.fill = "#00a7ee";
		}	
	}
	else if(hallwayType == "Science_Hallway")
	{
	for (i = 0; i < scienceRoom.length; i++) 
		{
		scienceRoom[i].style.fill = "#00a7ee";
		}	
	}
	else if(hallwayType == "Geography_Hallway")
	{
	for (i = 0; i < geographyRoom.length; i++) 
		{
		geographyRoom[i].style.fill = "#00a7ee";
		}	
	}
}

function hallwayHoverOut(elem)
{

	var map = document.getElementsByTagName("path");
	for (i = 0; i < map.length; i++) {
	map[i].style.fill = "#6b767c";
	}
}

function remove(elem)
{
}

//display room name, type, and availability when hovered
function availabilityDisplay(elem) {
	// Room Name
	var elementID = elem.getAttribute("id");
	// Room Hallway
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

function remove(elem){
	//document.getElementById("demo").innerHTML = " ";
}

//display room name, type, and availability when hovered
function availabilityDisplay(elem) {
	var elementID = elem.getAttribute("id");
	
	var roomType = elem.getAttribute("class");
	document.getElementById("demo").innerHTML = elementID +" | "+ roomType;
	
}	

function remove(elem){
	//document.getElementById("demo").innerHTML = " ";
}

function test(elem){
	alert("REEEEEEEEEEE");
	//document.getElementById("demo").innerHTML = " ";
}
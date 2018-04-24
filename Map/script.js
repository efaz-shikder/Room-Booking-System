//display room name, type, and availability when hovered
function availabilityDisplay(elem) {
	elementID = elem.getAttribute("id");
	document.getElementById("demo").innerHTML = elementID;
}

function remove(x){
	document.getElementById("demo").innerHTML = " ";
}
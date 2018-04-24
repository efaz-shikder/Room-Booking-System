/*function availabilityDisplay(x) {
  alert("TEST");
  //displays room availability? 
}
*/

//display room name, type, and availability when hovered
function availabilityDisplay(x) {
	//where x and y represent values that inform users of the room's availability and time.
	var x = Math.floor((Math.random() * 100) + 1);
	var y = Math.floor((Math.random() * 100) + 1);
	document.getElementById("demo").innerHTML = x + " " + y;
}

function remove(x){
	document.getElementById("demo").innerHTML = " ";
}
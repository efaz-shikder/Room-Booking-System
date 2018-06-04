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


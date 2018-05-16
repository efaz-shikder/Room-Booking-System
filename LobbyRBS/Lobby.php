<!doctype html>
<html lang>
	<head>
	<link rel="stylesheet" href="LobbyStyle.css" type="text/css">
	<script src ="LobbyScript.js"></script>
	<meta charset="UTF-8">
	<title>ARBIS</title>
<body>
	<div id="ArbisNav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="Lobby.html">Home</a>
		<a href="">Booked Rooms</a>
		<a href="">Help</a>
	</div>
	<div id="main" class="main">
		<img class="logo" src="ArbisLogo.png" onclick="openNav()" alt="ArbisLogo">
		<div class="map">
		<!-- insert the map on the main page -->
			<iframe id="Map" class="map" src="RBSMap.html"></iframe>
		</div>
	</div>
</body>
</html>
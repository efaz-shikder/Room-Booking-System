<?php

session_start();

include_once("../connect.php");

$description = $_POST['description'];
$type = $_POST['type'];
$date = $_POST['date'];

echo "$description";
echo "$type";
echo "$date";


$sql = "INSERT INTO schedule (`ID`, `dateDescription`, `specialDate`, `typeOfDay`) VALUES (NULL, '$description', '$date', '$type')";
mysqli_query($server, $sql);




// Wrap up and close connection
mysqli_close($server);


?>
<?php
    // Load mySQL credentials
    require_once('login.php');

    // Establish a connection the mySQL server.
    $server = mysqli_connect($server_host, $server_user, $server_password);

    if (!$server)
    {
        die("Unable to Connect to $dbhost: " . mysql_error() . "</br>");
    } // End of if (!$server)

    // Select the database
    mysqli_select_db($server, $database);
?>
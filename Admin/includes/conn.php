<?php 

    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "showfinder";

    $connect = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_errno()) {
        exit('Failed to connect to database: ' . mysqli_connect_error());
    }

?>
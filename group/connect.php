<?php
//establish database connection
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "friends"; //created database

    $connect = mysqli_connect($server, $user, $password, $database);

	/*if (!$connect) {
		die(mysqli_error($connect));*/
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
	}
?> 
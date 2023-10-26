<?php
	// ini.inc
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	
	$servername = "xxxxxx";
	$username = "xxxxxx";
	$password = "xxxxxx";
	$database = "xxxxxx";
	
	$conn = new mysqli($servername, $username, $password, $database);

	if ($conn->connect_error) {
		die("Databaseverbinding mislukt: " . $conn->connect_error);
	}
	

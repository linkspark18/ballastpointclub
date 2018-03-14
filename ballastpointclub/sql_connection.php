<?php
	$servername = "localhost";
	$username = "ad_capstone";
	$password = "fbcec351";
	$dbname = "ad_capstone";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>
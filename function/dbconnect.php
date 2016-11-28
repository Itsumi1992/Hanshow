<?php
function DBConnect(){
	$servername = "localhost";
	$username = "root";
	$password = "usbw";
	$dbname = "aretail";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		return false;
	}
	return $conn;
}

?>
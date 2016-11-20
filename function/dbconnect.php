<?php
function DBConnect(){
	$servername = "145.130.212.253";
	$username = "root";
	$password = "usbw";
	$dbname = "test";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		return false;
	}
	 return true;
}

?>
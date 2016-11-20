<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="/Hanshow/js/bootstrap.js"></script>
	<?php include 'config.php'; ?>
  </head>
  
  <body>
  <a href="/Hanshow/index.php?p=registeren">Registreren</a>
  <a href="/Hanshow/index.php?p=login">Login</a>
  <!--header-->
	
  <!--inhoud-->
  	<?php
	
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT omschrijving FROM omschrijving";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["omschrijving"].  "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
  <div class="container well well-sm">

    <p>
	<?php
	if(!isset($_GET["p"]))
	{
		//Startpagina
		include (ROOT_DIR . '/content/home.php') ;
	}
	elseif($_GET["p"] == "registeren")
	{
		//registratie pagina
		include (ROOT_DIR . '/content/user_register.php') ;
	}
	elseif($_GET["p"] == "login")
	{
		//login pagina
		include (ROOT_DIR . '/content/user_login.php') ;
	}
	?>
	
	  <!--footer-->
	  
	  
	</p>
	</div>
  </body>
</html>